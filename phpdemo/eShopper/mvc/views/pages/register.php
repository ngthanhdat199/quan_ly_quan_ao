
<div class="theme">
    <h1>Register</h1>
    <form class="register" action="./Register/user" method="POST">
        <div>
            <label class="part">Username: </label>
            <input type="text" name="username" class="fill" placeholder="Enter username">
        </div>
        <div>
            <label class="part">Password: </label>
            <input type="password" name="password" class="fill" placeholder="Password">
        </div>
        <div>
            <label class="part">Email: </label>
            <input type="email" name="email" class="fill" placeholder="Enter email">
        </div>
        <div>
            <label class="part">Fullname: </label>
            <input type="text" name="fullname" class="fill" placeholder="Enter fullname">
        </div>
        <div>
            <label class="part">Address: </label>
            <input type="text" name="address" class="fill" placeholder="Enter Address">
        </div>
        <button type="submit" name="btnRegister" class="btn button-primary">Register</button>
        <?php if (isset($data["result"])) { ?>
        <h3>
            <?php if($data["result"] == true){
                echo "Đăng kí thành công!";
            } else {
                echo "Đăng kí thất bại!";
            } ?>
        </h3>
        <?php }?>
    </form>
</div>

