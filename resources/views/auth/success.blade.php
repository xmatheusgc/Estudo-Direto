@extends('app')

@section('title', 'Login bem-sucedido')

@section('content')

<main>
    <h1>Login bem-sucedido!</h1>
    <p>Você foi autenticado com sucesso.</p>

    <script>
        setTimeout(function() {
            if (window.opener) {
                window.opener.postMessage('close-popup', window.location.origin);
                window.close();
            }
        }, 0);
    </script>
</main>

@endsection
