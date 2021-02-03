<div class="row mt-5">
    <div class="col-md-4">
        <div class="mb-3">
            <label for="name" class="form-label">Nome do Fornecedor</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Natã Romão" value="{{ $provider->name ?? ''}}" required>
        </div>
    </div>
    <div class="col-md-3">
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="joao_pro@gmail.com" value="{{$provider->email ?? ''}}" required>
        </div>
    </div>
    <div class="col-md-2">
        <div class="mb-3">
            <label for="phone" class="form-label">Telefone</label>
            <input type="phone" class="form-control" id="phone" name="phone" value="{{$provider->phone ?? ''}}">
        </div>
    </div>
    <div class="col-md-2">
       <div class="mb-3">
           <label for="is_active" class="form-label">Status</label>
            <select class="form-select" name="is_active" id="is_active">
                <option value="1">Ativo</option>
                <option value="0">Desativado</option>
            </select>
       </div>
    </div>
</div>
<div class="row">
    <div class="col-md">
        <hr>
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</div>
