@extends('app')

@section('title', 'Apostilas')

@section('content')

<main>
    <div class="contact-form">
        <h2>Contato</h2>
        <form action="" method="POST">
            @csrf
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Mensagem</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">Enviar</button>
        </form>
    </div>
</main>

@endsection
