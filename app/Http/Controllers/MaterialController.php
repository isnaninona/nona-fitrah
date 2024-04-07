<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function index()
    {
        $page = 'materis';
        $materis = Material::all();
        return view('pages.materis.index', compact('materis', 'page'));
    }

    public function create()
    {
        $page = 'materis';
        return view('pages.materis.create', compact('page'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'file_materi' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,zip',
        ]);

        $fileName = time().'_'.$request->file('file_materi')->getClientOriginalName();
        $path = $request->file('file_materi')->storeAs('public/materis', $fileName);

        Material::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_path' => $path,
        ]);

        return redirect()->route('pages.materis.index')
                        ->with('success','Materi berhasil diupload.');
    }

    public function show(Material $materi)
    {
        $page = 'materis';
        return view('pages.materis.show', compact('materi'));
    }

    public function edit(Material $materi)
    {
        $page = 'materis';
        return view('pages.materis.edit', compact('materi'));
    }

    public function update(Request $request, Material $materi)
    {
        $page = 'materis';
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'file_materi' => 'sometimes|file|mimes:pdf,doc,docx,ppt,pptx,zip',
        ]);

        if ($request->hasFile('file_materi')) {
            $fileName = time().'_'.$request->file('file_materi')->getClientOriginalName();
            $path = $request->file('file_materi')->storeAs('public/materis', $fileName);

            // Hapus file lama jika ada
            if ($materi->file_path) {
                Storage::delete($materi->file_path);
            }

            $materi->update([
                'file_path' => $path,
            ]);
        }

        $materi->update($request->except(['file_materi']));

        return redirect()->route('pages.materis.index')
                        ->with('success', 'Materi berhasil diperbarui.');
    }

    public function destroy(Material $materi)
    {
        $page = 'materis';
        if ($materi->file_path) {
            Storage::delete($materi->file_path);
        }

        $materi->delete();

        return redirect()->route('pages.materis.index')
                        ->with('success', 'Materi berhasil dihapus.');
    }
}
