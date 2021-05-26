<?php
$sql="SELECT* FROM voter WHERE ID=$id AND voter_password='$password'";
$result=mysqli_query($connection,$sql);
$query="SELECT* FROM localdistrict WHERE district_ID='".$checking["local_district_ID"]."';";
$results=mysqli_query($connection,$query);
if($checking=mysqli_fetch_assoc($results)){
    header("Location:ballot.html");
}
else{
    header("Location:ballot2.html")
}

?>