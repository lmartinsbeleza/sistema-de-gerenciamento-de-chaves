<div>
    <label>Código da chave</label>
    <input type="text" name="codigo" placeholder="Código" value="{{ $chave->codigo ?? old('codigo') }}" required>

    <label>Sala</label>
    <select class="select2" name="sala">
        @foreach($sala as $s)
            <option value="{{ $s->id }}">{{ $sala->sala }}</option>
        @endforeach
    </select>
</div>

<div>
    <button type="submit" class="btn btn-success">Salvar</button>
</div>
