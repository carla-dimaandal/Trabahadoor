<?php
    session_start();
    include 'config.php';
    include 'admin_delemp.php';

    $select = "SELECT * FROM `employer_info`";
               $result = mysqli_query($conn, $select);

    if (isset($_GET["search"])){
        $search = $_GET["searchdata"];
        $sql = "SELECT * FROM employer_info WHERE Employer_ID LIKE '$search%' OR Fname LIKE '$search%' OR Cname LIKE '$search%' OR Industry LIKE '$search%' 
        OR Email LIKE '$search%' OR Pnumber LIKE '$search%' OR Caddress LIKE '$search%' OR Jobp1 LIKE '$search%' OR Work_schedule1 LIKE '$search%' 
        OR Jobp2 LIKE '$search%' OR Work_schedule2 LIKE '$search%'OR Jobp3 LIKE '$search%' OR Work_schedule3 LIKE '$search%'";
        
        $result = mysqli_query($conn, $sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css\style5.css">
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
    <title>Trabahadoor</title>
</head>
<body>
    <main>
        <div class="container">
            <div class="navigation">
                <ul>
                <li>
                        <a href="admin_page.php">
                            <span class="icon"><img src="Images\TBDlogo.png" class="logo" alt="tbdlogo"></span>
                            <span class="title-logo">Trabahadoor</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin_page.php">
                            <span class="icon"><i class="ri-home-4-line"></i></span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin_app.php">
                            <span class="icon"><i class="ri-team-line"></i></span>
                            <span class="title">Applicants</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin_emp.php">
                            <span class="icon"><i class="ri-group-line"></i></span>
                            <span class="title">Employers</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin_deacapp.php">
                            <span class="icon"><i class="ri-user-unfollow-line"></i></span>
                            <span class="title">Deactivated Applicants</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin_deacemp.php">
                            <span class="icon"><i class="ri-user-unfollow-fill"></i></span>
                            <span class="title">Deactivated Employers</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <span class="icon"><i class="ri-logout-box-line"></i></span>
                            <span class="title">Sign Out</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="main">
                <div class="topbar">
                    <div class="toggle">
                        <i class="ri-menu-line"></i>
                </div>
                    
                </div>
                <h1 class="page-title">Employers</h1>
                <form action="admin_emp.php" class="searchbox" method="get">
                    <div class="search">
                             <button type="submit" name="search" class="search-btn">Search</button>
                            <input type="text" class="search-input" name="searchdata" placeholder="Search Here">      
                    </div>
                    </form>
           
                    <div class="table_responsive" id="table-responsive">
                    <table id="myTable">
                      <thead>
                      <tr>
                          <th>ID</th>
                          <th>Email</th>
                          <th>Full Name</th>
                          <th>Company</th>
                          <th>Industry</th>
                          <th>Company Phone Number</th> 
                          <th>Company Address</th>
                          <th>Job Position 1</th>
                          <th>Work Schedule 1</th>
                          <th>Job Position 2</th>
                          <th>Work Schedule 2</th>
                          <th>Job Position 3</th>
                          <th>Work Schedule 3</th>
                    
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                
                      <tbody>
                      <?php
               

               if($result)  {
                while ($row = mysqli_fetch_assoc($result)) {
                  $employee_id = $row['Employer_ID'];
                  $email = $row['Email'];
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

                  echo '<tr>
                  <th scope="row">'.$employee_id.'</th>
                  <td>'.$email.'</td>
                  <td>'.$fname.'</td>
                  <td>'.$cname.'</td>
                  <td>'.$industry.'</td>
                  <td>'.$pnumber.'</td>
                  <td>'.$caddress.'</td>
                  <td>'.$jobp1.'</td>
                  <td>'.$worksched1.'</td>
                  <td>'.$jobp2.'</td>
                  <td>'.$worksched2.'</td>
                  <td>'.$jobp3.'</td>
                  <td>'.$worksched3.'</td>
                  <td style="text-align: center"><button class="btn"><a class="edit-btn" href="admin_udemp.php?updateid='.$employee_id.'"><i class="ri-edit-2-line"></i></a></button></td>
                  <td style="text-align: center"><button class="btn"><a class="delete-btn" href="admin_delemp.php?deleteid='.$employee_id.'"><i class="ri-prohibited-line"></i></a></button></td>
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
                </div>
                
                           
                    </div>
        </div>
    </main>
</body>
<script src="Javascript\main.js"></script>  
<script src="Javascript/pagination.js"></script>
</html>