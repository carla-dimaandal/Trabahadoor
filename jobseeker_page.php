<?php
  session_start();
  include 'config.php';

  $select = "SELECT * FROM `employer_info`";
  $result = mysqli_query($conn, $select);

  if (isset($_GET["search"])){
    $search = $_GET["searchdata"];
    $sql = "SELECT * FROM employer_info WHERE Employer_ID LIKE '$search%' OR Cname LIKE '$search%' OR Industry Like '$search%' 
    OR Jobp1 LIKE '$search%' OR Work_schedule1 LIKE '$search%' OR Jobp2 LIKE '$search%' OR Work_schedule2 LIKE '$search%'
    OR Jobp3 LIKE '$search%' OR Work_schedule3 LIKE '$search%'";

    $result = mysqli_query($conn, $sql);
    }   

  if (isset($_GET["filter"])){
        $filter_industry = $_GET["filter_industry"];
        $filter_ws = $_GET["filter_ws"];
        $sql = "SELECT * FROM employer_info WHERE Industry LIKE '$filter_industry%' OR 
        Work_schedule1 LIKE '$filter_ws' OR Work_schedule2 LIKE '$filter_ws' OR Work_schedule3 LIKE '$filter_ws'";
        

    $result = mysqli_query($conn, $sql);
    } 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabahadoor Online Job Portal</title>
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
                       
                            <h3 class="uname">Welcome to Trabahadoor, Job Seeker!</h3>
                        
                        <input type='checkbox' id='check'/>
                        <span class="menu">
                            <li><a href="jobseeker_page.php">Home</a></li>
                            <li><a href="jobseeker_update.php">Update Information</a></li>
                            <li><a href="logout.php">Sign Out</a></li>
                            <label for="check" class="close-menu"><i class="fas fa-times"></i></label>
                        </span>
                        <label for="check" class="open-menu"><i class="fas fa-bars"></i></label>
                    </ul>
                </nav>
            </header>
            <div class="title">
            <h1 class="page-title">Find Great Places to Work</h1>
            <h2 class="page-cap">Get access to inclusive job opportunities</h2>
            </div>
<!-- search -->
        <form action="jobseeker_page.php" method="get">
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
<form action="jobseeker_page.php" method="get">
        <div class="filter-box">
            <label><i class="ri-filter-3-line"></i>&nbsp;Filters:</label>
            <select class="filter-select" id="job-function" name="filter_industry">
                <option value=""><i class="ri-filter-3-line"></i>Industry</option>
                <option value="Food and Service">Food and Service</option>
                <option value="Technology">Technology</option>
                <option value="Construction">Construction</option>
                <option value="Agriculture">Agriculture</option>
                <option value="Manufacturing">Manufacturing</option>
                <option value="Healthcare">Healthcare</option>
                <option value="BPO">BPO</option>
                <option value="Others">Others</option>
            </select>
            <select class="filter-select" id="job-function" name="filter_ws">
                <option value=""><i class="ri-filter-3-line"></i>Working Schedule</option>
                <option value="Full time">Full Time</option>
                <option value="Part time">Part Time</option>
            </select>
              <button class="filter-btn" type="submit" name="filter">Apply</button>
              </div>
        </form>
<!-- title -->

    <div class="title">
            <h1 class="table-title">Hiring Companies</h1>
            </div>
   
    
    <div class="table_responsive" id="table-responsive">
        <table id="myTable">
          <thead>
            <tr>
              <th>ID</th>
              <th>Company</th>
              <th>Industry</th>
              <th>Email</th>
              <th>Job Position 1</th>
              <th>Work Schedule</th>
              <th>Job Position 2</th>
              <th>Work Schedule</th>
              <th>Job Position 3</th>
              <th>Work Schedule</th>
              <th>Message</th>
            </tr>
          </thead>
    
          <tbody>
          <?php
               if($result)  {
                while ($row = mysqli_fetch_assoc($result)) {
                  $employee_id = $row['Employer_ID'];
                  $cname = $row['Cname'];
                  $industry = $row['Industry'];
                  $email = $row['Email'];
                  $jobp1 = $row['Jobp1'];
                  $worksched1 = $row['Work_schedule1'];
                  $jobp2 = $row['Jobp2'];
                  $worksched2 = $row['Work_schedule2'];
                  $jobp3 = $row['Jobp3'];
                  $worksched3 = $row['Work_schedule3'];

                  echo '<tr>
                  <th scope="row">'.$employee_id.'</th>
                  <td>'.$cname.'</td>
                  <td>'.$industry.'</td>
                  <td>'.$email.'</td>
                  <td>'.$jobp1.'</td>
                  <td>'.$worksched1.'</td>
                  <td>'.$jobp2.'</td>
                  <td>'.$worksched2.'</td>
                  <td>'.$jobp3.'</td>
                  <td>'.$worksched3.'</td>
                  <td style="text-align: center"><a class="message-btn" href="mailto:'.$email.'"><i class="ri-mail-line"></i></a></td>
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
