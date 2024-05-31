<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModulRequest;
use App\Models\Modul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ModulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return dd(Modul::latest()->get());
        return view('modul.index', [
            'modul' => Modul::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modul.form', [
            'modul' => new Modul(),
            'page' => [
                'title' => 'Create Modul',
                'description' => 'Please fill in the form below to create a new modul.',
                'method' => 'POST',
                'url' => route('modul.store'),
                'button' => 'Create',
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ModulRequest $request)
    {
        $file = $request->file('file');
        $fileContent = $file->get(); // Membaca isi file
        $fileName = $file->getClientOriginalName(); // Mendapatkan nama file
        $fileType = $file->getClientOriginalExtension(); // Mendapatkan tipe file
        $mimeType = $file->getClientMimeType(); // Mendapatkan mime type

        $request->user()->modul()->create([
            ...$request->validated(),
            'file_name' => $fileName,
            'file_type' => $fileType,
            'mime_type' => $mimeType,
            'file_data' => $fileContent,
        ]);

        return redirect()->route('modul.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $modul = Modul::findOrFail($id);

        return response($modul->file_data)
            ->header('Content-Type', $modul->mime_type)
            ->header('Content-Disposition', 'inline; filename="' . $modul->file_name . '"');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modul $modul)
    {
        Gate::authorize('update',$modul);
        return view('modul.form', [
            'modul' => $modul,
            'page' => [
                'title' => 'Edit Modul',
                'description' => 'Edit Modul: ' . $modul->name,
                'method' => 'PUT',
                'url' => route('modul.update', $modul),
                'button' => 'Edit',
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ModulRequest $request, Modul $modul)
    {
        $modul->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('modul.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modul $modul)
    {
    }
}
