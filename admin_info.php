<?php


include 'config.php';

if(isset($_POST['Submit'])){
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $password = mysqli_real_escape_string($conn, $_POST['Password']);
    $cpass = mysqli_real_escape_string($conn, $_POST['Cpassword']);
    $fname = mysqli_real_escape_string($conn, $_POST['Fullname']);
    $address = mysqli_real_escape_string($conn, $_POST['Address']);
    $pnumber = mysqli_real_escape_string($conn, $_POST['Pnumber']);

    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    
    $select = "SELECT * FROM admin_info WHERE Email = '$email'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';
    }elseif($password != $cpass){
      $error[] = 'Password not matched!';
    }elseif(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8){
      $error[] = 'Password must contain at least 8 characters, including uppercase, lowercase letters, numbers, and special characters.';
    }else{
      
      $insert = "INSERT INTO `admin_info`(`Email`, `Password`, `Fname`, `Address`, `Pnumber`) 
      VALUES ('$email', '$password','$fname','$address','$pnumber')";

      mysqli_query($conn, $insert);
      header('location:login_form.php');
    };
};
?>


<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabahadoor Online Job Portal</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css\style6.css">
    <link rel="icon" href="Images\TBDlogo.png"> 
<!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<html>
    <body>
        <main class="big-wrapper">
        <header>
                <nav>
                    <ul class='nav-bar'>
                        <div class="logo">
                            <img src="Images\TBDlogo.png" alt="Logo" class="img">
                            <h3>Trabahadoor</h3>
                        </div>
                        <input type='checkbox' id='check' />
                        <span class="menu">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="login_form.php">Log In</a></li>
                            <label for="check" class="close-menu"><i class="fas fa-times"></i></label>
                        </span>
                        <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
                    </ul>
                </nav>
            </header>
    <!--Start of Reg Form-->
        <div class="Mainshowcase">
          <section class="Regform">
          <h3>Admin Information</h3>
          <form action="#" class="form" method="post">
            <?php
              if(isset($error)){
                foreach($error as $error){
                  echo '<span class="error-msg">'.$error.'</span>';
                };
              };
            ?>
            
            <div class="input-box">
              <label>Email Address</label>
              <input type="email" id="Email" name="Email" placeholder="Enter Email Address" required />
            </div>
                
            <div class="column">
              <div class="input-box">
                <label>Password</label>
                <input type="password" id="Password" name="Password" placeholder="Enter your password" >
              </div>
              <div class="input-box">
                <label>Confirm Password</label>
                <input type="password" id="Cpassword" name="Cpassword" placeholder="Confirm your password" >
              </div>
            </div>

            <div class="input-box">
              <label>Full Name</label>
              <input type="text" id="Fullname" name="Fullname" placeholder="Enter full name" required />
            </div>
                
            <div class="input-box address">
              <label>Address</label>
              <input type="text" id="Address" name="Address" placeholder="Enter Full Address" required />
            </div>
          
            <div class="input-box">
              <label>Phone Number</label>
              <input type="text" id="Pnumber" name="Pnumber" placeholder="Enter Phone Number" required />
            </div>

                <input type="submit" name="Submit" value="SUBMIT" class="form-btn">
                </form>
            </section>
            </div>
        </main>
  <footer>
        <div clas="footerContainer">
            <div class="socialIcons">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-google-plus"></i></a>
            </div>
            <div class="footerNav">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="footerBottom">
                <p>Copyright &copy;2023 <span class="footerName">Trabahadoor</span></p>
            </div>
        </div>
       </footer>
    </body>
</html>
