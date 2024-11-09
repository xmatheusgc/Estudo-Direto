@extends('app')

@section('title', 'Community')

@section('content')

<main>
    <section class="friends-scroll-bar">
        <div class="friends" id="btn-friend"><i class='bx bx-user'></i></div>
        <div class="friends" id="btn-add-friend"><i class='bx bx-plus'></i></div>
    </section>

    <section class="active-chats">
        
    </section>

    <div class="chat-container">
        <div class="message-tools">
            <button><i class='bx bx-happy-alt'></i></button>
            <button><i class='bx bxs-plus-circle'></i></button>

            <input type="text" id="chat-text-box" placeholder="Digite uma mensagem">
                
            <button id="chat-send-btn"><i class='bx bxs-send'></i></button>
        </div>

        <div class="messages-container">
            <div class="message-box" id="other-message">
                oi
            </div>

            {{-- <div class="message-box" id="user-message"></div> --}}
        </div>
    </div>
</main>

<div class="menu">
    <div class="addNewFriend-menu">
        <h1 class="add-friend-title">Adicionar Amigo</h1>

        <div class="input-box">
            <i class='bx bxs-user-plus' ></i>
            <input type="text" placeholder="Nome de usuário">
        </div>

        <button class="add-btn">Adicionar</button>

        <button class="btn-back" id="btn-exit-menu">
            <i class='bx bx-chevron-left'></i>
            <span>voltar</span>
        </button>
    </div>
</div>

@endsection


