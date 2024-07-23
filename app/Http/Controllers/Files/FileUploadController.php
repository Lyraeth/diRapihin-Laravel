<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FileUpload;
use App\Models\Service;

class FileUploadController extends Controller
{
    public function showUploadForm()
    {
        return view('files.upload');
    }

    public function handleFileUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:doc,docx',
            'services' => 'required|array',
            'note' => 'nullable|string',
        ]);

        $file = $request->file('file');
        $path = $file->store('public/uploads');

        $fileUpload = new FileUpload();
        $fileUpload->filename = $path;
        $fileUpload->original_filename = $file->getClientOriginalName();
        $fileUpload->note = $request->note;
        $fileUpload->save();

        $services = new Service();
        $services->file_upload_id = $fileUpload->id;
        $services->perapihan_paragraf = in_array('perapihan_paragraf', $request->services);
        $services->nomor_halaman = in_array('nomor_halaman', $request->services);
        $services->daftar_isi = in_array('daftar_isi', $request->services);
        $services->daftar_tabel = in_array('daftar_tabel', $request->services);
        $services->daftar_gambar = in_array('daftar_gambar', $request->services);
        $services->save();

        return redirect()->back()->with('success', 'File successfully uploaded!');
    }
}
