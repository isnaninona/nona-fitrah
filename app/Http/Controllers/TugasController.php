<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TugasController extends Controller
{
    public function index()
    {
        $page = 'tugas';
        $tugas = DB::table('vtugas')->get();
        return view('pages.tugas.index', compact('tugas', 'page'));
    }

    public function create()
    {
        $page = 'tugas';
        $kelas = DB::select("SELECT id, name, `tingkat-kelas`, rombel FROM class_rooms");
        $mapel = DB::select("SELECT id, mapel FROM mapels");
        return view('pages.tugas.create', compact('page', 'kelas', 'mapel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_tugas' => 'required',
            'deskripsi_tugas' => 'required',
            'deadline' => 'required',
            'kelas' => 'required',
            'mapel' => 'required',
            // 'file_tugas' => 'sometimes|file|mimes:pdf,doc,docx,ppt,pptx,zip',
        ]);

        $fileName = time() . '_' . $request->file('file_tugas')->getClientOriginalName();
        $path = $request->file('file_tugas')->storeAs('public/tugas', $fileName);

        $data = [
            'judul_tugas' => $request->judul_tugas,
            'deskripsi_tugas' => $request->deskripsi_tugas,
            'deadline' => $request->deadline,
            'class_room_id' => $request->kelas,
            'mapel_id' => $request->mapel,
            'teacher_id' => 1,
            'file_tugas' => $path,
        ];
        DB::table('tugas')->insert($data);


        return redirect()->route('tugas.index')
            ->with('success', 'tugas berhasil diupload.');
    }

    public function show($param)
    {
        $tugas = DB::table('vtugas')->where('id_tugas', '=', $param)->first();
        // return $tugas;
        $page = 'tugas';
        return view('pages.tugas.show', compact('tugas', 'page'));
    }

    public function edit($param)
    {
        $tugas = DB::table('vtugas')->where('id_tugas', '=', $param)->first();
        $kelas = DB::select("SELECT id, name, `tingkat-kelas`, rombel FROM class_rooms");
        $mapel = DB::select("SELECT id, mapel FROM mapels");
        $page = 'tugas';
        return view('pages.tugas.edit', compact('tugas', 'page', 'kelas', 'mapel'));
    }

    public function update(Request $request, $param)
    {
        $query = DB::table('tugas')->where('id_tugas', '=', $param);
        $tugas = $query->first();
        // dd($tugas->file_tugas);

        $page = 'tugas';
        $request->validate([
            'judul_tugas' => 'required',
            'deskripsi_tugas' => 'required',
            'deadline' => 'required',
            'class_room_id' => 'required',
            'mapel_id' => 'required',
            'file_tugas' => 'sometimes|file|mimes:pdf,doc,docx,ppt,pptx,zip',
        ]);

        if ($request->hasFile('file_tugas')) {
            $fileName = time() . '_' . $request->file('file_tugas')->getClientOriginalName();
            $path = $request->file('file_tugas')->storeAs('public/tugas', $fileName);

            // Hapus file lama jika ada
            if ($tugas->file_tugas) {
                Storage::delete($tugas->file_tugas);
            }

            $query->update([
                'file_tugas' => $path,
            ]);
        }

        $query->update($request->except(['file_tugas', '_token', '_method']));

        return redirect()->route('tugas.index')
            ->with('success', 'tugas berhasil diperbarui.');
    }

    public function destroy($param)
    {
        $query = DB::table('tugas')->where('id_tugas', '=', $param);

        $tugas = $query->first();
        // dd($tugas);
        $page = 'tugas';
        if ($tugas->file_tugas) {
            Storage::delete($tugas->file_tugas);
        }

        $query->delete();

        return redirect()->route('tugas.index')
            ->with('success', 'tugas berhasil dihapus.');
    }
}
