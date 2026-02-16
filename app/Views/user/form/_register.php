<form action="<?= base_url('/register') ?>" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Имя пользователя</label>
        <input name="name" type="text" class="form-control" id="name" placeholder="Введите имя адрес">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email адрес</label>
        <input name="email" type="email" class="form-control" id="email" placeholder="Введите email адрес">
    </div>


    <div class="mb-3">
        <label for="password" class="form-label">Пароль</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Введите пароль">
    </div>

    <div class="mb-3">
        <label for="confirmPassword" class="form-label">Повторите пароль</label>
        <input name="confirmPassword" type="password" class="form-control" id="confirmPassword" placeholder="Повторите пароль">
    </div>

    <button type="submit" class="btn btn-warning">Submit</button>
</form>