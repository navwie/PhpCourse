<div class="page">
    <div class="page-sign-up">
        <div class="d-flex col-12 form-signin container justify-content-center">
            <form action="/changeAdmin" method="post">
                <h1 class="h3  fw-normal text-center">Обновить</h1>
                <div class="form-group mt-4">
                    <label for="name">Имя</label>
                    <input type="text" id="name" name="name" value="<?php echo $params['user'][0]->getName(); ?>">
                </div>
                <div class="form-group mt-4">
                    <label for="surname">Фамилия</label>
                    <input type="text" id="surname" name="surname"
                           value="<?php echo $params['user'][0]->getSurname(); ?>">
                </div>
                <div class="form-group mt-4">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" value="<?php echo $params['user'][0]->getEmail(); ?>">
                </div>
                <div class="form-group mt-4">
                    <label for="password">Пароль</label>
                    <input type="password" id="password" name="password"
                           value="<?php echo $params['user'][0]->getPassword(); ?>">
                </div>
                <div class="form-group mt-4">
                    <label for="phone">Номер телефона</label>
                    <input type="text" id="phone" name="phone" value="<?php echo $params['user'][0]->getPhone(); ?>">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-outline-dark" value="<?php echo $params['user'][0]->getId() ?>"
                            name="id">Изменить
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
