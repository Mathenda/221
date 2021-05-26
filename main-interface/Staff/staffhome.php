
<?php 
session_start();
include('../config.php');
?>
<!DOCTYPE html>
<html5>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../heading/stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../navbare/stylesheet.css">
    <head>

    <title>staff homepage</title>
</head>
<body>
<div id="header">
        <?php
            $title = "welcome";
            
        ?>
    </div>
    <h1 style="color: #DEB992 ; font-size: 900%" class="center">Welcome, <?php echo $_SESSION["user"]; ?></h1>
    <nav class="navbar navbar-light bg-light" >
            <form class="navbar">
                <a href="#" class="button">register voter</a>
                <a href="updatedistrict.php" class="button">update districts</a>
                <a href="addparty.php" class="button">capture party information</a>
                <a href="#" class="button">get report</a>
            </form>
        </nav>
    <a href="../geninterface.php" class="fa fa-home fa-2x" style="color: grey;padding: 8px;" id= "home"></a>

<style>
    h1{
        font-family:'library_3_amregular';
        font-weight: normal;
        font-style: normal;
        float: centre;
        color:#ff2a6d;
        text-align: center;
    }
    h2{
        font-family:'library_3_amregular';
        font-weight: normal;
        font-style: normal;
        float: centre;
        color:#1BA098;
        text-align: center;
    }
    body{
    background-color: #051622 ;
    
    }
    #home{  
        float: right;
        text-decoration: none;
        background-color: transparent;
        border: none;
        cursor: pointer;
        position: absolute;
        top: 8%;
        left: 92%;
        transform: translate(-50%,-50%);
        
    }
/*     form { 
        color: white;
        margin: 0px 700px; 
        width:250px;
        text-align: center;
    }

    input[type=text], input[type=password]{
        font-family:'expletus_sansregular';
        font-size: 24px;
        box-sizing: border-box;
        border-radius: 24px;
        height: 50px;
        width: 500px;
        padding: 10px;
        margin: 20px;
    }
    input[type=text]:focus, input[type=password]:focus{
        border: 2px solid #ff2a6d;
        box-shadow: 0 0 15px 4px #ff2a6d;
    }
    input[type=submit]{
        text-decoration: none;
        background-color: #ff2a6d;
        border: none;
        color: white;
        padding: 16px 32px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 20px;
    }
    */
    .navbar{
    position: absolute;
    top: 70%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%);
    background-color: transparent;

  }
  .navbar a{
        font-family:'expletus_sansregular';

      display:block;
      background-color: #1BA098;
      color: white;
      text-align:center;
      font-size:24px;
      border-radius:8px;
      text-decoration: none;
      opacity: 1;
      transition: 0.5s;
      /* cursor: pointer; */
      margin: 4px;
      padding: 20px 90px;
  }
  .navbar a:hover{
    opacity: 0.6;
    color: white;
  }

</style>
	</body>
</html5>