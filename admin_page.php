<?php
include 'config.php';
include 'admin_analytics.php';
?>

<!DOCTYPE html>
</body>
</html>
<html lang="en">
<head>
<script>
window.onload = function () {
    CanvasJS.addColorSet("Blueshades",
                [//colorSet Array
                "#00072D",
                "#051560", 
                "#1E3F66",
                "#2E5984",
                "#528AAE",
                "#73A5C6",
                "#91BAD6",
                "#BCD2E8",
                "#F0FFFF",                
                ]);
    CanvasJS.addColorSet("Forpie",
                ["#2E5984",
                "#73A5C6",
            ]);
 
var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	exportEnabled: true,
	colorSet: "Blueshades",
	title:{
		text: "Industry"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart1.render();

var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	exportEnabled: true,
	colorSet: "Blueshades",
	title:{
		text: "Type of Disabilities"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "bar", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();

var chart3 = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	exportEnabled: true,
    colorSet: "Forpie",
	title:{
		text: "Working Schedule"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "pie", //change type to bar, line, area, pie, etc
		// //indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	}]
});
chart3.render();

var chart4 = new CanvasJS.Chart("chartContainer4", {
	animationEnabled: true,
	exportEnabled: true,
	colorSet: "Forpie",
	title:{
		text: "Gender"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "pie", //change type to bar, line, area, pie, etc
		// //indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
	}]
});
chart4.render();

var chart5 = new CanvasJS.Chart("chartContainer5", {
	animationEnabled: true,
	exportEnabled: true,
	colorSet: "Blueshades",
	title:{
		text: "Age of Jobseeker"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints5, JSON_NUMERIC_CHECK); ?>
	}]
});
chart5.render();
 
}
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/style5.css">
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/style5.css">
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
           
                <div class="card-box">
                    <div class="card">
                        <div>
                            <div class="numbers"><?php echo $totaljs; ?></div>
                            <div class="card-name">Total Jobseeker</div>
                        </div>
                        <div class="icon-bx">
                        <i class="ri-team-line"></i>
                        </div>
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers"><?php echo $totalemp; ?></div>
                            <div class="card-name">Total Employer</div>
                        </div>
                        <div class="icon-bx">
                        <i class="ri-group-line"></i>
                        </div>
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers"><?php echo $totalft; ?></div>
                            <div class="card-name">Full time jobs available</div>
                        </div>
                        <div class="icon-bx">
                        <i class="ri-briefcase-fill"></i>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div>
                            <div class="numbers"><?php echo $totalpt; ?></div>
                            <div class="card-name">Part time jobs available</div>
                        </div>
                        <div class="icon-bx">
                        <i class="ri-time-line"></i>
                        </div>
                    </div>
                </div>
                <!-- Industry -->
                <div class="details">

                    <div class="recent-orders">
                        <div class="card-header">
                            <h2>Industries</h2>
                        </div>
                        <div id="chartContainer1" style="height: 370px; width: 100%;"></div>
                    </div>
                <!-- TOD -->
                <div class="recent-customers">
                    <div class="card-header"> 
                    </div>  
                    <div id="chartContainer3" style="height: 370px; width: 100%;"></div>
                </div>
                </div>

                <!-- Working Schedules -->
                <div class="details">

                    <div class="recent-orders">
                        <div class="card-header">
                        </div>
                        <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
                    </div>
                <!-- Gender -->
                <div class="recent-customers">
                    <div class="card-header">   
                    </div>  
                    <div id="chartContainer4" style="height: 370px; width: 100%;"></div>
                </div>
                </div>

                <!-- Age Bracket -->
                <div class="details">

                    <div class="recent-orders">
                        <div class="card-header">
                        </div>
                        <div id="chartContainer5" style="height: 370px; width: 100%;"></div>
                    </div>            
                </div>
            </div>
        </div>
    </main>
</body>
<script src="Javascript\main.js"></script>  
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

</html>
