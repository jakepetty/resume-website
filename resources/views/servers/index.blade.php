@extends('layouts.backend')
@section('content')
<section class="container">
    <div class="btn-group float-right">
        <a href="{{ route('servers.create') }}" class="btn btn-outline-dark"><i class="fas fa-plus"></i> {{ __('New Server') }}</a>
    </div>
    <h2 class="mb-4">{{ __('Server Management') }}</h2>
    <table class="table table-borderless table-hover ui-sortable" data-url="{{ route('servers.reorder') }}">
        <thead class="thead-dark">
            <tr>
                <th>{{ __('Server') }}</th>
                <th class="text-right">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servers as $server)
            <tr class="sortable" data-id="{{ $server->id }}">
                <td>{{ $server->name }}</td>
                <td>
                    <form class="form-inline float-right" action="{{ route('servers.destroy', $server->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this server?') }}')">
                        @csrf @method('DELETE')
                        <div class="btn-group">
                            <a class="btn btn-outline-dark btn-sm" href="{{ route('servers.edit', $server->id) }}"><i class="fas fa-edit"></i> {{ __('Edit') }}</a>
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
