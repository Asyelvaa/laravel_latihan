@extends('dashboard.dashboard')

@section('content')

<div class="container mt-5">
    <h1>Data Kelas</h1>
    <a href="/grade/form"  type="button" class="btn btn-dark mt-5">Tambah Kelas</a>

    @if(session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{session('success')}}
    </div>
    @endif

    <table class="table mt-2">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kelas</th>
            </tr>   
        </thead>
        <tbody>
            @foreach($grades as $grade)
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
                <td >{{$grade["name"]}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection