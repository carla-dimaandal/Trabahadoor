<?php

include 'config.php';

$sqljs = "SELECT COUNT(*) as Jobseeker_ID FROM jobseeker_info";

$resultjs = mysqli_query($conn, $sqljs);

if ($resultjs->num_rows > 0) {
    $row = $resultjs->fetch_assoc();
    $totaljs = $row["Jobseeker_ID"];
} else {
    $totaljs = 0;
}

$sqlemp = "SELECT COUNT(*) as Employer_ID FROM employer_info";

$resultemp = mysqli_query($conn, $sqlemp);

if ($resultjs->num_rows > 0) {
    $row = $resultemp->fetch_assoc();
    $totalemp = $row["Employer_ID"];
} else {
    $totalemp = 0;
}

$sqlft = "SELECT 
            SUM(count_column1) AS total_count_column1,
            SUM(count_column2) AS total_count_column2,
            SUM(count_column3) AS total_count_column3,
            SUM(count_column1 + count_column2 + count_column3) AS total_sum
          FROM (
            SELECT 
            CASE WHEN Work_schedule1 = 'Full time' THEN 1 ELSE 0 END AS count_column1,
            CASE WHEN Work_schedule2 = 'Full time' THEN 1 ELSE 0 END AS count_column2,
            CASE WHEN Work_schedule3 = 'Full time' THEN 1 ELSE 0 END AS count_column3 
        
            FROM employer_info
            ) AS counts_from_columns";

$resultft = mysqli_query($conn, $sqlft);            

if ($resultft !== false && $resultft->num_rows > 0) {
    $row = $resultft->fetch_assoc();
    $totalft = $row['total_sum'];
} else{
    $totalft = 0;
}


$sqlpt = "SELECT 
            SUM(count_column1) AS total_count_column1,
            SUM(count_column2) AS total_count_column2,
            SUM(count_column3) AS total_count_column3,
            SUM(count_column1 + count_column2 + count_column3) AS total_sum
          FROM (
            SELECT 
            CASE WHEN Work_schedule1 = 'Part time' THEN 1 ELSE 0 END AS count_column1,
            CASE WHEN Work_schedule2 = 'Part time' THEN 1 ELSE 0 END AS count_column2,
            CASE WHEN Work_schedule3 = 'Part time' THEN 1 ELSE 0 END AS count_column3 
        
            FROM employer_info
            ) AS counts_from_columns";

$resultpt = mysqli_query($conn, $sqlpt);            

if ($resultpt !== false && $resultpt->num_rows > 0) {
    $row = $resultpt->fetch_assoc();
    $totalpt = $row['total_sum'];
} else{
    $totalpt = 0;
}

//Industry chart

$sql_industry1 = "SELECT COUNT(*) as Employer_ID FROM employer_info WHERE Industry = 'Food and Service'";

$result_industry1 = mysqli_query($conn, $sql_industry1);

if ($result_industry1->num_rows > 0) {
    $row = $result_industry1->fetch_assoc();
    $total_industry1 = $row["Employer_ID"];
} else {
    $total_industry1 = 0;
}

$sql_industry2 = "SELECT COUNT(*) as Employer_ID FROM employer_info WHERE Industry = 'Technology'";

$result_industry2 = mysqli_query($conn, $sql_industry2);

if ($result_industry2->num_rows > 0) {
    $row = $result_industry2->fetch_assoc();
    $total_industry2 = $row["Employer_ID"];
} else {
    $total_industry2 = 0;
}

$sql_industry3 = "SELECT COUNT(*) as Employer_ID FROM employer_info WHERE Industry = 'Construction'";

$result_industry3 = mysqli_query($conn, $sql_industry2);

if ($result_industry3->num_rows > 0) {
    $row = $result_industry3->fetch_assoc();
    $total_industry3 = $row["Employer_ID"];
} else {
    $total_industry3 = 0;
}

$sql_industry4 = "SELECT COUNT(*) as Employer_ID FROM employer_info WHERE Industry = 'Agriculture'";

$result_industry4 = mysqli_query($conn, $sql_industry3);

if ($result_industry4->num_rows > 0) {
    $row = $result_industry4->fetch_assoc();
    $total_industry4 = $row["Employer_ID"];
} else {
    $total_industry4 = 0;
}

$sql_industry4 = "SELECT COUNT(*) as Employer_ID FROM employer_info WHERE Industry = 'Agriculture'";

