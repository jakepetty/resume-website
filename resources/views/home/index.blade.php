@extends('layouts.frontend')


@section('content')

<!-- INTRO BEGIN -->
@component('components.intro')
@endcomponent
<!-- INTRO END -->
<!-- NAVBAR BEGIN -->
@component('components.navbar')
@endcomponent
<!-- NAVBAR END -->
<!-- PROJECTS BEGIN -->
@component('components.projects', compact('projects'))
@endcomponent
<!-- PROJECTS END -->
<!-- SKILLS BEGIN -->
@component('components.skills', compact('skills'))
@endcomponent
<!-- SKILLS END -->
<!-- CONTACT BEGIN -->
@component('components.contact')
@endcomponent
<!-- CONTACT END -->
<!-- FOOTER BEGIN -->
@component('components.footer')
@endcomponent
<!-- FOOTER END -->
@if(Session::has('message'))
<!-- MODAL BEGIN -->
    @component('components.modal')
        @slot('name')
            {{ Session::get('name') }}
        @endslot
        @slot('message')
            {{ Session::get('message') }}
        @endslot
    @endcomponent
<!-- MODAL END -->
@endif
@endsection
