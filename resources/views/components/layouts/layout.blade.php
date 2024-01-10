<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{ $meta ?? '' }}

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ $title ?? 'Laravel Nova 4' }}</title>
</head>

<body>

    @if (session()->has('nova_impersonated_by'))
        <div class="alert alert-info m-0">Al momento stai impersonando l'utente {{ Auth::user()->name }} - <a
                href="{{ route('stopImpersonating') }}">Termina Impersonator</a></div>
    @endif


    <x-layouts.navbar />

    <div class="min-vh-100">
        @if (session()->has('successMessage'))
            <div class="alert alert-success">
                {{ session('successMessage') }}
            </div>
        @endif
        @if (session()->has('errorMessage'))
            <div class="alert alert-danger">
                {{ session('errorMessage') }}
            </div>
        @endif
        {{ $slot }}
    </div>

    <x-layouts.footer />

</body>

</html>
