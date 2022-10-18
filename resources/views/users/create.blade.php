@extends('layouts.app')

@section('title', 'Novo Usuário')

@section('content')
<h1>Novo usuário</h1>

<form action="{{ route('users.store') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Nome" id="">
    <input type="email" name="email" placeholder="E-mail" id="">
    <input type="password" name="password" placeholder="Senha" id="">
    <button type="submit">Enviar</button>
</form>
@endsection