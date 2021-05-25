<?php
session_start();
$title = "login";
$servername = "127.0.0.1";
$userna = "root";
$passwo = "57074";
$db = new mysqli($servername, $userna,$passwo, 'voting_DB');

if(isset($_POST)){
    $username = mysqli_real_escape_string($db, $_POST['pname']);
    $pid =  mysqli_real_escape_string($db, $_POST['pid']);
    $check_u = "SELECT * FROM party WHERE party_name='$username' OR party_id='$pid'";
    $get_u = mysqli_query($db, $check_u);

    if(mysqli_num_rows($get_u) >0){
        $Nerror = "party already exists";
        $username = "error";
        $_SESSION["party"] = "party already exists";
        header('Location: addparty.php');
    }else{
        $_SESSION["party"] = $username;
    }

    $db->close();
}
?>

<!DOCTYPE html>
<html5>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../heading/stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../navbare/stylesheet.css">
    <head>

    <title>party added</title>
</head>
<body>
<div id="header">
        <?php
            $title = "success";
            include "../config.php";
        ?>
    </div>
    <h1 style="color: #DEB992 ; font-size: 900%" class="center"><?php echo $_SESSION["party"]; ?></h1>
    <h1 style="color: #DEB992; font-size: 300%" id="keyy" class="center">successfully added</h1>
    <h2 id= "back" onclick="prev()">&#171;</h2>
    <script type="application/javascript">
        function prev(){
            window.history.back();
        }
    </script>
    <a href="../geninterface.php" class="fa fa-home fa-2x" style="color: grey;padding: 8px;"></a>
<style>
    h1{
        font-family:'expletus_sansregular';
        font-weight: normal;
        font-style: normal;
        float: centre;
        color:#ff2a6d;
        text-align: center;
    }
    h2{
        font-family:'expletus_sansregular';
        font-weight: normal;
        font-style: normal;
        float: centre;
        color:#1BA098;
        text-align: center;
    }
    body{
    background-color: #051622 ;
    
    }
    a{  
        float: right;
        text-decoration: none;
        background-color: transparent;
        border: none;
        cursor: pointer;
        position: absolute;
        top: 48%;
        left: 55%;
        transform: translate(-50%,-50%);
    }
    #back{
        cursor: pointer;
        position: absolute;
        top: 46%;
        left: 45%;
        transform: translate(-50%,-50%);
    }
</style>
	</body>
</html5>