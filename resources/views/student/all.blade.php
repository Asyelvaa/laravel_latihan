@extends('layouts.main')

@section('content')
<div class="container mt-5 ">
<table class="table">
<h1>Data Siswa</h1>

<a href="{{ route('student.create') }}"  type="button" class="btn btn-primary">Tambah Siswa</a>

@if(session()->has('success'))
<div class="alert alert-success col-lg-12" role="alert">
    {{session('success')}}
</div>
@endif

<div class="row justify-content-center">
<table class="table">
    <thead>
        <tr>
            <th scope="col" style="width: 5%;">No</th>
            <th scope="col" style="width: 15%;">NIS</th>
            <th scope="col" style="width: 30%;">Nama</th>
            <th scope="col" style="width: 20%;">Kelas</th>
            <th scope="col" style="width: 30%;">Action</th>
        </tr>   
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
        <th scope="row">{{$loop->iteration}}</th>
            <td style="width: 15%;">{{$student["nis"]}}</td>
            <td style="width: 30%;">{{$student["nama"]}}</td>
            <td style="width: 20%;">{{optional($student->grade)->name}}</td>
            <td>
                <a href="/student/detail/{{ $student->id }}" class="btn btn-primary">Detail</a>
                <a href="/student/{{ $student->id }}/edit" class="btn btn-warning">Edit</a>
                <a href="/student/{{ route('student.destroy', ['student' => $student->id]) }}"
                  type="button" 
                  class="btn btn-danger"
                  onclick="confirmDelete('{{ $student->id }}')"> Delete </a>
                <form id="delete-form-{{ $student->id }}" action="{{ route('student.destroy', ['student' => $student->id]) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
              </td> 
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>

<script>
    setTimeout(function() {
      document.getElementById('success-alert').style.display = 'none';
    }, 5000);

    function confirmDelete(studentId) {
          var result = confirm("Are you sure you want to delete this student?");
          if (result) {
              event.preventDefault();
              document.getElementById('delete-form-' + studentId).submit();
          } else {
              event.preventDefault();
          }
    }
  </script>
@endsection