<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Sala: </span>
    </div>
    <select class="select2 select form-control" name="sala" onchange="inputCodigo(value)" required>
        <option value="" disabled selected>Escolha...</option>
        @foreach($chave as $c)
            @if($c->status <> 1)
                <option value="{{ $c->codigo }}">{{ $c->sala()->first()->sala }}</option>
            @endif
        @endforeach
    </select>
</div>

<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Cód. Chave: </span>
    </div>
    <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Código da Chave" required>
</div>

<div class="row float-right">
    <button type="submit" class="btn btn-success">Pegar</button>
</div>
