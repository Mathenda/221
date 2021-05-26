<?php
    session_start();
    $title = "login";
    $servername = "127.0.0.1";
    $userna = "root";
    $passwo = "57074";
    $db = new mysqli($servername, $userna,$passwo, 'voting_DB');
    $check_u = "SELECT * from province";
    $mya = array();
    if($get_u = mysqli_query($db, $check_u)){
      while($row = $get_u->fetch_array(MYSQLI_ASSOC)){
        $mya[] = $row['province_name'];
      }
    }
     for($i = 0; $i < 9; $i++){
        $temp = json_encode($mya[$i]);
        $check_u = "SELECT district_name, district_vote from district WHERE province_name=$temp";
        $mya1 = array();
        $mya[$i] = array();
        if($get_u = mysqli_query($db, $check_u)){
            while($row = mysqli_fetch_row($get_u)){
              $rows[] = $row;
            }
        }
        $mya[$i] = array($rows);
        unset($rows);
    }
    $db->close();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../heading/stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../navbare/stylesheet.css">
<!-- <script>
   var tyem = <?php echo json_encode($mya); ?>;
   console.log(tyem);
</script> -->
<script>
    var tyem = <?php echo json_encode($mya); ?>;
    
var subjectObject = {
  "Eastern Cape": {
    "Alfred Nzo": [tyem[0], "Images", "Tables", "Lists"],
    "Sarah Baartman": ["1", "Margins", "Backgrounds", "Float"],
    "Amathole": ["1", "Margins", "Backgrounds", "Float"],
    "Chris Hani": ["0", "Margins", "Backgrounds", "Float"],
    "Joe Gqabi": ["1", "Margins", "Backgrounds", "Float"],
    "O.R.Tambo": ["0", "Margins", "Backgrounds", "Float"],
    "Buffalo City": ["1", "Margins", "Backgrounds", "Float"],
    "Nelson Mandela Bay": ["Variables", "Operators", "Functions", "Conditions"]    
  },
  "Free state": {
    "Xhariep": ["Variables", "Strings", "Arrays"],
    "Lejweleputswa": ["Variables", "Strings", "Arrays"],
    "Thabo Mofutsanyane": ["Variables", "Strings", "Arrays"],
    "Fezile Dabi": ["Variables", "Strings", "Arrays"],
    "Lejweleputswa": ["SELECT", "UPDATE", "DELETE"]
  }
}
console.log(subjectObject)
window.onload = function() {
  var subjectSel = document.getElementById("province");
  var topicSel = document.getElementById("district");
  var chapterSel = document.getElementById("change");
  for (var x in tyem) {
    var u;
    switch (x){
      case "0":
        u = "Eastern Cape";
        break;
      case "1":
        u = "Free State";
        break;
      case "2":
        u = "Gauteng";
        break;
      case "3":
        u = "KwaZulu-Natal";
        break;
      case "4":
        u = "Limpopo";
        break;
      case "5":
        u = "Mpumalanga";
        break;
      case "6":
        u = "North-West";
        break;
      case "7":
        u = "Northern Cape";
        break;
      case "8":
        u = "Western Cape";
        break;
    }
    subjectSel.options[subjectSel.options.length] = new Option(u, x);
  }
  subjectSel.onchange = function() {
    //empty Chapters- and Topics- dropdowns
    chapterSel.length = 1;
    topicSel.length = 1;
    //display correct values
      for (var y in tyem[this.value][0]) {
        var k = tyem[this.value][0][y];
      topicSel.options[topicSel.options.length] = new Option(k, y);
    }
  }
  topicSel.onchange = function() {
    //empty Chapters dropdown
    chapterSel.length = 1;
    //display correct values
    var z = tyem[subjectSel.value][0][this.value][1];
    var d = [0,1];
    for (var i = 0; i < 2; i++) {
      chapterSel.options[chapterSel.options.length] = new Option(d[i], d[i]);
    }
  }
}
</script>
</head>   
<body>

<h1 style="color: #DEB992 ; font-size: 750%" class="center">adjust districts</h1>

<form id="form" action="tesubmit.php" method= "post">
<select class="f" name="province" id="province">
    <option value="" selected="selected">Select province</option>
  </select>
  <br><br>
<select class="f" name="district" id="district">
    <option value="" selected="selected">Select district</option>
  </select>
  <br><br>
<select class="f" name="change" id="change">
    <option value="" selected="selected">Change district to</option>
  </select>
  <br><br>
  <input type="submit" value="Submit">  
</form>
<h2 id= "back" onclick="prev()">&#171;</h2>
    <script type="application/javascript">
        function prev(){
            window.history.back();
        }
    </script>
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

    #form { 
        padding-top: 100px;
        color: black;
        margin: 0px 700px; 
        width:250px;
        text-align: center;
        position: relative;
        top: 60%;
        left: 13%;
        transform: translate(-50%,-50%);
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
    .f{
      font-family:'expletus_sansregular';
      width: 400px;
      font-size: 24px;
      margin-top: 20px;
      border-radius: 24px;
      background-color: #e9e9e9;
    }
    .f:focus{
      border: 2px solid #1BA098;
        box-shadow: 0 0 15px 4px #1BA098;
        outline: none;
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
        top: 46.7%;
        left: 62.5%;
        transform: translate(-50%,-50%);
        border: none;
    }

    #eye{
        position: absolute;
        top: 51.5%;
        left: 62.5%;
        transform: translate(-50%,-50%);
        color: black;

    }
</style>
</body>
</html>