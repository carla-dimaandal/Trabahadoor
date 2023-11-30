<?php
  
  include 'config.php';

    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $select= "Select * from employer_info where employer_id=$id";
        $result1 = mysqli_query($conn, $select);
        $row = mysqli_fetch_array($result1);

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

        $insert = "INSERT INTO `archive_emp`(`Email`, `Password`, `Fname`, `Cname`, `Industry`, `Pnumber`, `Caddress`, 
        `Jobp1`, `Work_schedule1`,`Jobp2`, `Work_schedule2`, `Jobp3`, `Work_schedule3`) VALUES('$email', '$password',
        '$fname','$cname','$industry', '$pnumber', '$caddress','$jobp1', '$worksched1','$jobp2', '$worksched2','$jobp3', '$worksched3')";

        mysqli_query($conn, $insert);

        $sql="delete from employer_info where employer_id=$id";
        $result2 = mysqli_query($conn,$sql);
    
    if($result2){
        header("location:admin_emp.php");
    }
    else{
        die(mysqli_error($conn));
    }
}
?>