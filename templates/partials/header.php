<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Forms</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
</head>
<body>
    <div class="container text-center">
        <nav class="navbar navbar-expand-lg bg-light mb-2">
            <div class="container-fluid">
                <a class="navbar-brand" id="blog" name="blog" type="submit" href="topic.php">БлогерЮА</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?php if ($_SESSION['user_role']==='admin') echo "admin.php"; else echo "topic.php"; ?> "><?php if ($_SESSION['user_role']==='admin') echo "Адміністрування"; else echo "Додому";?></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="login.php">Увійти</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="new_topic_route.php">Написати</a>
                        </li>
                    </ul>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Пошук статті" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Пошук</button>
                    </form>
                </div>
            </div>
        </nav>