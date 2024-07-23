<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FileUpload;

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
            'service' => 'required|string',
            'note' => 'nullable|string',
        ]);

        $file = $request->file('file');
        $path = $file->store('uploads');

        $fileUpload = new FileUpload();
        $fileUpload->filename = $path;
        $fileUpload->original_filename = $file->getClientOriginalName();
        $fileUpload->service = $request->service;
        $fileUpload->note = $request->note;
        $fileUpload->save();

        return redirect()->back()->with('success', 'File successfully uploaded!');
    }
}
