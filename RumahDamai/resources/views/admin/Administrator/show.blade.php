<!-- resources/views/admin/administrator/show.blade.php -->
@extends('layouts.management.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Diri</h4>
                <p class="card-description">{{ $user->nama_lengkap }} {{ $user->nip }} <span class="text-success">{{ $user->status }}</span></p>
                <div class="row">
                    <div class="col-md-8">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <td>{{ $user->nama_lengkap ?? 'Data tidak tersedia' }}</td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $user->email ?? 'Data tidak tersedia' }}</td>
                                    </tr>
                                    <tr>
                                        <th>NIP</th>
                                        <td>{{ $user->nip ?? 'Data tidak tersedia' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>
                                            @if ($user->jenis_kelamin_id)
                                                {{ $jeniskelamin->where('id', $user->jenis_kelamin_id)->first()->jenis_kelamin }}
                                            @else
                                                Jenis kelamin tidak tersedia.
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Golongan Darah</th>
                                        <td>
                                            @if ($user->golongan_darah_id)
                                                {{ $golongandarah->where('id', $user->golongan_darah_id)->first()->golongan_darah }}
                                            @else
                                                Golongan darah tidak tersedia.
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Agama</th>
                                        <td>
                                            @if ($user->agama_id)
                                                {{ $agama->where('id', $user->agama_id)->first()->agama }}
                                            @else
                                                Agama tidak tersedia.
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Pendidikan</th>
                                        <td>
                                            @if ($user->pendidikan_id)
                                                {{ $pendidikan->where('id', $user->pendidikan_id)->first()->tingkat_pendidikan }}
                                            @else
                                                Pendidikan tidak tersedia.
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $user->alamat ?? 'Data tidak tersedia' }}</td>
                                    </tr>
                                    <tr>
                                        <th>No Telepon</th>
                                        <td>{{ $user->no_telepon ?? 'Data tidak tersedia' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Lulusan</th>
                                        <td>{{ $user->lulusan ?? 'Data tidak tersedia' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pengalaman</th>
                                        <td>{!! $user->pengalaman ?? 'Data tidak tersedia' !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Mulai Kerja</th>
                                        <td>{{ $user->tanggal_masuk ?? 'Data tidak tersedia' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tempat Lahir</th>
                                        <td>{{ $user->tempat_lahir ?? 'Data tidak tersedia' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Lahir</th>
                                        <td>{{ $user->tanggal_lahir ?? 'Data tidak tersedia' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Lokasi Penugasan</th>
                                        <td>
                                            @if ($user->lokasi_penugasan_id)
                                                {{ $lokasi->where('id', $user->lokasi_penugasan_id)->first()->lokasi }}
                                            @else
                                                Lokasi penugasan tidak tersedia.
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="image-frame">
                            @if ($user->foto)
                                <img src="{{ asset('uploads/pegawai/' . $user->foto) }}" alt="Foto Profil user" class="img-fluid rounded">
                            @else
                                <p>Tidak ada foto profil.</p>
                            @endif
                        </div>
                    </div>
                </div>
                @if ($user->role == 'admin')
                    <a href="{{ route('admin.administrator.admin') }}" class="btn btn-primary mt-3">Kembali</a>
                @elseif ($user->role == 'guru')
                    <a href="{{ route('admin.administrator.guru') }}" class="btn btn-primary mt-3">Kembali</a>
                @elseif ($user->role == 'staff')
                    <a href="{{ route('admin.administrator.staff') }}" class="btn btn-primary mt-3">Kembali</a>
                @elseif ($user->role == 'direktur') 
                    <a href="{{ route('admin.administrator.direktur') }}" class="btn btn-primary mt-3">Kembali</a>
                @endif
                <!-- Nonaktifkan atau Aktifkan Admin -->
                @if ($user->role === 'admin')
                    @if ($user->status === 'aktif')
                        <form action="{{ route('admin.nonaktifkan.admin', $user->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger mt-3"
                                onclick="return confirm('Yakin ingin menonaktifkan admin ini?')">Nonaktifkan Admin</button>
                        </form>
                    @else
                        <form action="{{ route('admin.aktifkan.admin', $user->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success mt-3"
                                onclick="return confirm('Yakin ingin mengaktifkan admin ini?')">Aktifkan Admin</button>
                        </form>
                    @endif
                @endif

                <!-- Nonaktifkan atau Aktifkan Guru -->
                @if ($user->role === 'guru')
                    @if ($user->status === 'aktif')
                        <form action="{{ route('admin.nonaktifkan.guru', $user->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger mt-3"
                                onclick="return confirm('Yakin ingin menonaktifkan guru ini?')">Nonaktifkan Guru</button>
                        </form>
                    @else
                        <form action="{{ route('admin.aktifkan.guru', $user->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success mt-3"
                                onclick="return confirm('Yakin ingin mengaktifkan guru ini?')">Aktifkan Guru</button>
                        </form>
                    @endif
                @endif

                <!-- Nonaktifkan atau Aktifkan Pegawai -->
                <a href="{{ route('user.pdf', ['id' => $user->id]) }}" class="btn btn-primary mt-3">Generate PDF</a>

                @if ($user->role === 'staff')
                    @if ($user->status === 'aktif')
                        <form action="{{ route('admin.nonaktifkan.staff', $user->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger mt-3"
                                onclick="return confirm('Yakin ingin menonaktifkan pegawai ini?')">Nonaktifkan
                                Pegawai</button>
                        </form>
                    @else
                        <form action="{{ route('admin.aktifkan.staff', $user->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success mt-3"
                                onclick="return confirm('Yakin ingin mengaktifkan pegawai ini?')">Aktifkan Pegawai</button>
                        </form>
                    @endif
                @endif

                @if ($user->role === 'guru')
                    @if ($user->status === 'aktif')
                        <form action="{{ route('admin.nonaktifkan.guru', $user->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-danger mt-3"
                                onclick="return confirm('Yakin ingin menonaktifkan pegawai ini?')">Nonaktifkan
                                Pegawai</button>
                        </form>
                    @else
                        <form action="{{ route('admin.aktifkan.guru', $user->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success mt-3"
                                onclick="return confirm('Yakin ingin mengaktifkan pegawai ini?')">Aktifkan Pegawai</button>
                        </form>
                    @endif
                @endif

                @if ($user->role === 'direktur')
                @if ($user->status === 'aktif')
                    <form action="{{ route('admin.nonaktifkan.direktur', $user->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger mt-3"
                            onclick="return confirm('Yakin ingin menonaktifkan pegawai ini?')">Nonaktifkan
                            Pegawai</button>
                    </form>
                @else
                    <form action="{{ route('admin.aktifkan.direktur', $user->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-success mt-3"
                            onclick="return confirm('Yakin ingin mengaktifkan pegawai ini?')">Aktifkan Pegawai</button>
                    </form>
                @endif
            @endif

            </div>
        </div>
    </div>
@endsection
