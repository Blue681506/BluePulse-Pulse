<?php

namespace App\Http\Controllers;

use App\Models\Species;
use Illuminate\Http\Request;

class SpeciesController extends Controller
{
    public function index()
    {
        $species = Species::latest()->get();

        return view('species.index', compact('species'));
    }

    public function admin()
    {
        $species = Species::latest()->get();

        return view('admin.species', compact('species'));
    }

    public function create()
    {
        return view('admin.species-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'latin_name' => 'required',
            'description' => 'required',
            'habitat' => 'required',
            'image' => 'nullable|image'
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('uploads'), $imageName);
        }

        Species::create([
            'name' => $request->name,
            'latin_name' => $request->latin_name,
            'description' => $request->description,
            'habitat' => $request->habitat,
            'image' => $imageName,
        ]);

        return redirect('/admin/species')
            ->with('success', 'Spesies berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $species = Species::findOrFail($id);

        $species->delete();

        return redirect()->back()
            ->with('success', 'Spesies berhasil dihapus');
    }
}