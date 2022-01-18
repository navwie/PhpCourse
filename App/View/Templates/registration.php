<div class="page">
    <?php if (isset($_SESSION['registrationError'])) echo $_SESSION['registrationError'] ?>
    <div class="page-sign-up">
        <div class="d-flex col-12 form-signin container justify-content-center">
            <form action="/verification" method="post">
                <h1 class="h3  fw-normal text-center">Регистрация</h1>
                <div class="form-group mt-4">
                    <label for="name">Имя</label>
                    <input type="text" id="name" name="name" placeholder="Введите имя">
                </div>
                <div class="form-group mt-4">
                    <label for="surname">Фамилия</label>
                    <input type="text" id="surname" name="surname" placeholder="Введите фамилию">
                </div>
                <div class="form-group mt-4">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="name@example.com">
                </div>
                <div class="form-group mt-4">
                    <label for="phone">Номер телефона</label>
                    <input type="phone" id="phone" name="phone" placeholder="Введите номер телефона">
                </div>
                <div class="form-group mt-4">
                    <label for="password">Пароль</label>
                    <input type="password" id="password" name="password" placeholder="Введите пароль">
                </div>
                <div class="form-group mt-4 ">
                    <p>Администратор?</p>
                    <div class="radioChoice3">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" value="1" id="role"   name="role">
                            <label class="custom-control-label" for="role"> Да </label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input"  value="0" id="role"  name="role">
                            <label class="custom-control-label" for="role">Нет</label>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-outline-dark">Зарегистрироваться</button>
                </div>
                <div class="form-group text-center">
                    <a href="authorization.html">Уже есть аккаунт</a>
                </div>
            </form>
        </div>
    </div>
</div>