$result_industry4 = mysqli_query($conn, $sql_industry4);

if ($result_industry4->num_rows > 0) {
    $row = $result_industry4->fetch_assoc();
    $total_industry4 = $row["Employer_ID"];
} else {
    $total_industry4 = 0;
}

$sql_industry5 = "SELECT COUNT(*) as Employer_ID FROM employer_info WHERE Industry = 'Manufacturing'";

$result_industry5 = mysqli_query($conn, $sql_industry5);

if ($result_industry5->num_rows > 0) {
    $row = $result_industry5->fetch_assoc();
    $total_industry5 = $row["Employer_ID"];
} else {
    $total_industry5 = 0;
}

$sql_industry6 = "SELECT COUNT(*) as Employer_ID FROM employer_info WHERE Industry = 'Healthcare'";

$result_industry6 = mysqli_query($conn, $sql_industry6);

if ($result_industry6->num_rows > 0) {
    $row = $result_industry6->fetch_assoc();
    $total_industry6 = $row["Employer_ID"];
} else {
    $total_industry6 = 0;
}

$sql_industry7 = "SELECT COUNT(*) as Employer_ID FROM employer_info WHERE Industry = 'BPO'";

$result_industry7 = mysqli_query($conn, $sql_industry7);

if ($result_industry7->num_rows > 0) {
    $row = $result_industry7->fetch_assoc();
    $total_industry7 = $row["Employer_ID"];
} else {
    $total_industry7 = 0;
}

$sql_industry8 = "SELECT COUNT(*) as Employer_ID FROM employer_info WHERE Industry = 'Others'";

$result_industry8 = mysqli_query($conn, $sql_industry8);

if ($result_industry8->num_rows > 0) {
    $row = $result_industry8->fetch_assoc();
    $total_industry8 = $row["Employer_ID"];
} else {
    $total_industry8 = 0;
}

$dataPoints1 = array( 
    array("y" => $total_industry4, "label" => "Agriculture" ),
    array("y" => $total_industry7, "label" => "BPO" ),
    array("y" => $total_industry3, "label" => "Construction" ),
	array("y" => $total_industry1, "label" => "Food and Service" ),
    array("y" => $total_industry6, "label" => "Healthcare" ),
    array("y" => $total_industry5, "label" => "Manufacturing" ),
	array("y" => $total_industry2, "label" => "Technology" ),
    array("y" => $total_industry8, "label" => "Others" ),
);

//Disabilities

$sql_tod1 = "SELECT COUNT(*) as Jobseeker_ID FROM jobseeker_info WHERE TOD = 'Physical or Motor Disability'";

$result_tod1 = mysqli_query($conn, $sql_tod1);

if ($result_tod1->num_rows > 0) {
    $row = $result_tod1->fetch_assoc();
    $total_tod1 = $row["Jobseeker_ID"];
} else {
    $total_tod1 = 0;
}

$sql_tod2 = "SELECT COUNT(*) as Jobseeker_ID FROM jobseeker_info WHERE TOD = 'Sensory Disability'";

$result_tod2 = mysqli_query($conn, $sql_tod2);

if ($result_tod2->num_rows > 0) {
    $row = $result_tod2->fetch_assoc();
    $total_tod2 = $row["Jobseeker_ID"];
} else {
    $total_tod2 = 0;
}

$sql_tod3 = "SELECT COUNT(*) as Jobseeker_ID FROM jobseeker_info WHERE TOD = 'Intellectual Disability'";

$result_tod3 = mysqli_query($conn, $sql_tod3);

if ($result_tod3->num_rows > 0) {
    $row = $result_tod3->fetch_assoc();
    $total_tod3 = $row["Jobseeker_ID"];
} else {
    $total_tod3 = 0;
}

$sql_tod4 = "SELECT COUNT(*) as Jobseeker_ID FROM jobseeker_info WHERE TOD = 'Psychosocial Disability'";

$result_tod4 = mysqli_query($conn, $sql_tod4);

if ($result_tod4->num_rows > 0) {
    $row = $result_tod4->fetch_assoc();
    $total_tod4 = $row["Jobseeker_ID"];
} else {
    $total_tod4 = 0;
}

$sql_tod5 = "SELECT COUNT(*) as Jobseeker_ID FROM jobseeker_info WHERE TOD = 'Visceral Disability'";

$result_tod5 = mysqli_query($conn, $sql_tod5);

