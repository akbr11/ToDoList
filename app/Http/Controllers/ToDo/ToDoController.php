<?php

namespace App\Http\Controllers\ToDo;

use App\Http\Controllers\Controller;
use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $toDos = (new ToDo)->search(null);
        return view('app', ['data' => $toDos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "task" => "required|min:3|max:100",
        ], [
            "task.required" => "Wajib diisi.",
            "task.min" => "Minimum 3 karakter.",
            "task.max" => "Maksimum 100 karakter.",
        ]);
        $data = ['task' => $request->task];
        $insert = ToDo::create($data);
        if (!$insert) {
            return redirect()->back()->with("error", "Gagal menambahkan data.");
        }
        return redirect()->back()->with("success", "Data berhasil ditambahkan.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
