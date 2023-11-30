<?php
session_start();
include 'config.php';

$select = "SELECT `Jobseeker_ID`, `Fname`, `Age`, `Gender`, `Address`, `Email`, `TOD`, `Resume` FROM `jobseeker_info` ";
$result = mysqli_query($conn, $select);


if (isset($_GET["search"])){
$search = $_GET["searchdata"];
$sql = "SELECT * FROM jobseeker_info WHERE Jobseeker_ID LIKE '$search%' OR Fname LIKE '$search%' OR Age LIKE '$search%' OR Gender LIKE '$search%' 
OR Address LIKE '$search%' OR Email LIKE '$search%' OR TOD LIKE '$search%' OR Resume LIKE '$search%'";

$result = mysqli_query($conn, $sql);
}

if (isset($_GET["filter"])){
    $filter = $_GET["filterdata"];
    $sql = "SELECT * FROM jobseeker_info WHERE TOD LIKE '$filter%'";

$result = mysqli_query($conn, $sql);
} 
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabahadoor Online Job Portal</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/joblist.css">
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
    <body>
      <main>
        <div class="big-wrapper">
            <header>
                <nav>
                    <ul class='nav-bar'>
                        <div class="logo">
                            <img src="Images\TBDlogo.png" alt="Logo" class="img">
                            <h3>Trabahadoor</h3>
                        </div>
                        <h3 class="uname">Welcome to Trabahadoor, Employer!</h3>
                        <input type='checkbox' id='check'/>
                        <span class="menu">
                            <li><a href="employer_page.php">Home</a></li>
                            <li><a href="employer_update.php">Update Information</a></li>
                            <li><a href="logout.php">Sign Out</a></li>
                            <label for="check" class="close-menu"><i class="fas fa-times"></i></label>
                        </span>
                        <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
                    </ul>
                    
                </nav>
            </header>
            <div class="title">
            <h1 class="page-title">Discover Exceptional Candidates</h1>
            <h2 class="page-cap">Let us Help you Find them</h2>
            </div>

<!-- search -->
    <form action="employer_page.php" method="get">
        <div class="search-wrapper">
            <div class="search-box">
                <div class="search-card">
                    <input class="search-input" type="text" name="searchdata" placeholder="Job title or Keywords">
                    <button class="search-button" type="submit" name="search" class="mini-btn">Search</button>
                </div>
            </div>
        </div>
    </form>
<!-- filter box -->

<form action="employer_page.php" method="get">
        <div class="filter-box">
            <label><i class="ri-filter-3-line"></i>&nbsp;Filters:</label>
            <select class="filter-select" id="job-function" name="filterdata">
                <option value="">Type of Disability</option>
                <option>Physical or Motor</option>
                <option>Sensory</option>
                <option>Intellectual</option>
                <option>Psychosocial</option>
                <option>Visceral Disability</option>
                <option>Multiple Disabilities</option>
            </select>
              <button class="filter-btn" type="submit" name="filter">Apply</button>
              </div>
        </form>
       
  <!-- title -->

  <div class="title">
            <h1 class="table-title">Job Seekers</h1>
            </div>
            <div class="table_responsive" id="table-responsive">
        <table id="myTable">
          <thead>
            <tr>
            <th>ID</th>
              <th>Name</th>
              <th>Age</th>
              <th>Gender</th>
              <th>Address</th>
              <th>Email</th>
              <th>Disability</th>
              <th>View Resume</th>
              <th>Download Resume</th>
              <th>Message</th>
            </tr>
          </thead>
    
          <tbody>
            <?php
               if($result)  {
                while ($row = mysqli_fetch_assoc($result)) {
                  $jobseeker_id = $row['Jobseeker_ID'];
                  $fname = $row['Fname'];
                  $age = $row['Age'];
                  $gender = $row['Gender'];
                  $address = $row['Address'];
                  $email = $row['Email'];
                  $tod = $row['TOD'];
                  $resume = $row['Resume'];
                  $imageURL = 'uploads/'.$row["Resume"];

                  

                  echo '<tr>
                  <th scope="row">'.$jobseeker_id.'</th>
                  <td>'.$fname.'</td>
                  <td>'.$age.'</td>
                  <td>'.$gender.'</td>
                  <td>'.$address.'</td>
                  <td>'.$email.'</td>
                  <td>'.$tod.'</td>
                  <td><button class="btn"><a class="btn-text" href=viewimage.php?Resume='.$imageURL.'">View</button>
                  <td><button class="download-btn"><a class="icon-style" href=download.php?Resume='.$imageURL.'"><i class="ri-download-2-line"></i>&nbsp;Download</a></button></td>
                  <td style="text-align: center"><a class="icon-style"  href="mailto:'.$email.'"><i class="ri-mail-line"></i></a></td>
                  </tr>';
                }
               }
               ?>
         </tbody>
        </table>
      </div>
      <div id="index_native" class="box"></div>        
        <!--function call to add pagination after loading of page-->
            </div>
          <script type="text/javascript">
            window.addEventListener("load", function () {
                
                paginator({
                    table: document.getElementById("table-responsive").getElementsByTagName("table")[0],
                    box: document.getElementById("index_native"),
                    active_class: "color_page"
                });
            }, false);
        </script> 
    </div>
            </section>
        </div>
    </main>
    <script src="Javascript/pagination.js"></script>
    
</body>
</html>