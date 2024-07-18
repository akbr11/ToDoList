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
        $max_data = 5;
        request('search') ?
            $data = ToDo::where('task', 'like', '%' . request('search') . '%')->get()->paginate($max_data) :
            $data = ToDo::orderBy('id', 'desc')->paginate($max_data);

        return view('app', compact('data'));
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

        $request->validate([
            "task" => "required|min:3|max:100",
        ], [
            "task.required" => "Wajib diisi.",
            "task.min" => "Minimum 3 karakter.",
            "task.max" => "Maksimum 100 karakter.",
        ]);
        $data = ['task' => $request->task, 'is_done' => $request->is_done];
        $update = ToDo::where('id', $id)->update($data);
        if (!$update) {
            return redirect()->back()->with("error", "Gagal mengubah data.");
        }
        return redirect()->back()->with("success", "Data berhasil diubah.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = ToDo::where('id', $id)->delete();
        if (!$delete) {
            return redirect()->back()->with("error", "Gagal menghapus data.");
        }
        return redirect()->back()->with("success", "Data berhasil dihapus.");
    }
}
