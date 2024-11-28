@extends('app')

@section('title', 'Apostilas')

@section('content')

<main class="d-flex justify-content-center align-items-center">
    <form action="" method="POST" class="card-shape p-4 rounded">
        @csrf
        <h2 class="mb-4">Contato</h2>
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Mensagem</label>
            <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</main>

@endsection
