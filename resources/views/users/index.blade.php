@extends('layouts.app')

@section('title', 'Listagem dos Usuários')

@section('content')
<h1>
    Listagem dos usuários
    (<a href="{{ route('users.create') }}">+</a>)
</h1>

<ul>
    @foreach($users as $user)
    <li>
        {{ $user->name }} -
        {{ $user->email }}
        | <a href="{{ route('users.show', $user->id) }}">Detalhes do usuário</a>
        | <a href="{{ route('users.edit', $user->id) }}">Editar usuário</a>
    </li>   
    @endforeach
</ul>    
@endsection