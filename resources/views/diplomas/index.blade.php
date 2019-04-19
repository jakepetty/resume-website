@extends('layouts.backend')
@section('content')
<section class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Diplomas') }}</li>
        </ol>
    </nav>
    <div class="btn-group float-right">
        <a href="{{ route('diplomas.create') }}" class="btn btn-outline-dark"><i class="fas fa-plus"></i> {{ __('New Diploma') }}</a>
    </div>
    <h2 class="mb-4">{{ __('Diploma Management') }}</h2>
    <table class="table table-borderless table-hover">
        <thead class="thead-dark">
            <tr>
                <th>@sortablelink('name', 'School')</th>
                <th>@sortablelink('major', 'Major')</th>
                <th>@sortablelink('location', 'Location')</th>
                <th>@sortablelink('year', 'Year')</th>
                <th class="text-right">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($diplomas as $diploma)
            <tr>
                <td>{{ $diploma->name }}</td>
                <td>{{ $diploma->major }}</td>
                <td>{{ $diploma->location }}</td>
                <td>{{ $diploma->year }}</td>
                <td>
                    <form class="form-inline float-right" action="{{ route('diplomas.destroy', $diploma->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this diploma?') }}')">
                        @csrf @method('DELETE')
                        <div class="btn-group">
                            <a class="btn btn-outline-dark btn-sm" href="{{ route('diplomas.edit', $diploma->id) }}"><i class="fas fa-edit"></i> {{ __('Edit') }}</a>
                            <button class="btn btn-outline-dark btn-sm"><i class="fas fa-times"></i> {{ __('Delete') }}</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $diplomas->appends(\Request::except('page'))->links() }}
</section>
@endsection
