<div>
    <label>Nome: </label>
    <input type="text" name="name" id="name" placeholder="Nome" value="{{$user->name ?? old('name')}}" required>

    <label>Email: </label>
    <input type="email" name="email" id="email" placeholder="Email" value="{{$user->email ?? old('email')}}" required>

    <label>Senha: </label>
    <input type="password" name="password" id="password" placeholder="Senha" value="{{old('password')}}" required>
</div>
<div>
    <button type="submit" class="btn btn-success">Salvar</button>
</div>
