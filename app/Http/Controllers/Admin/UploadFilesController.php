<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadFilesController extends Controller
{
    public function index()
    {
        $files = UploadFile::all();
        return view('admin.upload_files.index', compact('files'));
    }

    public function create()
    {
        return view('admin.upload_files.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,png,pdf,csv,xlsx|max:2048',
        ]);
        $originalName = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('public/uploads', $originalName);

        $uploadFile = new UploadFile();
        $uploadFile->filename = $request->file('file')->getClientOriginalName();
        $uploadFile->path = $path;
        $uploadFile->save();

        return redirect()->route('admin.upload_files.index')->with('success', 'Archivo subido correctamente.');
    }

    public function show($id)
    {
        $file = UploadFile::findOrFail($id);
        return view('admin.upload_files.show', compact('file'));
    }

    public function edit($id)
    {
        $file = UploadFile::findOrFail($id);
        return view('admin.upload_files.edit', compact('file'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'file' => 'file|mimes:jpg,png,pdf|max:2048',
        ]);

        $uploadFile = UploadFile::findOrFail($id);

        if ($request->hasFile('file')) {
            Storage::delete($uploadFile->path);
            $path = $request->file('file')->store('uploads');

            $uploadFile->filename = $request->file('file')->getClientOriginalName();
            $uploadFile->path = $path;
        }

        $uploadFile->save();
        return redirect()->route('admin.upload_files.index')->with('success', 'Archivo actualizado correctamente.');
    }

    public function destroy($id)
    {
        $uploadFile = UploadFile::findOrFail($id);
        Storage::delete($uploadFile->path);
        $uploadFile->delete();

        return redirect()->route('admin.upload_files.index')->with('success', 'Archivo eliminado correctamente.');
    }
}
