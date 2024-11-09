@extends('app')

@section('title', 'Inicio')

@section('content')

    <main>
        <livewire:comments-component />

        <script>
            @if(session('closePopup'))
                if (window.opener) {
                    
                    window.opener.postMessage("close-popup", window.location.origin);
                }
                window.close();  
            @endif
        </script>
    </main>

@endsection
