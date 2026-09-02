@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h1 class="mb-4">Profilo Utente</h1>

    <div class="mb-4">
        <p>
            <strong>Nome:</strong>
            {{ Auth::user()->name }}
        </p>

        <p>
            <strong>Email:</strong>
            {{ Auth::user()->email }}
        </p>
    </div>

    <hr class="my-4">

    @include('profile.partials.update-profile-information-form')

    <hr class="my-4">

    @include('profile.partials.update-password-form')

    <hr class="my-4">

    @include('profile.partials.delete-user-form')

</div>
@endsection