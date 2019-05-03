@extends('layouts.frontend')


@section('content')

@component('components.intro')
@endcomponent
@component('components.navbar')
@endcomponent

@component('components.projects', compact('projects'))
@endcomponent
@component('components.skills', compact('skills'))
@endcomponent
@component('components.contact')
@endcomponent
@component('components.footer')
@endcomponent
@if(Session::has('message'))
@component('components.modal')
@slot('name')
{{ Session::get('name') }}
@endslot
@slot('message')
{{ Session::get('message') }}
@endslot
@endcomponent
@endif
@endsection
