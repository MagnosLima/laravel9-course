@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('content')
<h1>Editar usuário | {{ $user->name }}</h1>

@if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li class="error">{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('users.update', $user->id) }}" method="post">
    @method('PUT')
    @csrf
    <input type="text" name="name" placeholder="Nome:" id="" value="{{ $user->name }}">
    <input type="email" name="email" placeholder="E-mail:" id="" value="{{ $user->email }}">
    <input type="password" name="password" placeholder="Senha:" id="">
    <button type="submit">Enviar</button>
</form>
@endsection