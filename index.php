<!DOCTYPE html>
<?php
    session_start();
    include "connection.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Examination</title>
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/font-awesome.min.css">
    <link rel="stylesheet" href="css1/owl.carousel.css">
    <link rel="stylesheet" href="css1/owl.theme.css">
    <link rel="stylesheet" href="css1/owl.transitions.css">
    <link rel="stylesheet" href="css1/animate.css">
    <link rel="stylesheet" href="css1/normalize.css">
    <link rel="stylesheet" href="css1/main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css1/responsive.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url('img/maxresdefault.png');background-attachment: fixed;background-size: 100% 100%;">
<div class="row">
    &#160;
    <div class="row">
        <div class="col-md-offset-4 col-md-2 col-xs-6">
            <button type="submit" class="btn btn-block btn-primary" id="alogin_bt">
                <span class="glyphicon glyphicon-log-in"></span> Admin Login
            </button>
        </div>
        <div class="col-md-2 col-xs-6">
            <button type="submit" class="btn btn-block btn-primary" id="slogin_bt">
                <span class="glyphicon glyphicon-log-in"></span> Student Login
            </button>
        </div>
    </div>
    
    <div id="studentlogin" style="display:none">
        <div class="sufee-login d-flex align-content-center flex-wrap">
            <div class="container">
                <div class="login-content">
                    <div class="login-logo" style="color:white">
                        <b>Student Login</b>
                    </div>
                    <div class="login-form">
                        <form name="form1" action="" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <button type="submit" name="studentlogin" class="btn btn-success btn-block loginbtn">Login</button>
                            <div class="alert alert-danger" id="studenterrormsg" style="margin-top:10px; display:none">
                                <strong>Invalid!</strong> Username Or Password.
                            </div>        
                            <div class="register-link m-t-15 text-center">
                                <p>Don't have account ? <a href="register.php"> Register Here</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="adminlogin" style="display:none">
        <div class="sufee-login d-flex align-content-center flex-wrap">
            <div class="container">
                <div class="login-content">
                    <div class="login-logo" style="color:white">
                        <b>Admin Login</b>
                    </div>
                    <div class="login-form">
                        <form name="form1" action="" method="post">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <button type="submit" name="adminlogin" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                            <div class="alert alert-danger" id="adminerrormsg" style="margin-top:10px; display:none">
                                <strong>Invalid!</strong> Username Or Password.
                            </div>        
                            <!-- <div class="register-link m-t-15 text-center">
                                <p>Don't have account ? <a href="register.php"> Register Here</a></p>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function (){
            $("#alogin_bt").click(function (){
                $("#studentlogin").hide('slow'); 
                $("#adminlogin").show('slow'); 
                sessionStorage.setItem('visibleForm', 'admin');
            });
            $("#slogin_bt").click(function (){
                $("#adminlogin").hide('slow');
                $("#studentlogin").show('slow');
                sessionStorage.setItem('visibleForm', 'student');
            });

            var visibleForm = sessionStorage.getItem('visibleForm');
            if (visibleForm === 'admin') {
                $("#adminlogin").show();
                $("#studentlogin").hide();
            } else if (visibleForm === 'student') {
                $("#studentlogin").show();
                $("#adminlogin").hide();
            }
        });
    </script>
    
    <?php
        if(isset($_POST["studentlogin"])) {   
            $count=0;
            $res=mysqli_query($link,"select * from registration where username='$_POST[username]' && password='$_POST[password]'") or die(mysqli_error($link));
            $count=mysqli_num_rows($res);
            if($count==0){
                echo "<script type='text/javascript'>document.getElementById('studenterrormsg').style.display='block';</script>";
            } else {
                $_SESSION["username"] = $_POST["username"];
                echo "<script type='text/javascript'>window.location='select_exam.php';</script>";
            }
        }

        if(isset($_POST["adminlogin"])) {
            $count=0;
            $username = mysqli_real_escape_string($link, $_POST["username"]);
            $password = mysqli_real_escape_string($link, $_POST["password"]);
            
            $res = mysqli_query($link, "select * from admin_login where username='$username' && password='$password'");
            $count = mysqli_num_rows($res);

            if($count==0) {
                echo "<script type='text/javascript'>document.getElementById('adminerrormsg').style.display='block';</script>";
            } else {
                $_SESSION["admin"] = $username;
                echo "<script type='text/javascript'>window.location='admin/exam_category.php';</script>";
            }
        }
    ?>
    
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery-price-slider.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
</body>
</html>
