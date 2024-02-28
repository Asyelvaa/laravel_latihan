@extends('dashboard.dashboard')

@section('content')
<div class="container mt-5 ">
    <table class="table">
        <h1>Data Siswa</h1>
        <form action="/dashboard/student">
            <div class="input-group mb-5">
                <input type="text" class="form-control " placeholder="Search" name="search" value="{{request('search')}}">
                <button class="btn text-bg-dark" type="submit" id="button-addon2">Search</button>
            </div>
        </form>
        <a href="{{ route('student.create') }}" type="button" class="btn btn-dark">Tambah Siswa</a>

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
                    @php
                    $perPage = $students->perPage();
                    $currentPage = $students->currentPage();
                    $startNumber = ($currentPage - 1) * $perPage + 1;
                    @endphp
                    @php $startNumber = ($students->currentPage() - 1) * $students->perPage() + 1; @endphp
                    @foreach($students as $student)

                    <tr>
                        <th scope="row">{{ $startNumber }}</th>
                        <td style="width: 15%;">{{$student["nis"]}}</td>
                        <td style="width: 30%;">{{$student["nama"]}}</td>
                        <td style="width: 20%;">{{optional($student->grade)->name}}</td>
                        <td>
                            <a href="/dashboard/student/detail/{{ $student->id }}" class="btn btn-primary">Detail</a>
                            <a href="/student/{{ $student->id }}/edit" class="btn btn-warning">Edit</a>
                            <a href="/student/{{ route('student.destroy', ['student' => $student->id]) }}" type="button" class="btn btn-danger" onclick="confirmDelete('{{ $student->id }}')"> Delete </a>
                            <form id="delete-form-{{ $student->id }}" action="{{ route('student.destroy', ['student' => $student->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @php $startNumber++; @endphp
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-5">
                <ul class="pagination pagination-light">
                    <li class="page-item {{ $students->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $students->previousPageUrl() }}" tabindex="-1" aria-disabled="true">
                            <span aria-hidden="true">&laquo;</span> Previous
                        </a>
                    </li>

                    @foreach ($students as $student)
                    <li class="page-item {{ $students->currentPage() == $loop->index + 1 ? 'active' : '' }}">
                        <a class="page-link" href="{{ $students->url($loop->index + 1) }}">{{ $loop->index + 1 }}</a>
                    </li>
                    @endforeach

                    <li class="page-item {{ $students->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $students->nextPageUrl() }}">
                            Next <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
</div>

<script>
    setTimeout(function() {
        document.getElementById('success-alert').style.display = 'none';
    }, 3000);

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