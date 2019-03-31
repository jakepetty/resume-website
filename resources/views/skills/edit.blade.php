@extends('layouts.backend')
@section('content')
<section class="container">
    <form action="{{ route('skills.update', $skill->id) }}" method="POST">
        @csrf @method('PUT')
        <input type="text" name="name" value="{{ old('name', $skill->name) }}" required>
        <input type="number" name="start_date" min="2003" max="{{ date('Y')}}" value="{{ old('start_date', $skill->start_date) }}" required>
        <input type="number" name="end_date" min="2003" max="{{ date('Y')}}" value="{{ old('end_date', $skill->end_date) }}" required>
        <input type="number" name="level" min="0" max="100" value="{{ old('level', $skill->level) }}" required>
        <button>Save</button>
    </form>
</section>
@endsection
