<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use Illuminate\Support\Facades\DB;
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
        $kelas = DB::select("SELECT id, name, `tingkat-kelas`, rombel FROM class_rooms");
        $mapel = DB::select("SELECT id, mapel FROM mapels");
        return view('pages.materis.create', compact('page', 'kelas', 'mapel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'kelas' => 'required',
            'mapel' => 'required',
            // 'file_materi' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,zip',
        ]);

        $fileName = time() . '_' . $request->file('file_materi')->getClientOriginalName();
        $path = $request->file('file_materi')->storeAs('public/materis', $fileName);

        $data = [
            'title' => $request->judul,
            'description' => $request->deskripsi,
            'mapel_id' => $request->mapel,
            'class_room_id' => $request->kelas,
            'teacher_id' => '1',
            'file_path' => $path,
        ];
        DB::table('materials')->insert($data);

        return redirect()->route('materis.index')
            ->with('success', 'Materi berhasil diupload.');
    }

    public function show($param)
    {
        $materi = DB::table('vmaterials')->where('id', '=', $param)->first();
        $page = 'materis';
        return view('pages.materis.show', compact('materi', 'page'));
    }

    public function edit($param)
    {
        $materi = DB::table('vmaterials')->where('id', '=', $param)->first();
        $kelas = DB::select("SELECT id, name, `tingkat-kelas`, rombel FROM class_rooms");
        $mapel = DB::select("SELECT id, mapel FROM mapels");
        $page = 'materis';
        return view('pages.materis.edit', compact('materi', 'page', 'kelas', 'mapel'));
    }

    public function update(Request $request, Material $materi)
    {
        $page = 'materis';
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'class_room_id' => 'required',
            'mapel_id' => 'required',
            'file_materi' => 'sometimes|file|mimes:pdf,doc,docx,ppt,pptx,zip',
        ]);

        if ($request->hasFile('file_materi')) {
            $fileName = time() . '_' . $request->file('file_materi')->getClientOriginalName();
            $path = $request->file('file_materi')->storeAs('public/materis', $fileName);

            // Hapus file lama jika ada
            if ($materi->file_path) {
                Storage::delete($materi->file_path);
            }

            $materi->update([
                'file_path' => $path,
            ]);
        }

        $materi->update($request->except(['file_materi', '_token', '_method']));

        return redirect()->route('materis.index')
            ->with('success', 'Materi berhasil diperbarui.');
    }

    public function destroy(Material $materi)
    {
        return $materi;
        $page = 'materis';
        if ($materi->file_path) {
            Storage::delete($materi->file_path);
        }

        $materi->delete();

        return redirect()->route('materis.index')
            ->with('success', 'Materi berhasil dihapus.');
    }
}
