<!doctype html>
<html lang="`en`">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="/css/index.css " type="text/css"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
            integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
          integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title><?php echo $title; ?></title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <div class="items">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/mainUser">Головна</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/changeDataUser">Изменить данные о себе</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/logOut">Выйти</a>
                        </li>

                    </div>
                    <div class="items">
                        <form class="col-md-3 d-flex flex-md-row" method="post" action="/searchUserPage">
                            <div>
                                <input class="form-control pr-4" style="width:200px; margin-top:5px" type="text"
                                       name="search" placeholder="Search"
                                       aria-label="Search">
                            </div>
                            <div>
                                <button class="btn btn-outline-light" style="margin-left: 20px; margin-top: 5px"
                                        name="searchUrl" type="submit">
                                    Найти
                                </button>
                            </div>
                        </form>
                        <li class="nav-item">
                            <a class="nav-link" href="/basket"> <i style=" margin-left: 550px"
                                                                   class="fas fa-shopping-basket">
                                    <?php echo isset($_SESSION['products']) ? count($_SESSION['products']) : 0; ?>
                                </i></a>

                        </li>
                    </div>
                </ul>

            </div>
        </div>
    </nav>
</header>
