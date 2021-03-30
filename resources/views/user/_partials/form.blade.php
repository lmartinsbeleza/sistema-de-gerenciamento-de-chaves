<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Nome: </span>
    </div>
    <input class="form-control" type="text" name="name" id="name" placeholder="Nome" value="{{$user->name ?? old('name')}}" required>
</div>

<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Email: </span>
    </div>
    <input class="form-control" type="email" name="email" id="email" placeholder="Email" value="{{$user->email ?? old('email')}}" required>
</div>

<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">Senha</span>
    </div>
    <input class="form-control" type="password" name="password" id="password" placeholder="Senha" value="{{old('password')}}" required>
</div>

<div class="float-right">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>
