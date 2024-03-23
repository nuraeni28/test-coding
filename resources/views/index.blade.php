<!DOCTYPE html>
<html lang="en">


@include('partials.header')

<div class="page-content-wrapper mt-10" style="margin:30px">
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="form-group">
                                <div class="alert alert-info" role="alert">
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-6">
                                <h4 class="mt-0 header-title">Data Mahasiswa</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('student.index') }}" class="btn btn-primary mb-2">
                                    Tambah Data
                                </a>
                            </div>
                        </div>
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Jurusan</th>
                                    <th>No Hp</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->nim }}</td>
                                        <td>{{ $student->gender }}</td>
                                        <td>{{ $student->major }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td>{{ $student->address }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.footer')
