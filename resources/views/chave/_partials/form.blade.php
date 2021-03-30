<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Cód. Chave</span>
    </div>
    <input class="form-control" type="text" name="codigo" placeholder="Código" value="{{ $chave->codigo ?? old('codigo') }}" required>
</div>

<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Sala</span>
    </div>
    <select class="select2 form-control" name="sala" onchange="salaName(value)">
        <option value="" disabled selected>Escolha...</option>
        @foreach($sala as $s)
            <option value="{{ $s->id }}">{{ $s->sala }}</option>
        @endforeach
        <option value="0">Adicionar Nova Sala</option>
    </select>
</div>

<div class="input-group mb-3 d-none" id="escondido">
    <div class="input-group-prepend">
        <span class="input-group-text">Nome da Sala</span>
    </div>
    <input class="form-control" type="text" id="sala-name" name="name" placeholder="Nome da Sala">
</div>

<div class="float-right">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>

<script>
    function salaName(value){
        var name_sala = document.getElementById('escondido');
        if (value == 0){
            name_sala.classList.remove('d-none');
        }else{
            name_sala.classList.add('d-none');
        }
    }
</script>
