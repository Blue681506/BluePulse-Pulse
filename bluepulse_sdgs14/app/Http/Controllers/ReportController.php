<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::latest()->get();

        return view('reports.index', compact('reports'));
    }

    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'image' => 'nullable|image'
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('uploads'), $imageName);
        }

        Report::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'image' => $imageName,
            'status' => 'pending'
        ]);

        return redirect()->route('reports.index')
            ->with('success', 'Laporan berhasil dikirim');
    }

    public function admin()
    {
        $reports = Report::latest()->get();

        return view('admin.reports', compact('reports'));
    }

    public function updateStatus(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        $report->status = $request->status;

        $report->save();

        return redirect()->back()
            ->with('success', 'Status berhasil diupdate');
    }

    public function destroy($id)
    {
        $report = Report::findOrFail($id);

        $report->delete();

        return redirect()->back()
            ->with('success', 'Laporan berhasil dihapus');
    }
}