@extends('layouts.main')

@section('content')
    <h1>Add Student Data</h1>
    <form method="post" action="{{ route('student.store')}}">
    @csrf
    <div class="mb-3">
        <label for="nis" class="form-label">NIS</label>
        <input type="number" class="form-control" id="nis" name="nis" value="{{old('nis')}}">
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama')}}">
    </div>
    <div class="mb-3">
        <label for="tanggal_lahir" class="form-label">Tanggal lahir</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir')}}">
    </div>
    <div class="mb-3">
        <label for="kelas" class="form-label">Kelas</label>
        <!-- <input type="text" class="form-control" id="kelas" name="kelas" value="{{old('kelas')}}"> -->
        <select class="form-select"  name="grade_id">
            @foreach($grades as $grade)
                <option name="grade_id" value="{{$grade->id}}">{{$grade->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{old('alamat')}}">
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
    </form>

@endsection