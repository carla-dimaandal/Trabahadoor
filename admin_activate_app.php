<?php
  
  include 'config.php';

    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $select= "Select * from archive_app where Archive_appID=$id";
        $result1 = mysqli_query($conn, $select);
        $row = mysqli_fetch_array($result1);

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
        $imageURL = $row["Resume"];

        $insert = "INSERT INTO `jobseeker_info`(`Email`, `Password`, `Fname`, `Age`, `Address`, 
            `Pnumber`, `Birthday`, `Gender`, `TOD`, `PIDNO`, `Resume`) 
            VALUES('$email','$password','$fname','$age', '$address', '$pnumber','$birthday', '$gender', 
            '$tod', '$pidno','".$imageURL."')";
            
        mysqli_query($conn, $insert);

        $sql="delete from archive_app where Archive_appID=$id";
        $result2 = mysqli_query($conn,$sql);
    
    if($result2){
        header("location:admin_deacapp.php");
    }
    else{
        die(mysqli_error($conn));
    }
}
?>