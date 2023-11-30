<?php
    session_start();
    include 'config.php';
    include 'admin_delapp.php';

    $select = "SELECT * FROM `jobseeker_info`";
               $result = mysqli_query($conn, $select);

    if (isset($_GET["search"])){
        $search = $_GET["searchdata"];
        $sql = "SELECT * FROM jobseeker_info WHERE Jobseeker_ID LIKE '$search%' OR Email LIKE '$search%' OR Fname LIKE '$search%' OR Age LIKE '$search%' OR Pnumber LIKE '$search%' 
        OR 	Birthday LIKE '$search%' OR Gender LIKE '$search%' OR Address LIKE '$search%' OR TOD LIKE '$search%' OR PIDNO LIKE '$search'";
        
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
                <h1 class="page-title">Applicants</h1>
                    <form action="admin_app.php" method="get">
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
                            <th>Name</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Birthday</th>
                            <th>Gender</th>
                            <th>Disability</th>
                            <th>PWD ID No</th>
                            <th>Resume</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
               if($result)  {
                while ($row = mysqli_fetch_assoc($result)) {
                  $jobseeker_id = $row['Jobseeker_ID'];
                  $email = $row['Email'];
                  $fname = $row['Fname'];
                  $age = $row['Age'];
                  $address = $row['Address'];
                  $pnumber = $row['Pnumber'];
                  $birthday = $row['Birthday'];
                  $gender = $row['Gender'];
                  $tod = $row['TOD'];
                  $pidno = $row['PIDNO'];
                  $imageURL = 'uploads/'.$row["Resume"];

                  echo '<tr>
                  <th scope="row">'.$jobseeker_id.'</th>
                  <td>'.$email.'</td>
                  <td>'.$fname.'</td>
                  <td>'.$age.'</td>
                  <td>'.$address.'</td>
                  <td>'.$pnumber.'</td>
                  <td>'.$birthday.'</td>
                  <td>'.$gender.'</td>
                  <td>'.$tod.'</td>
                  <td>'.$pidno.'</td>
                  <td style="text-align: center"><button class="btn"><a class="edit-btn" href=download.php?Resume='.$imageURL.'"><i class="ri-download-2-line"></i></a></button></td>
                  <td style="text-align: center"><button class="btn"><a class="edit-btn" href="admin_udapp.php?updateid='.$jobseeker_id.'"><i class="ri-edit-2-line"></i></a></button></td>
                  <td style="text-align: center"><button class="btn"><a class="delete-btn" href="admin_app.php?deleteid='.$jobseeker_id.'"><i class="ri-prohibited-line"></i></a></button></td>
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

        <!-- Try -->
        <!-- <script>
        let popupmodal = document.getElementById("myModal");
        let modalContent = document.getElementById("modalContent");

        if(window.location.href.includes(".php?deleteid")){
            popupmodal.style.display = "flex";
        }

        function closeModal() {
            popupmodal.style.display = "none";
            modalContent.style.display = "none";
        }
        </script>-->
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