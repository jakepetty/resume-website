@extends('layouts.backend')
@section('content')
<section class="container">
    <form action="{{ route('skills.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="skill-name">Name</label>
            <input type="text" id="skill-name" class="form-control" name="name" value="{{ old('name') }}" placeholder="Skill Name" required>
        </div>
        <div class="form-group">
            <label for="skill-start-date">Start Date</label>
            <input type="number" id="skill-start-date" class="form-control" name="start_date" min="2003" max="{{ date('Y')}}" value="{{ old('start_date') }}"
                placeholder="Date Started" required>
        </div>
        <div class="form-group">
            <label for="skill-end-date">End Date</label>
            <input type="number" id="skill-end-date" class="form-control" name="end_date" min="2003" max="{{ date('Y')}}" value="{{ old('end_date', date('Y')) }}"
                required>
        </div>
        <div class="form-group">
            <label for="skill-level">Level</label>
            <input type="number" id="skill-level" class="form-control" name="level" min="0" max="100" value="{{ old('level') }}" required>
        </div>
        <button>Save</button>
    </form>
</section>
@endsection
