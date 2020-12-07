<div class="row" style="padding:30px;">
    <div class="col-md-6" id="register" style="margin:20px auto;border-radius: 10px;padding: 20px;">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <marquee behavior="" direction="">
                    <h1 style="color:red;">Registation Account</h1>
                </marquee>
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input required="true" name="email" value="<?php if (isset($_SESSION['email'])) {
                                                                        echo $_SESSION['email'];
                                                                        session_destroy();
                                                                    }  ?>" type="email" class="form-control" id="email" placeholder="input email...">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input required="true" name="password" type="password" class="form-control" id="pwd" placeholder="input pass...">
                    </div>
                    <div class="form-group">
                        <label for="re-pwd">Re-Password:</label>
                        <input required="true" name="re-password" type="password" class="form-control" placeholder="input re-pass..." id="re-pwd">
                    </div>
                    <button class="btn btn-success" type="submit" name="register">Register</button>
                    <a href="index.php?page=user&method=login" class="btn btn-warning">Login</a>
                </form>
            </div>
            <br>
        </div>
        <?php
        if (isset($_SESSION['error']) && $_SESSION['error'] == 1) {
        ?>
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Xác nhận mật khẩu không trùng khớp</strong>
            </div>
        <?php
        } elseif (isset($_SESSION['error']) && $_SESSION['error'] == 2){
        ?>
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Tài khoản đã tồn tại</strong>
            </div>
        <?php
        }

        ?>

    </div>
</div>