@extends('app')

@section('title', 'Inicio')

@section('content')

    <main>


        <livewire:comments-component />

        @if(session('closePopup'))
            <script>
                if (window.opener) {  
                    window.opener.postMessage("close-popup", window.location.origin);
                }
                window.close();  
            </script>
        @endif
    </main>

@endsection
