<div class="row mt-5">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name" class="form-label">Nome do Usuario</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Natã Romão" value="{{ $user->name ?? ''}}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="joao_pro@gmail.com" value="{{$user->email ?? ''}}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="password" class="form-label">Digite sua senha</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="password_confirm" class="form-label">Confirme sua senha</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md">
        <hr>
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</div>
