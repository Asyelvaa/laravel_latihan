@extends('layouts.main')

@section('content')
<div class="container mt-2 text-center">
    <h1>Data Kelas</h1>
    @if(session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{session('success')}}
    </div>
    @endif
    <div class="row justify-content-center mt-5">
    <table class="table " style="width: 300px">
        <thead>
            <tr class="table-dark">
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
</div>
@endsection