<?php
namespace App\Http\Controllers\Admin\Todolist;

use App\Http\Controllers\Controller; 
use App\Models\TodoList;
use App\Models\LokasiTugas;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Models\User;

use App\Models\Anak;
use App\Models\Donatur;
use App\Models\ModulMateri;
use Illuminate\Http\Request;

class TodoListController extends Controller 
{

    public function index()
    {
        $pengumumans = Pengumuman::orderBy('created_at', 'desc')->take(5)->get();
        $totalPegawai = User::count();
        $totalanak = Anak::count();
        $todolist = TodoList::all();
        $user = User::all();
        $lokasi = LokasiTugas::all();
        $totalmateri = ModulMateri::count();
        $totoldonatur = Donatur::count();
        
        return view('dashboard', compact('totalPegawai', 'pengumumans', 'totalanak', 'todolist','user','lokasi', 'totalmateri','totoldonatur'));
    }
    
    public function store(Request $request)
{
    $request->validate([
        'tugas' => 'required|string|max:255',
    ]);

    TodoList::create([
        'tugas' => $request->tugas, // Menggunakan nama field yang sesuai dengan validasi
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('dashboard')->with('success', 'Task added successfully.');
}

public function edit($id)
{
    $todo = TodoList::findOrFail($id);

    // Periksa apakah pengguna yang sedang masuk memiliki izin untuk mengedit tugas
    if ($todo->user_id !== Auth::id()) {
        return Redirect::back()->withErrors(['msg', 'You are not authorized to edit this task.']);
    }

    // Mengubah status dari 'menunggu' menjadi 'selesai'
    $todo->status = 'selesai';
    $todo->save();

    return response()->json(['message' => 'Task status updated successfully.']);
}

    
    

    public function destroy($id)
    {
        TodoList::findOrFail($id)->delete();

        return redirect()->route('dashboard')->with('success', 'Task deleted successfully.');
    }
}
