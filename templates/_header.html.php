<div class="logo-wrapper">
    <a href="index.php"><img src="./img/logo.png" alt="logo" class="logo"></a>
    <ul class="login-link">
        <?php if(isset($_SESSION['user'])):?>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="admin.php">Admin</a></li>
        <?php endif?>
        <?php if(!isset($_SESSION['username'])):?>
            <li><a href="login.php">Login</a></li>
        <?php endif?>
    </ul>
    

</div>