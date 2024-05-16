<?php

namespace App\Http\Controllers\Admin\Administrator;

use App\Exports\ExportPegawai;
use App\Http\Controllers\Controller;
use App\Models\Agama;
use App\Models\GolonganDarah;
use App\Models\JenisKelamin;
use App\Models\LokasiTugas;
use App\Models\User;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Dompdf\Options;
use Maatwebsite\Excel\Facades\Excel;
use TCPDF;


class AdministratorController extends Controller
{
    /* ================================== - Admin - ===================================================== */
    public function admin()
    {
        $users = User::all();
        return view('admin.administrator.admin', compact('users'));
    }

    public function guru()
    {
        $users = User::all();
        return view('admin.administrator.guru', compact('users'));
    }

    public function staff()
    {
        $users = User::all();
        return view('admin.administrator.staff', compact('users'));
    }

    public function direktur()
    {
        $users = User::all();
        return view('admin.administrator.direktur', compact('users'));
    }

    public function create()
    {
        $lokasi = LokasiTugas::all();
        $users = User::all();

        return view('admin.administrator.create', compact('users', 'lokasi'));
    }

    public function show($id)
    {
        $pendidikan = Pendidikan::all();
        $agama = Agama::all();
        $jeniskelamin = JenisKelamin::all();
        $golongandarah = GolonganDarah::all();
        $lokasi = LokasiTugas::all();

        $user = User::findOrFail($id);


        switch ($user->role) {
            case 0:
                $redirectRoute = 'admin.administrator.admin';
                break;
            case 1:
                $redirectRoute = 'admin.administrator.guru';
                break;
            case 2:
                $redirectRoute = 'admin.administrator.staff';
                break;
            case 3:
                    $redirectRoute = 'admin.administrator.direktur';
                    break;
            default:
                $redirectRoute = 'dashboard';
                break;
        }

        return view('admin.administrator.show', compact('user', 'redirectRoute', 'pendidikan', 'agama', 'jeniskelamin', 'golongandarah', 'lokasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'pengalaman' => 'required',
            'no_telepon' => 'required',
            'lokasi_penugasan_id' => 'required|string',
            'role' => 'required|string|in:admin,guru,staff,direktur',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Foto harus berupa gambar dengan maksimum 2MB
        ]);

        // Jika pengguna mengunggah foto, simpan foto yang diunggah, jika tidak, gunakan 'bodat.jpg'
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->role = match ($request->role) {
            'admin' => 0,
            'guru' => 1,
            'staff' => 2,
            'direktur' => 3,
            default => 0,
        };

        // Generate NIP
        $lokasi_penugasan_id = str_pad($request->lokasi_penugasan_id ?? 0, 1, '0', STR_PAD_LEFT); // Ambil lokasi_penugasan_id atau isi 0 jika null
        $tahun_masuk = date('y');
        $tahun_lahir = substr(date('Y', strtotime($user->tanggal_lahir)), -2);
        $latest_user = User::latest()->first(); // Ambil user terakhir untuk mendapatkan nomor urut terakhir
        $nomor_urut = $latest_user ? ((int) substr($latest_user->nip, -3)) + 1 : 1; // Jika tidak ada user sebelumnya, nomor urut dimulai dari 1
        $user->nip = $lokasi_penugasan_id . $tahun_masuk . $tahun_lahir . str_pad($nomor_urut, 3, '0', STR_PAD_LEFT);
        $user->save();

        switch ($user->role) {
            case 'admin':
                $redirectRoute = 'admin.administrator.admin';
                break;
            case 'guru':
                $redirectRoute = 'admin.administrator.guru';
                break;
            case 'staff':
                $redirectRoute = 'admin.administrator.staff';
                break;
                case 'direktur':
                    $redirectRoute = 'admin.administrator.direktur';
                    break;
            default:
                $redirectRoute = 'dashboard';
                break;
        }

        return redirect()->route($redirectRoute)->with('success', 'Akun berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        $pendidikan = Pendidikan::all();
        $agama = Agama::all();
        $jeniskelamin = JenisKelamin::all();
        $golongandarah = GolonganDarah::all();
        $lokasi = LokasiTugas::all();
        return view('admin.administrator.edit', compact('user', 'pendidikan', 'agama', 'jeniskelamin', 'golongandarah', 'lokasi'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nip' => 'nullable|string',
            'golongan_darah_id' => 'nullable|string',
            'jenis_kelamin_id' => 'nullable|string',
            'agama_id' => 'nullable|string',
            'pendidikan_id' => 'nullable|string',
            'alamat' => 'nullable|string',

            'no_telepon' => 'nullable|string|size:12',
            'lulusan' => 'nullable|string',
            'pengalaman' => 'nullable|string',

            'tanggal_masuk' => 'nullable|date',
            'tanggal_keluar' => 'nullable|date',
            'tempat_lahir' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'lokasi_penugasan_id' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'newPassword' => 'nullable|string', // Ganti validasi password
        ]);

        // Perbarui atribut yang dapat diisi dari request
        $user->fill($request->except('foto', 'newPassword'));

        // Perbarui password jika disertakan dalam permintaan
        if ($request->filled('newPassword')) {
            $user->password = Hash::make($request->newPassword);
        }

        // Proses penyimpanan foto Data Diri jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_foto = time() . '.' . $foto->getClientOriginalExtension();
            $lokasi_simpan = public_path('uploads/pegawai'); // Lokasi penyimpanan diubah sesuai kebutuhan
            $foto->move($lokasi_simpan, $nama_foto);

            // Hapus foto lama jika ada
            if ($user->foto) {
                $foto_lama = public_path('uploads/pegawai/' . $user->foto);
                if (file_exists($foto_lama)) {
                    unlink($foto_lama);
                }
            }

            // Set foto baru
            $user->foto = $nama_foto;
        }

        $user->save();

        switch ($user->role) {
            case 'admin':
                $redirectRoute = 'admin.administrator.admin';
                break;
            case 'guru':
                $redirectRoute = 'admin.administrator.guru';
                break;
            case 'staff':
                $redirectRoute = 'admin.administrator.staff';
                break;
                case 'direktur':
                    $redirectRoute = 'admin.administrator.direktur';
                    break;
            default:
                $redirectRoute = 'dashboard';
                break;
        }

        return redirect()->route($redirectRoute)->with('success', 'Akun berhasil diperbarui.');
    }

