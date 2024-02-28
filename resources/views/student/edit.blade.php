@extends('dashboard.dashboard')

@section('content')
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Data Siswa</div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    <form method="post" action="{{ route('student.update', ['student' => $student->id]) }}">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="nis" class="form-label">NIS</label>
                        <input type="number" class="form-control" id="nis" name="nis" value="{{old('nis', $student->nis)}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama',  $student->nama)}}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir',  $student->tanggal_lahir)}}">
                    </div>
                    <div class="mb-3">
                        <label for="grades" class="form-label">Kelas</label>
                        <select class="form-select" name="grade_id" id="grade_id">
                            @foreach($grade_id as $grade)
                            <option value="{{ $grade->id }}" {{ $grade->id == $student->grade_id ? 'selected' : '' }}> {{ $grade->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{old('alamat',  $student->alamat)}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 @endsection