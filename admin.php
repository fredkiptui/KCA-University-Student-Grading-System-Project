<?php include 'includes/header.php';?>
<?php //include 'includes/nav.php'; ?>
<?php include 'includes/intro.php'; ?>

    <div class="main">
        <div class="login">
            <form action="" method="post" name="login">
                <fieldset>
                    <legend style="color: red; font-size: 18px;"> NOTICE! STAFF MEMBERS LOGIN</legend>
                    <input type="text" name="userid" placeholder="Username" autocomplete="off" style="width: 600px; height: 100px; background-color: lightblue">
                    <input type="password" name="password" placeholder="Password" autocomplete="off">
                    <input type="submit" value="Login">
                </fieldset>
            </form>
        </div>
    </div>

<?php
    include("init.php");
    session_start();

    if (isset($_POST["userid"],$_POST["password"]))
    {
        $username=$_POST["userid"];
        $password=$_POST["password"];
        $password = md5($_POST["password"]);
        $sql = "SELECT userid FROM admin_login WHERE userid='$username' and password = '$password'";
        $result=mysqli_query($conn,$sql);

        // $row=mysqli_fetch_array($result);
        $count=mysqli_num_rows($result);
        
        if($count==1) {
            $_SESSION['login_user']=$username;
            header("Location: dashboard.php");
        }else {
            echo '<script language="javascript">';
            echo 'alert("Invalid Username or Password")';
            echo '</script>';
        }
        
    }
?>

<?php include 'includes/footer.php'; ?>