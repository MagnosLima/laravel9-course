@extends('layouts.app')

@section('title', 'Novo Usuário')

@section('content')
<h1>Novo usuário</h1>

@if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li class="error">{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('users.store') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Nome:" id="" value="{{ old('name') }}">
    <input type="email" name="email" placeholder="E-mail:" id="" value="{{ old('email') }}">
    <input type="password" name="password" placeholder="Senha:" id="">
    <button type="submit">Enviar</button>
</form>
@endsection