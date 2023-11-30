<?php

include 'config.php';

$editState = false;
$jseekerID;
if (isset($_GET["updateid"])){
    $editState = true;
    $jseekerID = $_GET["updateid"];

    $sql = "SELECT `Email`, `Password`, `Fname`, `Age`, `Address`, `Pnumber`, `Birthday`, `Gender`, `TOD`, `PIDNO`, `Resume`
    FROM `jobseeker_info` WHERE `Jobseeker_ID`='$jseekerID'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $email = $row['Email'];
    $password =$row['Password'];
    $fname = $row['Fname'];
    $age = $row['Age'];
    $address = $row['Address'];
    $pnumber = $row['Pnumber'];
    $birthday = $row['Birthday'];
    $gender = $row['Gender'];
    $tod = $row['TOD'];
    $pidno = $row['PIDNO'];
    $imageURL = 'uploads/'.$row["Resume"];
}

if(isset($_POST['Update'])){
  $email = mysqli_real_escape_string($conn, $_POST['Email']);
  $password = $_POST['Password'];
  $fname = mysqli_real_escape_string($conn, $_POST['Fullname']);
  $age = $_POST['Age'];
  $address = mysqli_real_escape_string($conn, $_POST['Address']);
  $pnumber = mysqli_real_escape_string($conn,$_POST['Pnumber']);
  $birthday = date('Y-m-d', strtotime($_POST['Bday']));
  $gender = $_POST['Gender'];
  $tod = $_POST['TPWD'];
  $pidno = mysqli_real_escape_string($conn, $_POST['PIDNO']);
  $targetDir = "uploads/";       
  
  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number = preg_match('@[0-9]@', $password);
  $specialChars = preg_match('@[^\w]@', $password);
  
  if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8){
    $error[] = 'Password must contain at least 8 characters, including uppercase, lowercase letters, numbers, and special characters.';
  }elseif(!empty($_FILES["file"]["name"])){ 
      
      $fileName = basename($_FILES["file"]["name"]); 
      $targetFilePath = $targetDir . $fileName; 
      $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
         
      // Allow certain file formats 
      $allowTypes = array('jpg','png','jpeg','gif'); 
      if(in_array($fileType, $allowTypes)){ 
          // Upload file to server 
          if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
          // Insert image file name into database 
          $update = "UPDATE `jobseeker_info` SET `Email`='$email', `Password`='$password', `Fname`='$fname',`Age`='$age',`Address`='$address',
          `Pnumber`='$pnumber',`Birthday`='$birthday',`Gender`='$gender',`TOD`='$tod',`PIDNO`='$pidno', Resume ='".$fileName."' WHERE Jobseeker_ID ='$jseekerID'";
          mysqli_query($conn, $update);
          header('location:admin_app.php');
      }
    }
  }elseif(empty($_FILES["file"]["name"])){ 
    $update = "UPDATE `jobseeker_info` SET `Email`='$email',`Password`='$password',`Fname`='$fname',`Age`='$age',`Address`='$address',
    `Pnumber`='$pnumber',`Birthday`='$birthday',`Gender`='$gender',`TOD`='$tod',`PIDNO`='$pidno' WHERE Jobseeker_ID ='$jseekerID'";
    mysqli_query($conn, $update);
    header('location:admin_app.php');
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
                            <li><a href="admin_app.php">Home</a></li>
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
        <h3>Update Form</h3>
        <form action="#" class="form" method="post" enctype="multipart/form-data">
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
            <label>Full Name <i>(Buong Pangalan)</i></label>
            <input type="text" id="Fullname" name="Fullname" placeholder="Enter full name" required value="<?php echo ($editState ? $fname : ''); ?>" />
          </div>
          <div class="input-box">
            <label>Age <i>(Edad)</i></label>
            <input type="text" id="Age" name="Age" placeholder="Enter your age" required  value="<?php echo ($editState ? $age : ''); ?>"/>
          </div>  
        </div>

        <div class="input-box address">
          <label>Address</label>
          <input type="text" id="Address" name="Address" placeholder="Enter Full Address" required value="<?php echo ($editState ? $address : ''); ?>"/>
        </div>

        <div class="column">
          <div class="input-box">
            <label>Phone Number</label>
            <input type="text" id="Pnumber" name="Pnumber" placeholder="Enter phone number" required value="<?php echo ($editState ? $pnumber: ''); ?>" />
          </div>
          <div class="input-box">
            <label>Birthday<i>(Kaarawan)</i></label>
            <input type="date" id="Bday" name="Bday" placeholder="Enter birth date" required value="<?php echo ($editState ? $birthday : ''); ?>"/>
          </div>
        </div>

        <div class="gender-box">
          <h3>Gender<i> (Kasarian)</i></h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="Gender" value="male" <?php echo (($editState) && ($gender == "male") ? 'checked' : ''); ?> />
              <label for="check-male">Male<i> (Lalaki)</i></label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="Gender" value="female" <?php echo (($editState) && ($gender == "female") ? 'checked' : ''); ?> />
              <label for="check-female">Female<i> (Babae)</i></label>
            </div>
          </div>
        </div>
                  
        <div class="input-box">
          <label>Type of Disability</label>
          <select  id="TPWD" name="TPWD" class="custom-select">
          <option value="Physical or Motor Disability" <?php echo (($editState) && ($tod == "Physical or Motor Disability") ? 'selected': '');?>>Physical or Motor Disability</option>
          <option value="Sensory Disability" <?php echo (($editState) && ($tod == "Sensory Disability") ? 'selected': '');?>>Sensory Disability</option>
          <option value="Intellectual Disability" <?php echo (($editState) && ($tod == "Intellectual Disability") ? 'selected': '');?>>Intellectual Disability</option>
          <option value="Psychosocial Disability" <?php echo (($editState) && ($tod == "Psychosocial Disability") ? 'selected': '');?>>Psychosocial Disability</option>
          <option value="Visceral Disability" <?php echo (($editState) && ($tod == "Visceral Disability") ? 'selected': '');?>>Visceral Disability</option>
          <option value="Multiple Disabilities" <?php echo (($editState) && ($tod == "Multiple Disabilities") ? 'selected': '');?>>Multiple Disabilities</option>
          </select>
        </div>

        <div class="input-box">
          <label>PWD ID NO.</label>
          <input type="text" id="PIDNO" name="PIDNO" placeholder="Enter id no. of PWD ID" required value="<?php echo ($editState ? $pidno : ''); ?>"/>
        </div>

        <div class="input-box">
          <label>Upload Your Resume<br>
          <input type="file" id="file" name="file"> <br>
        </div>

        <input type="submit" name="Update" value="UPDATE" class="form-btn">
                  
      </form>
      </section>
      </div>
    </main>
    ]</body>
</html>