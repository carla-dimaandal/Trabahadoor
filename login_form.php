<?php


include 'config.php';

session_start();


if(isset($_POST['Submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $pass = mysqli_real_escape_string($conn, $_POST['Password']);

    $selectadmin = "SELECT * FROM admin_info WHERE Email = '$email' && password = '$pass' ";
    $selectemp = "SELECT * FROM employer_info WHERE Email = '$email' && password = '$pass' ";
    $selectjs = "SELECT * FROM jobseeker_info WHERE Email = '$email' && password = '$pass' ";

    $result1 = mysqli_query($conn, $selectadmin);
    $result2 = mysqli_query($conn, $selectemp);
    $result3 = mysqli_query($conn, $selectjs);

    if(mysqli_num_rows($result1) > 0){

        $_SESSION["Email"] = $email;
        header('location:admin_page.php');
    }elseif(mysqli_num_rows($result2) > 0){

        $_SESSION["Email"] = $email;
        header('location:employer_page.php');
    }elseif(mysqli_num_rows($result3) > 0){
        $_SESSION["Email"] = $email;
        header('location:jobseeker_page.php');
    }else{
        $error[] = 'Incorrect email or password';
    };
};
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login Form</title>
        <link rel="stylesheet" href="Css\style2.css">
        
        <link rel="icon" href="Images\TBDlogo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    </head>
<body>
    <div class="big-wrapper">
    <header>
        <div class="container">
            <div class="logo">
                <img src="Images\TBDlogo.png" alt="Logo" class="img">
                <h3>Trabahadoor</h3>
            </div>
        </div>
    </header>
        <div class="form-container">
            <div class="welcome">
                <img src="Images\login-img.png" alt="welcome">
            </div>
        <form action="" method="post">
            <img src="Images\TBDlogo.png" alt="Logo" class="img" width="40px">
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="email" name="Email" required placeholder="Enter your email" >
            <div class="input-box">
            <input type="password" name="Password" class="password" placeholder="Enter your password" id="password">
            <img src="./Images/eye-close.png" id="eyeicon">
             </div>
            <input type="submit" name="Submit" value="Login" class="form-btn">
            <p>Don't have an account? <a href="register_form.php"> Sign up</a></p>
            <p class="privacy">
                Privacy Policy <br> We take your privacy very seriously. We do not share your details for marketing purposes with any external companies. 
                Your information may only be shared with our third party partners so that we may offer our service.</p>
        </form>
        
    </div>
    </div>
    <footer>
        <div clas="footerContainer">
            <div class="socialIcons">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-google-plus"></i></a>
            </div>
            <div class="footerNav">
                <ul>
                    <li><a href="index.php#home">Home</a></li>
                    <li><a href="index.php#about">About</a></li>
                    <li><a href="index.php#services">Services</a></li>
                    <li><a href="index.php#contact">Contact</a></li>
                </ul>
            </div>
            <div class="footerBottom">
                <p>Copyright &copy;2023 <span class="footerName">Trabahadoor</span></p>
            </div>
        </div>
       </footer>
       <script>
            let eyeicon = document.getElementById("eyeicon");
            let password = document.getElementById("password");

            eyeicon.onclick = function(){
                if(password.type == "password"){
                    password.type = "text";
                    eyeicon.src = "./Images/eye-open.png"
                }else{
                    password.type = "password";
                    eyeicon.src = "./Images/eye-close.png"
                }
            }
       </script>

</body>
</html>

