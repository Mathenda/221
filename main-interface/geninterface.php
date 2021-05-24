<?php session_start(); ?>
<!DOCTYPE html>
<html5>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="heading/stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="navbare/stylesheet.css">
    <head>
    <title><?php echo $title; ?></title>
</head>
<body onload="myFunction()">
    <h1 style="color: #05d9e8 ; font-size: 750%" class="center">Welcome</h1>
    <div id="container">
        <button class="button button1" href="#">Voter login</button>
        <button class="button button2" href="#">Staff login</button>
    </div>

<style>
    h1{
        font-family:'library_3_amregular';
        font-weight: normal;
        font-style: normal;
        float: center;
        color:#ff2a6d;
        text-align: center;
        text-shadow: 8px 0 10px #ff2a6d, -8px 0 10px #2600ff;
    }
    body{
    background-color: #01060f ;
    }

    .button{
        font-size: 24px;
        display: inline-block;
        text-decoration: none;
        background-color: #ff2a6d;
        border: none;
        color: white;
        padding: 24px 40px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 20px;
        float: center;
        text-align: center;
    }
    .button1{
        margin-left: 36%;
    }

    .button2{
        margin-left: 200px;
    }

</style>
	</body>
</html5>