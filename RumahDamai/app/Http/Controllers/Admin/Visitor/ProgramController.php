<?php

namespace App\Http\Controllers\Admin\Visitor;

use App\Http\Controllers\Controller;
use App\Models\DetailProgram;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $program = Program::all();
        return view('admin.visitor.program.index', compact('program'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $program = Program::all();
        return view('admin.visitor.program.create', compact('program'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'img_program' => 'required',
            'kelas' => 'required',
            'jenis_program' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($request->hasFile('img_program')) {
            $img_program = $request->file('img_program');
            $slug = Str::slug(pathinfo($img_program->getClientOriginalName(), PATHINFO_FILENAME));
            $new_gambar = time() . '_' . $slug . '.' . $img_program->getClientOriginalExtension();
    
            // Pindahkan img_program ke direktori yang diinginkan
            $img_program->move('uploads/visitor/program/', $new_gambar);
        }

        $program = new Program;
        $program->kelas = $request->input('kelas'); 
        $program->img_program = 'uploads/visitor/program/' . $new_gambar;
        $program->save();

        $jenis_programs = $request->input('jenis_program');
        $deskripsis = $request->input('deskripsi');

        foreach ($jenis_programs as $key => $jenis_program) {
            $data2 = [
                'program_id' => $program->id,
                'jenis_program' => $jenis_program,
                'deskripsi' => $deskripsis[$key],
            ];
    
            DetailProgram::create($data2);
        }
        return redirect()->route('program.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $program = Program::findOrFail($id);
        $detailPrograms = DetailProgram::where('program_id', $id)->get();
    
        return view('admin.visitor.program.show', compact('program', 'detailPrograms'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $program = Program::findOrFail($id);
    
        $detailPrograms = DetailProgram::where('program_id', $id)->get();
    
        return view('admin.visitor.program.edit', compact('program', 'detailPrograms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kelas' => 'required',
            'jenis_program' => 'required|array',
            'deskripsi' => 'required|array',
        ]);
    
        $program = Program::findOrFail($id);
    
        // Handle file upload if new image is provided
        if ($request->hasFile('img_program')) {
            $img_program = $request->file('img_program');
            $slug = Str::slug(pathinfo($img_program->getClientOriginalName(), PATHINFO_FILENAME));
            $new_gambar = time() . '_' . $slug . '.' . $img_program->getClientOriginalExtension();
            
            // Move the uploaded image to the desired directory
            $img_program->move('uploads/visitor/program/', $new_gambar);
    
            // Delete old image if exists
            if (file_exists(public_path($program->img_program))) {
                unlink(public_path($program->img_program));
            }
    
            $program->img_program = 'uploads/visitor/program/' . $new_gambar;
        }
    
        // Update program data
        $program->kelas = $request->input('kelas');
        $program->save();
    
        // Update or create new detail program records
    $jenis_programs = $request->input('jenis_program');
    $deskripsis = $request->input('deskripsi');

    // Collect existing IDs of detail programs related to this program
    $existingIds = DetailProgram::where('program_id', $program->id)->pluck('id')->toArray();

    // Iterate over the submitted data and update/create detail programs
    foreach ($jenis_programs as $key => $jenis_program) {
        $data = [
            'program_id' => $program->id,
            'jenis_program' => $jenis_program,
            'deskripsi' => $deskripsis[$key]
        ];

        if (isset($existingIds[$key])) {
            // Update existing detail program
            DetailProgram::where('id', $existingIds[$key])->update($data);
            // Remove ID from existing IDs list since it's updated
            unset($existingIds[$key]);
        } else {
            // Create new detail program
            DetailProgram::create($data);
        }
    }

    // Delete any remaining detail programs that were not updated or created
    if (!empty($existingIds)) {
        DetailProgram::whereIn('id', $existingIds)->delete();
    }

    return redirect()->route('program.index')->with('success', 'Program berhasil diperbarui.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    
        DetailProgram::where('program_id', $id)->delete();
    
        // Kemudian hapus Raport
        $program = Program::findOrFail($id);
        $program->delete();
    
        return redirect()->route('program.index')->with('success', 'Raport deleted successfully.');
    }
}
