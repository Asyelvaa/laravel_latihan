@extends('layouts.main')

@section('content')
    <h1>Add Grade</h1>
    <form method="post" action="{{route('grade.add')}}">
    @csrf
        <div class="mb-3">
        <label for="name" class="form-label">Kelas</label>
        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
    </div>
    
    <button type="submit" class="btn btn-primary">Add</button>
    </form>

@endsection