<html lang="en">
<head>
    <title>Call Div from PHP</title>
    <!-- <link rel="stylesheet" href="viewimg.css"> -->
    <style>
        *{
            font-family:'Poppins', sans-serif;
            padding:0;
            margin:0;
        }
        .view{
             width:100%;
             display:flex;
             position:absolute;
             align-items: center;
             justify-content:center;
        }
        .view img{
             padding:2rem; 
             display:relative;
             align-items: center;

        }
        .title{
            background: #1282a2;
            display:flex;
            text-align:center;
            margin:0px;
            width:100%;
            color:white;
            padding:1rem;
            
        }
        .title .close{
            font-weight:800;
            position:absolute;
            display:flex;
            top:15px;
            right:15px;
            font-size:2rem;
            color:white;
        }
         .title img{
         width:30px;
         margin-right:0.6rem;
         margin-top:0.6rem;
        }
        .title h3{
         font-size:1.5rem;
         width:30px;
         margin-right:0.6rem;
         margin-top:0.6rem;
        }
       
    </style>
</head>
<body>
    <div class="title">
    <img src="Images\TBDlogo.png" alt="Logo" class="img">
    <h3>Trabahadoor</h3>
    <a href="employer_page.php"><span class="close">&times;</span></a>
    </div>
<?php
  
  include 'config.php';


  $file = $_GET['Resume'];


  if (file_exists($file)) {
    echo '<div class="view">
        
        <img src="'.$file.'">
    </div>';    
}
?>

</body>
</html>

