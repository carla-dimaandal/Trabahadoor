<?php

include 'config.php';

$editState = false;
$employerID;
if (isset($_GET["updateid"])){
    $editState = true;
    $employerID = $_GET["updateid"];

    $sql = "SELECT * FROM `employer_info` WHERE `Employer_ID`='$employerID'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $employee_id = $row['Employer_ID'];
    $email = $row['Email'];
    $password =$row['Password'];
    $fname = $row['Fname'];
    $cname = $row['Cname'];
    $industry = $row['Industry'];
    $pnumber = $row['Pnumber'];
    $caddress = $row['Caddress'];
    $jobp1 = $row['Jobp1'];
    $worksched1 = $row['Work_schedule1'];
    $jobp2 = $row['Jobp2'];
    $worksched2 = $row['Work_schedule2'];
    $jobp3 = $row['Jobp3'];
    $worksched3 = $row['Work_schedule3'];
}

if(isset($_POST['Update'])){

  $email = mysqli_real_escape_string($conn, $_POST['Email']);
  $password = $_POST['Password'];
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

  if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8){
  $error[] = 'Password must contain at least 8 characters, including uppercase, lowercase letters, numbers, and special characters.';
  }else{
  $update = "UPDATE `employer_info` SET `Email`='$email',`Password`='$password',`Fname`='$fname',`Cname`='$cname', 
  `Industry`='$industry',`Pnumber`='$pnumber',`Caddress`='$caddress',`Jobp1`='$jobp1',`Work_schedule1`='$worksched1',
  `Jobp2`='$jobp2',`Work_schedule2`='$worksched2',`Jobp3`='$jobp3',`Work_schedule3`='$worksched3' WHERE Employer_ID='$employerID'";

  mysqli_query($conn, $update);
  header('location:admin_emp.php');
  }
}
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
                            <li><a href="admin_emp.php">Home</a></li>
                            <li><a href="logout.php">Sign Out</a></li>
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
              <input type="email" id="Email" name="Email" placeholder="Enter Email Address" required value="<?php echo ($editState ? $email : ''); ?>" />
          </div>

          <div class="input-box">
            <label>Password</label>
              <input type="password" id="Password" name="Password" placeholder="Enter your password" required value="<?php echo ($editState ? $password : ''); ?>" />
          </div>

          <div class="column">
            <div class="input-box">
              <label>Full Name</label>
              <input type="text" id="Fullname" name="Fullname" placeholder="Enter full name" required value="<?php echo ($editState ? $fname : ''); ?>"/>
            </div>
            <div class="input-box">
              <label>Company Name</label>
              <input type="text" id="Cname" name="Cname" placeholder="Enter your Company Name" required value="<?php echo ($editState ? $cname : ''); ?>" />
            </div>  
          </div>

          <div class="input-box">
                  <label>Type of Industry</label>
                  <select  id="Industry" name="Industry" class="custom-select">
                    <option value="Food and Service"<?php echo (($editState) && ($industry == "Food and Services") ? 'selected': '');?>>Food and Services</option>
                    <option value="Technology"<?php echo (($editState) && ($industry == "Technology") ? 'selected': '');?>>Technology</option>
                    <option value="Construction"<?php echo (($editState) && ($industry == "Construction") ? 'selected': '');?>>Construction</option>
                    <option value="Agriculture"<?php echo (($editState) && ($industry == "Agriculture") ? 'selected': '');?>>Agriculture</option>
                    <option value="Manufacturing"<?php echo (($editState) && ($industry == "Manufacturing") ? 'selected': '');?>>Manufacturing</option>
                    <option value="Healthcare"<?php echo (($editState) && ($industry == "Healthcare") ? 'selected': '');?>>Healthcare</option>
                    <option value="BPO"<?php echo (($editState) && ($industry == "BPO") ? 'selected': '');?>>BPO</option>
                    <option value="Others"<?php echo (($editState) && ($industry == "Others") ? 'selected': '');?>>Others</option>
                  </select>
                </div>

          <div class="input-box">
            <label>Company Phone Number</label>
            <input type="text" id="Pnumber" name="Cpnumber" placeholder="Enter Company Phone Number" required value="<?php echo ($editState ? $pnumber : ''); ?>" />
          </div>

          <div class="input-box address">
            <label>Company Address</label>
            <input type="text" id="Address" name="Caddress" placeholder="Enter Full Address" required value="<?php echo ($editState ? $caddress : ''); ?>" />
          </div>

          <div class="column">
            <div class="input-box">
              <label>Job Position 1</label>
              <input type="text" id="Job1" name="Job1" placeholder="Enter Job Position (Leave it blank if none)" value="<?php echo ($editState ? $jobp1 : ''); ?>"/>
            </div>
            <div class="gender-option">
              <div class="gender">
                <input type="radio" id="check-fulltime" name="Worksched1" value="Full time" <?php echo (($editState) && ($worksched1 == "Full time") ? 'checked' : ''); ?> />
                <label for="check-male">Full Time</label>
              </div>
              <div class="gender">
                <input type="radio" id="check-parttime" name="Worksched1" value="Part time" <?php echo (($editState) && ($worksched1 == "Part time") ? 'checked' : ''); ?> />
                <label for="check-female">Part Time</label>
              </div>
            </div>
          </div>

          <div class="column">
            <div class="input-box">
              <label>Job Position 2</label>
              <input type="text" id="Job2" name="Job2" placeholder="Enter Job Position (Leave it blank if none)" value="<?php echo ($editState ? $jobp2 : ''); ?>"/>
            </div>
            <div class="gender-option">
              <div class="gender">
                <input type="radio" id="check-fulltime" name="Worksched2" value="Full time" <?php echo (($editState) && ($worksched2 == "Full time") ? 'checked' : ''); ?> />
                <label for="check-male">Full Time</label>
              </div>
              <div class="gender">
                <input type="radio" id="check-parttime" name="Worksched2" value="Part time" <?php echo (($editState) && ($worksched2 == "Part time") ? 'checked' : ''); ?> />
                <label for="check-female">Part Time</label>
              </div>
            </div>
          </div>
                
          <div class="column">
            <div class="input-box">
              <label>Job Position 3</label>
              <input type="text" id="Job3" name="Job3" placeholder="Enter Job Position (Leave it blank if none)" value="<?php echo ($editState ? $jobp3 : ''); ?>"/>
            </div>
            <div class="gender-option">
              <div class="gender">
                <input type="radio" id="check-fulltime" name="Worksched3" value="Full time" <?php echo (($editState) && ($worksched3 == "Full time") ? 'checked' : ''); ?> />
                <label for="check-male">Full Time</label>
              </div>
              <div class="gender">
                <input type="radio" id="check-parttime" name="Worksched3" value="Part time" <?php echo (($editState) && ($worksched3 == "Part time") ? 'checked' : ''); ?> />
                <label for="check-female">Part Time</label>
              </div>
            </div>
          </div> 
        <input type="submit" name="Update" value="UPDATE" class="form-btn">
      </form>
      </section>
     </div>
  </main>
  </body>
</html>
