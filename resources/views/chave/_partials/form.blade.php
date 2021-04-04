{{--Inicio do input do codigo da chave--}}
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Cód. Chave</span>
    </div>
    <input class="form-control" type="text" name="codigo" placeholder="Código" value="{{ $chave->codigo ?? old('codigo') }}" required>
</div>
{{--Final do input do codigo da chave--}}

{{--Inicio do input que seleciona a sala que a chave vai estar vinculada--}}
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Sala</span>
    </div>
    <select class="select2 form-control" name="sala" onchange="salaName(value)">
        <option value="" disabled selected>Escolha...</option>
        @foreach($sala as $s)
            <option value="{{ $s->id }}">{{ $s->sala }}</option>
        @endforeach
        <option value="0">+ Adicionar Nova Sala</option>
    </select>
</div>
{{--Final do input que seleciona a sala que a chave vai estar vinculada--}}

{{--Inicio do input que nomeia a sala caso não exista a sala no sistema no momento--}}
<div class="input-group mb-3 d-none" id="escondido">
    <div class="input-group-prepend">
        <span class="input-group-text">Nome da Sala</span>
    </div>
    <input class="form-control" type="text" id="sala-name" name="name" placeholder="Nome da Sala">
</div>
{{--Final do input que nomeia a sala caso não exista a sala no sistema no momento--}}

{{--botão que envia as informações--}}
<div class="float-right">
    <button type="submit" class="btn btn-success">Salvar</button>
</div>

<script>
    //função que verifica se vai ser adicionada uma nova sala
    function salaName(value){
        var name_sala = document.getElementById('escondido');
        if (value == 0){
            name_sala.classList.remove('d-none');
        }else{
            name_sala.classList.add('d-none');
        }
    }
</script>