if ($result_tod5->num_rows > 0) {
    $row = $result_tod5->fetch_assoc();
    $total_tod5 = $row["Jobseeker_ID"];
} else {
    $total_tod5 = 0;
}

$sql_tod6 = "SELECT COUNT(*) as Jobseeker_ID FROM jobseeker_info WHERE TOD = 'Multiple Disabilities'";

$result_tod6 = mysqli_query($conn, $sql_tod5);

if ($result_tod6->num_rows > 0) {
    $row = $result_tod6->fetch_assoc();
    $total_tod6 = $row["Jobseeker_ID"];
} else {
    $total_tod6 = 0;
}

$dataPoints2 = array( 
    array("y" => $total_tod5, "label" => "Visceral Disability" ),
    array("y" => $total_tod2, "label" => "Sensory Disability" ),
    array("y" => $total_tod1, "label" => "Physical or Motor Disability" ),
    array("y" => $total_tod4, "label" => "Psychosocial Disability" ),
    array("y" => $total_tod6, "label" => "Multiple Disabilities" ),
    array("y" => $total_tod3, "label" => "Intellectual Disability" ),	
);


//Working Schedule

$dataPoints3 = array( 
	array("y" => $totalft, "label" => "Full Time" ),
	array("y" => $totalpt, "label" => "Part Time" ),
);

//Gender

$sql_gender1 = "SELECT COUNT(*) as Jobseeker_ID FROM jobseeker_info WHERE Gender = 'Male'";

$result_gender1 = mysqli_query($conn, $sql_gender1);

if ($result_gender1->num_rows > 0) {
    $row = $result_gender1->fetch_assoc();
    $total_gender1 = $row["Jobseeker_ID"];
} else {
    $total_gender1 = 0;
}

$sql_gender2 = "SELECT COUNT(*) as Jobseeker_ID FROM jobseeker_info WHERE Gender = 'Female'";

$result_gender2 = mysqli_query($conn, $sql_gender2);

if ($result_gender2->num_rows > 0) {
    $row = $result_gender2->fetch_assoc();
    $total_gender2 = $row["Jobseeker_ID"];
} else {
    $total_gender2 = 0;
}

$dataPoints4 = array( 
	array("y" => $total_gender1, "label" => "Male" ),
	array("y" => $total_gender2, "label" => "Female" ),
);

//Age

$sql_age1 = "SELECT COUNT(*) AS Jobseeker_ID
             FROM jobseeker_info
             WHERE Age IN (18, 19,20,21,22,23,24,25,26,27,28,29,30);";

$result_age1 = mysqli_query($conn, $sql_age1);

if ($result_age1->num_rows > 0) {
    $row = $result_age1->fetch_assoc();
    $total_age1 = $row["Jobseeker_ID"];
} else {
    $total_age1 = 0;
}

$sql_age2 = "SELECT COUNT(*) AS Jobseeker_ID
             FROM jobseeker_info
             WHERE Age IN (31,32,33,34,35,36,37,38,39,40);";

$result_age2 = mysqli_query($conn, $sql_age2);

if ($result_age2->num_rows > 0) {
    $row = $result_age2->fetch_assoc();
    $total_age2 = $row["Jobseeker_ID"];
} else {
    $total_age2 = 0;
}

$sql_age3 = "SELECT COUNT(*) AS Jobseeker_ID
             FROM jobseeker_info
             WHERE Age IN (41,42,43,44,45,46,47,48,49,50);";

$result_age3 = mysqli_query($conn, $sql_age3);

if ($result_age3->num_rows > 0) {
    $row = $result_age3->fetch_assoc();
    $total_age3 = $row["Jobseeker_ID"];
} else {
    $total_age3 = 0;
}

$sql_age4 = "SELECT COUNT(*) AS Jobseeker_ID
             FROM jobseeker_info
             WHERE Age IN (51,52,53,54,55,56,57,58,59,60);";

$result_age4 = mysqli_query($conn, $sql_age4);

if ($result_age4->num_rows > 0) {
    $row = $result_age4->fetch_assoc();
    $total_age4 = $row["Jobseeker_ID"];
} else {
    $total_age4 = 0;
}

$dataPoints5 = array( 
	array("y" => $total_age1, "label" => "18-30" ),
	array("y" => $total_age2, "label" => "31-40" ),
    array("y" => $total_age3, "label" => "41-50" ),
	array("y" => $total_age4, "label" => "51-60" ),
);

$conn->close();
