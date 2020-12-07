<?php
if(isset($_SESSION['success']) && $_SESSION['success'] == 2) {
?>
    <div class="row" style="padding:30px;">
        <div class="col-md-6" id="register" style="margin:20px auto;border-radius: 10px;padding: 20px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <marquee behavior="" direction="">
                        <h1 style="color:red;">Add Info User</h1>
                    </marquee>
                </div>
                <div class="panel-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input name="id" style="display: none;" value="<?php if(isset($_SESSION['id'])){echo $_SESSION['id'];}?>" type="number" class="form-control" id="id">
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input required="true" name="name" type="text" class="form-control" id="name" placeholder="input name...">
                        </div>
                        <div class="form-group">
                            <label for="avatar">Avatar:</label>
                            <input required="true" name="avatar" type="file" accept="image/*" class="form-control" placeholder="input address..." id="avatar">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input required="true" name="phone" type="number" class="form-control" id="phone" placeholder="input phone...">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <br>
                            <input name="gender" checked type="radio" id="gender" value="1">Nam
                            <input name="gender" type="radio" id="gender" value="0">Nữ
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input required="true" name="address" type="text" class="form-control" placeholder="input address..." id="address">
                        </div>
                        <button class="btn btn-success" type="submit" name="addInfo">Add-info</button>
                    </form>
                </div>
                <br>
            </div>
        </div>
    </div>
<?php
} else {
    header('Location:index.php?page=user&method=login');
}
?>