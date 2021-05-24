<?php
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
    <title>login</title>
</head>
<body onload="myFunction()">
    <h1 style="color: #DEB992 ; font-size: 750%" class="center">Login</h1>
    <form action="validatestafflogin.php" method="post" onkeypress="return event.keyCode != 13 && event.keyCode != 32;">
    <input type="text" id="fname" name="fname" placeholder="Name" required autocomplete="off" value="<?php echo $_SESSION["user"] ?>"><br><br>
    <?php if(isset($Nerror)): ?>
    <span><?php echo $Nerror; ?></span>
    <?php endif ?>    
    <input type="text" id="pass" name="pass" placeholder="Password" required autocomplete="off" onkeyup="Validatepassword(pass)><h3 class="button" style="font-size:24px" onclick="myFunction()"><i class="fa fa-eye" id="eye"></i></h3><br><br>
    <script type="application/javascript">
        function myFunction() {
            var x = document.getElementById("pass");
            setTimeout(function(){x.type = "password";},2000);
            x.type = "text";
        }
    </script>
    <input type="submit" value="submit" id="sub"  onmouseover="check()">
    <script type="application/javascript">
        function check()
        {  
           if(Validatepassword(pass) == false){
                alert("password invalid");
                pass.focus();
            }
            if(fname.value.match("name") || fname.value.match("Name")){
                alert("please enter valid name");
                fname.focus();
            }
        }
    </script>
    </form>
    <h2 id= "back" onclick="prev()">&#171;</h2>
    <script type="application/javascript">
        function prev(){
            window.history.back();
        }
    </script>
    <script type="application/javascript">
        function Validatepassword(pass){   
            var val=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,25}$/;
            if(pass.value.match(val)) { return true;
            }else{ return false;}
        }
    </script>
    <a class= "hom" href="../geninterface.php">&#928;</a>
    <a href="../geninterface.php" class="fa fa-home fa-2x" style="color: grey;padding: 8px;"></a>
<style>
    h1{
        font-family:'library_3_amregular';
        font-weight: normal;
        font-style: normal;
        float: centre;
        color:#ff2a6d;
        text-align: center;
    }
    body{
    background-color: #051622 ;
    
    }
    h2{
        font-family:'library_3_amregular';
        font-weight: normal;
        font-style: normal;
        font-size: 40px;
        float: left;
        color:#1BA098;
        text-align: center;
        cursor: pointer;
        position: absolute;
        top: 5%;
        left: 5%;
        transform: translate(-50%,-50%);
    }

    form { 
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
        border: 2px solid #1BA098;
        box-shadow: 0 0 15px 4px #1BA098;
        outline: none;
    }
    input[type=submit]{
        text-decoration: none;
        background-color: #1BA098;
        border: none;
        color: white;
        padding: 16px 32px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 20px;
    }
    a{  
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
    .button{
        background-color: transparent;
        cursor: pointer;
        position: absolute;
        color: black;
        top: 42.7%;
        left: 62.5%;
        transform: translate(-50%,-50%);
        border: none;
    }

    #eye{
        position: absolute;
        top: 49.5%;
        left: 62.5%;
        transform: translate(-50%,-50%);
        color: black;

    }
</style>
	</body>
</html5>