@extends('layouts.main')

@section('content')
<div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $student->nama }}</h5>
                        <p class="card-text">NIS: {{ $student->nis }}</p>
                        <p class="card-text">Tanggal Lahir: {{ $student->tanggal_lahir }}</p>
                        <p class="card-text">Kelas: {{ $student->grade->name }}</p>
                        <p class="card-text">Alamat: {{ $student->alamat }}</p>
                        <a href="/student/all" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection