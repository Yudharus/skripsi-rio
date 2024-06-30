@extends('layouts.app')

@section('content')
<div class="container mt-4">
        <h2>Data User</h2>
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahUserModal">Tambah User</button>
        <div class="table-responsive table-striped">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Bagian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="dataUser">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->bagian }}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editUserModal{{ $user->id }}">Edit</button>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal Edit Obat -->
                        <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editUserModalLabel{{ $user->id }}">Edit Data User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formEditObat{{ $user->id }}" method="POST" action="{{ route('user.update', $user->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="namaUser{{ $user->id}}">Nama</label>
                                                <input type="text" class="form-control" id="namaUser{{ $user->id }}" name="name" value="{{ $user->name }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="username{{ $user->id }}">Username</label>
                                                <input type="text" class="form-control" id="username{{ $user->id }}" name="username" value="{{ $user->username }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="emailUser{{ $user->id }}">Email</label>
                                                <input type="text" class="form-control" id="emailUser{{ $user->id }}" name="email" value="{{ $user->email }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="passwordUser{{ $user->id }}">Password</label>
                                                <input type="text" class="form-control" id="passwordUser{{ $user->id }}" name="password" value="{{ $user->password }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="bagianUser{{ $user->id }}">Bagian</label>
                                                <input type="text" class="form-control" id="bagianUser{{ $user->id }}" name="bagian" value="{{ $user->bagian }}" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

   <!-- Modal Tambah Obat -->
   <div class="modal fade" id="tambahUserModal" tabindex="-1" role="dialog" aria-labelledby="tambahUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahObatModalLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formTambahUser" method="POST" action="{{ route('user.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="namaUser">Nama</label>
                            <input type="text" class="form-control" id="namaUser" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="bagian">Bagian</label>
                            <input type="text" class="form-control" id="bagian" name="bagian" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection