@extends('layouts.backend')
@section('content')
<section class="container">
    <form action="{{ route('tools.update', $tool->id) }}" method="POST">
        @csrf @method('PUT')
        <input type="text" name="name" value="{{ old('name', $tool->name) }}" required>
        <input type="number" name="start_date" min="2003" max="{{ date('Y')}}" value="{{ old('start_date', $tool->start_date) }}" required>
        <input type="number" name="end_date" min="2003" max="{{ date('Y')}}" value="{{ old('end_date', $tool->end_date) }}" required>
        <input type="number" name="level" min="0" max="100" value="{{ old('level', $tool->level) }}" required>
        <button>Save</button>
    </form>
</section>
@endsection
