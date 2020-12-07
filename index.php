<?php 
    session_start();
    ob_start();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Trang chủ</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="access/css/bootstrap.min.css">
    <link rel="stylesheet" href="access/css/mycss.css">
    <linkrel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    <div class="container" style="box-shadow: 0 1px 6px 0 grey;margin-top:20px;margin-bottom:20px;border-radius: 5px;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?page=user&method=infoUser">Info-User<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=user&method=logout">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=admin&method=login">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 'user';
        }
        switch ($page) {
            case 'user':
                include_once 'Controller/user_c.php';
                $option = new User_c();
                $option->option();
                break;
            case 'admin':
                include_once 'Controller/admin_c.php';
                break;
            default:
                echo 'Trang không tồn tại';
                break;
        }
        ?>
    </div>
    <script src="access/js/jquery-3.5.1.min.js"></script>
    <script src="access/js/popper.min.js"></script>
    <script src="access/js/bootstrap.min.js"></script>
    <script src="access/js/myscript.js"></script>
</body>

</html>