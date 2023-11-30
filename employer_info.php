<?php


include 'config.php';

if(isset($_POST['Submit'])){
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $password = mysqli_real_escape_string($conn, $_POST['Password']);
    $cpass = mysqli_real_escape_string($conn, $_POST['Cpassword']);
    $fname = mysqli_real_escape_string($conn, $_POST['Fullname']);
    $cname = mysqli_real_escape_string($conn, $_POST['Cname']);
    $industry = mysqli_real_escape_string($conn, $_POST['Industry']);
    $pnumber = mysqli_real_escape_string($conn, $_POST['Cpnumber']);
    $caddress = mysqli_real_escape_string($conn, $_POST['Caddress']);
    $jobp1 = mysqli_real_escape_string($conn, $_POST['Job1']);
    $worksched1 = mysqli_real_escape_string($conn, $_POST['Worksched1']);
    $jobp2 = mysqli_real_escape_string($conn, $_POST['Job2']);
    $worksched2 = mysqli_real_escape_string($conn, $_POST['Worksched2']);
    $jobp3 = mysqli_real_escape_string($conn, $_POST['Job3']);
    $worksched3 = mysqli_real_escape_string($conn, $_POST['Worksched3']);
    
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    $select = "SELECT * FROM employer_info WHERE Email = '$email'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';
    }elseif($password != $cpass){
      $error[] = 'Password not matched!';
    }elseif(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8){
      $error[] = 'Password must contain at least 8 characters, including uppercase, lowercase letters, numbers, and special characters.';
    }else{

      $insert = "INSERT INTO `employer_info`(`Email`, `Password`, `Fname`, `Cname`, `Industry`, `Pnumber`, `Caddress`, `Jobp1`, `Work_schedule1`,
      `Jobp2`, `Work_schedule2`, `Jobp3`, `Work_schedule3`) VALUES('$email', '$password','$fname','$cname',
      '$industry', '$pnumber', '$caddress','$jobp1', '$worksched1','$jobp2', '$worksched2','$jobp3', '$worksched3')";

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
              <h3>Employer Information</h3>
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

                <div class="column">
                  <div class="input-box">
                    <label>Full Name</label>
                    <input type="text" id="Fullname" name="Fullname" placeholder="Enter full name" required />
                  </div>
                  <div class="input-box">
                    <label>Company Name</label>
                    <input type="text" id="Cname" name="Cname" placeholder="Enter your Company Name" required />
                  </div>  
                </div>

                <div class="input-box">
                  <label>Type of Industry</label>
                  <select  id="Industry" name="Industry" class="custom-select">
                    <option value="Food and Service">Food and Service</option>
                    <option value="Technology">Technology</option>
                    <option value="Construction">Construction</option>
                    <option value="Agriculture">Agriculture</option>
                    <option value="Manufacturing">Manufacturing</option>
                    <option value="Healthcare">Healthcare</option>
                    <option value="BPO">BPO</option>
                    <option value="Others">Others</option>
                  </select>
                </div>

                <div class="input-box">
                  <label>Company Phone Number</label>
                  <input type="text" id="Pnumber" name="Cpnumber" placeholder="Enter Company Phone Number" required />
                </div>

                <div class="input-box address">
                  <label>Company Address</label>
                  <input type="text" id="Address" name="Caddress" placeholder="Enter Full Address" required />
                </div>

                <div class="column">
                  <div class="input-box">
                    <label>Job Position 1</label>
                    <input type="text" id="Job1" name="Job1" placeholder="Enter Job Position (Leave it blank if none)"/>
                  </div>
                  <div class="gender-option">
                    <div class="gender">
                      <input type="radio" id="check-fulltime" name="Worksched1" value="Full time"/>
                      <label for="check-male">Full Time</label>
                    </div>
                    <div class="gender">
                      <input type="radio" id="check-parttime" name="Worksched1" value="Part time" />
                      <label for="check-female">Part Time</label>
                      </div>
                  </div>
                </div>
                
                <div class="column">
                  <div class="input-box">
                    <label>Job Position 2</label>
                    <input type="text" id="Job2" name="Job2" placeholder="Enter Job Position (Leave it blank if none)"/>
                  </div>
                  <div class="gender-option">
                    <div class="gender">
                      <input type="radio" id="check-fulltime" name="Worksched2" value="Full time"/>
                      <label for="check-male">Full Time</label>
                    </div>
                    <div class="gender">
                      <input type="radio" id="check-parttime" name="Worksched2" value="Part time" />
                      <label for="check-female">Part Time</label>
                    </div>
                  </div>
                </div>
                
                <div class="column">
                  <div class="input-box">
                    <label>Job Position 3</label>
                    <input type="text" id="Job3" name="Job3" placeholder="Enter Job Position (Leave it blank if none)"/>
                  </div>
                  <div class="gender-option">
                    <div class="gender">
                      <input type="radio" id="check-fulltime" name="Worksched3" value="Full time"/>
                      <label for="check-male">Full Time</label>
                    </div>
                    <div class="gender">
                      <input type="radio" id="check-parttime" name="Worksched3" value="Part time" />
                      <label for="check-female">Part Time</label>
                    </div>
                  </div>
                </div> 
                <input type="submit" name="Submit" value="SUBMIT" class="form-btn">
                </div>
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
