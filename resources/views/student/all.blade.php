@extends('layouts.main')

@section('content')
<table class="table">
<h1>Data Siswa</h1>
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">NIS</th>
            <th scope="col">Nama</th>
            <th scope="col">Kelas</th>
            <th scope="col">Action</th>

        </tr>   
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$student["nis"]}}</td>
            <td>{{$student["nama"]}}</td>
            <td>{{$student["kelas"]}}</td>
            <td>
                <a href="student/detail/{{$student->id}}" type="button" class="btn btn-outline-info">Detail</a>
                <a href="" type="button" class="btn btn-outline-warning">Edit</a>
                <a href="" type="button" class="btn btn-outline-danger">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection