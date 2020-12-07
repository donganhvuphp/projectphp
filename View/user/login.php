<div class="row" style="padding:30px;">
    <div class="col-md-4" id="login" style="margin:0px auto;border-radius: 10px;padding: 20px;">
        <?php
        if (isset($_SESSION['success']) && $_SESSION['success'] == 1) {
        ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Đăng ký thành công</strong>
            </div>
        <?php
            session_destroy();
        } elseif (isset($_SESSION['error']) && $_SESSION['error'] == 3 || isset($_SESSION['checkMail']) && $_SESSION['checkMail'] == 1 ) {
        ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Tài khoản không tồn tại</strong>
            </div>
        <?php
            session_destroy();
        } elseif (isset($_SESSION['error']) && $_SESSION['error'] == 4) {
        ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Sai mật khẩu</strong>
            </div>
        <?php
            session_destroy();
        }
        ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">LOGIN</h2>
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input required="true" type="email" name="email" placeholder="input email..." class="form-control" id="email" value="<?php if (isset($_SESSION['email'])) {
                                                                                                                                                    echo $_SESSION['email'];
                                                                                                                                                }  ?>">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input required="true" type="password" name="password" placeholder="input pass..." class="form-control" id="pwd">
                    </div>
                    <a data-toggle="modal" data-target=".bs-example-modal-lg" style="cursor: pointer;color:red;">Forgot password ?</a><br><br>
                    <button class="btn btn-success" type="submit" name="login">Login</button>
                    <a href="index.php?page=user&method=register" class="btn btn-warning">register</a>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="padding: 40px 40px;">
            <form action="" method="POST" role="form" id="forms_md">
                <legend>Lấy lại mật khẩu :</legend>
                <div class="form-group">
                    <label for="">Nhập tài khoản<span style="color: red;"> *</span></label>
                    <input type="text" required class="form-control" id="email-pass" name="email-pass" placeholder="Họ tên học viên...">
                </div>
                <button type="submit" name="checkPass" id="checkPass" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>