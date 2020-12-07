<div class="row">
    <div class="col-md-6" id="register" style="margin:20px auto;border-radius: 10px;padding: 20px;">
        <?php
        if (isset($_SESSION['success']) && $_SESSION['success'] == 2) {
        ?>
            <div class="alerts alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong><?php if(!empty($infoUser)){echo "Xin chào ".$infoUser['0']['name'];}else{echo "Xin chào " . $_SESSION['user'];}?></strong>
            </div>
        <?php
        } else {
            header('Location:index.php?page=user&method=login');
        }
        if (isset($_SESSION['add']) && $_SESSION['add'] == 3) {
        ?>
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Bạn đã thêm thông tin thành công!</strong>
            </div>
        <?php
        }
        ?>
        
    </div>
</div>
<div class="row">
    <div class="col-md-8" id="info-user" style="margin:20px auto;border-radius: 10px;padding:0px 30px 30px 30px;">

        <?php if (empty($infoUser)) {
        ?>
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Hiện tại quý khách chưa có thông tin . hãy thêm thông tin</strong>
            </div>
            <div class="panel panel-primary">
                <a href="index.php?page=user&method=addInfo" class="btn btn-primary">Add-Info</a>
            </div>
        <?php
        } elseif (!empty($infoUser)) {
        ?>
            <div class="row">
                <div class="col-md-8" id="info-user" style="margin:20px auto;border-radius: 10px;padding: 20px;">
                    <marquee behavior="" direction=""><h1 class="color-red">Infomation-User</h1></marquee>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3" id="avatar" style="margin-left:20px;border-radius: 10px;padding: 20px;">
                    <img src="access/upload/images/<?= $infoUser['0']['avatar']; ?>" width="100%" alt="">
                </div>
                <div class="col-md-8" id="avatar" style="margin-left:20px;border-radius:10px;padding: 20px;">
                    <h5 class="color-green">Name :<span style="font-style: italic;"><?=$infoUser['0']['name']; ?></span></h5>
                    <h5 class="color-green">Gender : <?php if ($infoUser['0']['gender'] == 1) {
                                        echo 'Nam';
                                    } else {
                                        echo 'Nữ';
                                    } ?></h5>
                    <h5 class="color-green">Name : <span style="font-style: italic;"><?= $infoUser['0']['phone']; ?></span></h5>
                    <h5 class="color-green">Address : <span style="font-style: italic;"><?= $infoUser['0']['address']; ?></span></h5>
                    <h5 class="color-green">Create_at : <span style="font-style: italic;"><?= $infoUser['0']['create_at']; ?></span></h5>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>