    // Menghapus akun
    public function destroy(User $user)
    {
        $user->delete();

        // Tentukan rute redirect berdasarkan peran pengguna yang dihapus
        switch ($user->role) {
            case 'admin':
                $redirectRoute = 'admin.administrator.admin';
                break;
            case 'guru':
                $redirectRoute = 'admin.administrator.guru';
                break;
            case 'staff':
                $redirectRoute = 'admin.administrator.staff';
                break;
            case 'direktur':
                $redirectRoute = 'admin.administrator.direktur';
                break;    
            default:
                $redirectRoute = 'dashboard';
                break;
        }

        return redirect()->route($redirectRoute)->with('success', 'Akun berhasil diperbarui.');
    }


    /* ======================================== - GURU - ===================================================== */
    public function editGuruDataDiri(User $user)
    {
        $pendidikan = Pendidikan::all();
        $agama = Agama::all();
        $jeniskelamin = JenisKelamin::all();
        $golongandarah = GolonganDarah::all();
        $lokasi = LokasiTugas::all();
        if (auth()->user()->id === $user->id && $user->role === 'guru') {
            return view('guru.DataDiri.edit', compact('user', 'pendidikan', 'agama', 'jeniskelamin', 'golongandarah', 'lokasi'));
        } else {
            return redirect()->back()->with('error', 'Anda tidak diizinkan mengedit Data Diri guru lain.');
        }
    }

