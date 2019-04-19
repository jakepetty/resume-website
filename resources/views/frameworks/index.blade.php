@extends('layouts.backend')
@section('content')
<section class="container">
    <div class="btn-group float-right">
        <a href="{{ route('frameworks.create') }}" class="btn btn-outline-dark"><i class="fas fa-plus"></i> {{ __('New Framework') }}</a>
    </div>
    <h2 class="mb-4">{{ __('Framework Management') }}</h2>
    <table class="table table-borderless table-hover ui-sortable" data-url="{{ route('frameworks.reorder') }}">
        <thead class="thead-dark">
            <tr>
                <th>{{ __('Framework') }}</th>
                <th class="text-right">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($frameworks as $framework)
            <tr class="sortable" data-id="{{ $framework->id }}">
                <td>{{ $framework->name }}</td>
                <td>
                    <form class="form-inline float-right" action="{{ route('frameworks.destroy', $framework->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this framework?') }}')">
                        @csrf @method('DELETE')
                        <div class="btn-group">
                            <a class="btn btn-outline-dark btn-sm" href="{{ route('frameworks.edit', $framework->id) }}"><i class="fas fa-edit"></i> {{ __('Edit') }}</a>
                            <button class="btn btn-outline-dark btn-sm"><i class="fas fa-times"></i> {{ __('Delete') }}</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection
