@extends('layouts.main')

@section('content')
<div class="container mt-2 text-center">

    <h1>Data Siswa</h1>
    
    @if(session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{session('success')}}
    </div>
    @endif

    <div class="row justify-content-center mt-5">
    <table class="table" style="width : 80%">
        <thead>
            <tr class="table-dark">
                <th scope="col" style="width: 5%;">No</th>
                <th scope="col" style="width: 15%;">NIS</th>
                <th scope="col" style="width: 30%;">Nama</th>
                <th scope="col" style="width: 20%;">Kelas</th>
                <th scope="col" style="width: 10%;">Action</th>
            </tr>   
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
            <th scope="row">{{$loop->iteration}}</th>
                <td style="width: 15%;">{{$student["nis"]}}</td>
                <td style="width: 40%;">{{$student["nama"]}}</td>
                <td style="width: 10%;">{{optional($student->grade)->name}}</td>
                <td>
                    <a href="/student/detail/{{ $student->id }}" class="btn btn-primary">Detail</a>
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