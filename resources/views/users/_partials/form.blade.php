@csrf
<input type="text" name="name" placeholder="Nome:" id="" value="{{ $user->name ?? old('name')}}">
<input type="email" name="email" placeholder="E-mail:" id="" value="{{ $user->email ?? old('email')}}">
<input type="password" name="password" placeholder="Senha:" id="">
<button type="submit">Enviar</button>