    public function updateGuruDataDiri(Request $request, User $user)
    {
        $request->validate([
            'golongan_darah_id' => 'nullable|string',
            'jenis_kelamin_id' => 'nullable|string',
            'agama_id' => 'nullable|string',
            'pendidikan_id' => 'nullable|string',
            'alamat' => 'nullable|string',

            'no_telepon' => 'nullable|integer',
            'lulusan' => 'nullable|string',
            'pengalaman' => 'nullable|string',

            'tanggal_masuk' => 'nullable|date',
            'tanggal_keluar' => 'nullable|date',
            'tempat_lahir' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        $user->fill($request->except('password'));

        // Perbarui password jika disertakan dalam permintaan
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        // Proses penyimpanan foto Data Diri jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_foto = time() . '.' . $foto->getClientOriginalExtension();
            $lokasi_simpan = public_path('uploads/pegawai'); // Lokasi penyimpanan diubah sesuai kebutuhan
            $foto->move($lokasi_simpan, $nama_foto);

            // Hapus foto lama jika ada
            if ($user->foto) {
                $foto_lama = public_path('uploads/pegawai/' . $user->foto);
                if (file_exists($foto_lama)) {
                    unlink($foto_lama);
                }
            }

            // Set foto baru
            $user->foto = $nama_foto;

            // Simpan perubahan pada model pengguna
            $user->save();

            return redirect()->route('guru.DataDiri.show', ['user' => $user])->with('success', 'Data Diri guru berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Anda tidak diizinkan mengedit Data Diri guru lain.');
        }
    }



    public function showGuruDataDiri(User $user)
    {
        $pendidikan = Pendidikan::all();
        $agama = Agama::all();
        $jeniskelamin = JenisKelamin::all();
        $golongandarah = GolonganDarah::all();
        $lokasi = LokasiTugas::all();

        if (auth()->user()->id === $user->id && $user->role === 'guru') {
            return view('guru.DataDiri.show', compact('user', 'pendidikan', 'agama', 'jeniskelamin', 'golongandarah', 'lokasi'));
        } else {
            return redirect()->back()->with('error', 'Anda tidak diizinkan melihat Data Diri guru lain.');
        }
    }


    /* ======================================== - STAFF - ===================================================== */

    public function editStaffDataDiri(User $user)
    {
        $pendidikan = Pendidikan::all();
        $agama = Agama::all();
        $jeniskelamin = JenisKelamin::all();
        $golongandarah = GolonganDarah::all();
        $lokasi = LokasiTugas::all();
        if (auth()->user()->id === $user->id && $user->role === 'staff') {
            return view('staff.DataDiri.edit', compact('user', 'pendidikan', 'agama', 'jeniskelamin', 'golongandarah', 'lokasi'));
        } else {
            return redirect()->back()->with('error', 'Anda tidak diizinkan mengedit Data Diri staff lain.');
        }
    }

    public function updateStaffDataDiri(Request $request, User $user)
    {
        $request->validate([
            'nama_lengkap' => 'required|string',
            'golongan_darah_id' => 'nullable|string',
            'jenis_kelamin_id' => 'nullable|string',
            'agama_id' => 'nullable|string',
            'pendidikan_id' => 'nullable|string',
            'alamat' => 'nullable|string',

            'no_telepon' => 'nullable|integer',
            'lulusan' => 'nullable|string',
            'pengalaman' => 'nullable|string',

            'tanggal_masuk' => 'nullable|date',
            'tanggal_keluar' => 'nullable|date',
            'tempat_lahir' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if (auth()->user()->id === $user->id && $user->role === 'staff') {

            $user->fill($request->except('password'));

            // Perbarui password jika disertakan dalam permintaan
            if ($request->has('password')) {
                $user->password = Hash::make($request->password);
            }

            // Proses penyimpanan foto Data Diri jika ada
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $nama_foto = time() . '.' . $foto->getClientOriginalExtension();
                $lokasi_simpan = public_path('uploads/pegawai'); // Lokasi penyimpanan diubah sesuai kebutuhan
                $foto->move($lokasi_simpan, $nama_foto);

                // Hapus foto lama jika ada
                if ($user->foto) {
                    $foto_lama = public_path('uploads/pegawai/' . $user->foto);
                    if (file_exists($foto_lama)) {
                        unlink($foto_lama);
                    }
                }

                // Set foto baru
                $user->foto = $nama_foto;
            }

            // Simpan perubahan pada model pengguna
            $user->save();


            return redirect()->route('staff.DataDiri.show', ['user' => $user])->with('success', 'Data Diri anda berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Anda tidak diizinkan mengedit Data Diri anda lain.');
        }
    }


    public function showStaffDataDiri(User $user)
    {
        $pendidikan = Pendidikan::all();
        $agama = Agama::all();
        $jeniskelamin = JenisKelamin::all();
        $golongandarah = GolonganDarah::all();
        $lokasi = LokasiTugas::all();
        if (auth()->user()->id === $user->id && $user->role === 'staff') {
            return view('staff.DataDiri.show', compact('user', 'pendidikan', 'agama', 'jeniskelamin', 'golongandarah', 'lokasi'));
        } else {
            return redirect()->back()->with('error', 'Anda tidak diizinkan melihat Data Diri staff lain.');
        }
    }

/*==============================================================================================================================  */

public function editDirekturDataDiri(User $user)
    {
        $pendidikan = Pendidikan::all();
        $agama = Agama::all();
        $jeniskelamin = JenisKelamin::all();
        $golongandarah = GolonganDarah::all();
        $lokasi = LokasiTugas::all();
        if (auth()->user()->id === $user->id && $user->role === 'direktur') {
            return view('direktur.DataDiri.edit', compact('user', 'pendidikan', 'agama', 'jeniskelamin', 'golongandarah', 'lokasi'));
        } else {
            return redirect()->back()->with('error', 'Anda tidak diizinkan mengedit Data Diri direktur lain.');
        }
    }


    public function updateDirekturDataDiri(Request $request, User $user)
    {
        $request->validate([
            'golongan_darah_id' => 'nullable|string',
            'jenis_kelamin_id' => 'nullable|string',
            'agama_id' => 'nullable|string',
            'pendidikan_id' => 'nullable|string',
            'alamat' => 'nullable|string',
            'tanggal_masuk' => 'nullable|date',
            'tanggal_keluar' => 'nullable|date',
            'tempat_lahir' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        $user->fill($request->except('password'));

        // Perbarui password jika disertakan dalam permintaan
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        // Proses penyimpanan foto Data Diri jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_foto = time() . '.' . $foto->getClientOriginalExtension();
            $lokasi_simpan = public_path('uploads/pegawai'); // Lokasi penyimpanan diubah sesuai kebutuhan
            $foto->move($lokasi_simpan, $nama_foto);

            // Hapus foto lama jika ada
            if ($user->foto) {
                $foto_lama = public_path('uploads/pegawai/' . $user->foto);
                if (file_exists($foto_lama)) {
                    unlink($foto_lama);
                }
            }

            // Set foto baru
            $user->foto = $nama_foto;

            // Simpan perubahan pada model pengguna
            $user->save();

            return redirect()->route('direktur.DataDiri.show', ['user' => $user])->with('success', 'Data Diri direktur berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Anda tidak diizinkan mengedit Data Diri direktur lain.');
        }
    }

    public function showDirekturDataDiri(User $user)
    {
        $pendidikan = Pendidikan::all();
        $agama = Agama::all();
        $jeniskelamin = JenisKelamin::all();
        $golongandarah = GolonganDarah::all();
        $lokasi = LokasiTugas::all();

        if (auth()->user()->id === $user->id && $user->role === 'direktur') {
            return view('direktur.DataDiri.show', compact('user', 'pendidikan', 'agama', 'jeniskelamin', 'golongandarah', 'lokasi'));
        } else {
            return redirect()->back()->with('error', 'Anda tidak diizinkan melihat Data Diri direktur lain.');
        }
    }

    public function showResetPasswordDirektur(User $user)
    {
        return view('direktur.DataDiri.password', compact('user'));
    }

    public function resetPasswordDirektur(Request $request, User $user)
    {
        $request->validate([
            'tanggal_lahir' => 'required|date',
            'new_password' => 'required|string|min:8',
            'confirm_password' => 'required|string|same:new_password',
        ]);

        // Validasi tanggal lahir
        if ($request->tanggal_lahir == $user->tanggal_lahir) {
            // Reset password
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->route('direktur.DataDiri.show', ['user' => $user])->with('success', 'Password berhasil direset.');
        } else {
            return redirect()->back()->with('error', 'Tanggal lahir tidak cocok. Password tidak direset.');
        }
    }


    /* ============================================================================================================================== */

    public function showResetPasswordGuru(User $user)
    {
        return view('guru.DataDiri.password', compact('user'));
    }

    public function resetPasswordGuru(Request $request, User $user)
    {
        $request->validate([
            'tanggal_lahir' => 'required|date',
            'new_password' => 'required|string|min:8',
            'confirm_password' => 'required|string|same:new_password',
        ]);

        // Validasi tanggal lahir
        if ($request->tanggal_lahir == $user->tanggal_lahir) {
            // Reset password
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->route('guru.DataDiri.show', ['user' => $user])->with('success', 'Password berhasil direset.');
        } else {
            return redirect()->back()->with('error', 'Tanggal lahir tidak cocok. Password tidak direset.');
        }
    }

    public function showResetPasswordStaff(User $user)
    {
        return view('staff.DataDiri.password', compact('user'));
    }

    public function resetPasswordStaff(Request $request, User $user)
    {
        $request->validate([
            'tanggal_lahir' => 'required|date',
            'new_password' => 'required|string|min:8',
            'confirm_password' => 'required|string|same:new_password',
        ]);

        // Validasi tanggal lahir
        if ($request->tanggal_lahir == $user->tanggal_lahir) {
            // Reset password
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->route('staff.DataDiri.show', ['user' => $user])->with('success', 'Password berhasil direset.');
        } else {
            return redirect()->back()->with('error', 'Tanggal lahir tidak cocok. Password tidak direset.');
        }
    }

    



    public function nonaktifkanAdmin($id)
    {
        $admin = User::find($id);
        if (!$admin) {
            return redirect()->route('admin.administrator.admin')->with('error', 'Admin tidak ditemukan.');
        }

        if ($admin->role !== 'admin') {
            return redirect()->route('admin.administrator.admin')->with('error', 'Pengguna bukan admin.');
        }

        $admin->status = 'nonaktif';
        $admin->tanggal_keluar = now();
        $admin->save();

        return redirect()->route('admin.administrator.admin')->with('success', 'Admin berhasil dinonaktifkan.');
    }

    public function aktifkanAdmin($id)
    {
        $admin = User::find($id);
        if (!$admin) {
            return redirect()->route('admin.administrator.admin')->with('error', 'Admin tidak ditemukan.');
        }

        if ($admin->role !== 'admin') {
            return redirect()->route('admin.administrator.admin')->with('error', 'Pengguna bukan admin.');
        }

        $admin->status = 'aktif';
        $admin->tanggal_keluar = null;
        $admin->save();

        return redirect()->route('admin.administrator.admin')->with('success', 'Admin berhasil diaktifkan kembali.');
    }
    public function nonaktifkanGuru($id)
    {
        $guru = User::find($id);
        if (!$guru) {
            return redirect()->route('admin.administrator.guru')->with('error', 'Guru tidak ditemukan.');
        }

        if ($guru->role !== 'guru') {
            return redirect()->route('admin.administrator.guru')->with('error', 'Pengguna bukan guru.');
        }

        $guru->status = 'nonaktif';
        $guru->tanggal_keluar = now();
        $guru->save();

        return redirect()->route('admin.administrator.guru')->with('success', 'Guru berhasil dinonaktifkan.');
    }

    public function aktifkanGuru($id)
    {
        $guru = User::find($id);
        if (!$guru) {
            return redirect()->route('admin.administrator.guru')->with('error', 'Guru tidak ditemukan.');
        }

        if ($guru->role !== 'guru') {
            return redirect()->route('admin.administrator.guru')->with('error', 'Pengguna bukan guru.');
        }

        $guru->status = 'aktif';
        $guru->tanggal_keluar = null;
        $guru->save();

        return redirect()->route('admin.administrator.guru')->with('success', 'Guru berhasil diaktifkan kembali.');
    }


    public function nonaktifkanStaff($id)
    {
        $staff = User::find($id);
        if (!$staff) {
            return redirect()->route('admin.administrator.staff')->with('error', 'Staff tidak ditemukan.');
        }

        if ($staff->role !== 'staff') {
            return redirect()->route('admin.administrator.staff')->with('error', 'Pengguna bukan staff.');
        }

        $staff->status = 'nonaktif';
        $staff->tanggal_keluar = now();
        $staff->save();

        return redirect()->route('admin.administrator.staff')->with('success', 'Staff berhasil dinonaktifkan.');
    }

    public function aktifkanStaff($id)
    {
        $pegawai = User::find($id);
        if (!$pegawai) {
            return redirect()->route('admin.administrator.staff')->with('error', 'Pegawai tidak ditemukan.');
        }

        if ($pegawai->role !== 'staff') {
            return redirect()->route('admin.administrator.staff')->with('error', 'Pengguna bukan pegawai.');
        }

        $pegawai->status = 'aktif';
        $pegawai->tanggal_keluar = null;
        $pegawai->save();

        return redirect()->route('admin.administrator.staff')->with('success', 'Pegawai berhasil diaktifkan kembali.');
    }

    public function nonaktifkanDirektur($id)
    {
        $direktur = User::find($id);
        if (!$direktur) {
            return redirect()->route('admin.administrator.direktur')->with('error', 'direktur tidak ditemukan.');
        }

        if ($direktur->role !== 'direktur') {
            return redirect()->route('admin.administrator.direktur')->with('error', 'Pengguna bukan direktur.');
        }

        $direktur->status = 'nonaktif';
        $direktur->tanggal_keluar = now();
        $direktur->save();

        return redirect()->route('admin.administrator.direktur')->with('success', 'direktur berhasil dinonaktifkan.');
    }

    public function aktifkanDirektur($id)
    {
        $direktur = User::find($id);
        if (!$direktur) {
            return redirect()->route('admin.administrator.direktur')->with('error', 'direktur tidak ditemukan.');
        }

        if ($direktur->role !== 'direktur') {
            return redirect()->route('admin.administrator.direktur')->with('error', 'Pengguna bukan direktur.');
        }

        $direktur->status = 'aktif';
        $direktur->tanggal_keluar = null;
        $direktur->save();

        return redirect()->route('admin.administrator.direktur')->with('success', 'direktur berhasil diaktifkan kembali.');
    }


    public function generatePDF($id)
    {
        $user = User::findOrFail($id);
    
        // Load view content into a variable
        $pdfView = view('admin.administrator.pdf', compact('user'))->render();
    
        // Setup Dompdf options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);
    
        // Instantiate Dompdf with options
        $dompdf = new Dompdf($options);
    
        // Load HTML content into Dompdf
        $dompdf->loadHtml($pdfView);
    
        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
    
        // Create stream context to disable SSL verification
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ],
        ]);
    
        // Set stream context for Dompdf
        $dompdf->setHttpContext($context);
    
        // Render PDF (optional: save to file)
        $dompdf->render();
    
        // Output PDF to browser
        return $dompdf->stream('user_profile.pdf');
    }

    public function all()
    {
        $users = User::all();
        return view('admin.administrator.all', compact('users'));
    }

    public function export_excel()
    {
        return Excel::download(new ExportPegawai, 'pegawaiYPArumahdamai.xlsx');
    }
    
}
