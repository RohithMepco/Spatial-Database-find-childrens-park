<?php
require 'connection.php';

if(isset($_POST["submit"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $latitude=$_POST["latitude"];
    $longitude=$_POST["longitude"];
	
		$lat2=floatval($latitude);
		$lon2=floatval($longitude);
		$lat1=13.067439;
		$lon1=80.237617;
		$r = 6371;
		$p = 0.017453292519943295 ;
		$a = 0.5 - (cos(($lat2-$lat1)*$p)/2 )+ (cos($lat1*$p)*cos($lat2*$p)) * ((1-cos(($lon2-$lon1)*$p)) / 2);
		$d = (2 * $r *asin(sqrt($a)))+3;
		
    $query="INSERT INTO tb_data VALUES('','$name','$email','$latitude','$longitude','$d')";
    mysqli_query($conn,$query);
    echo "
    <script>
    alert('Data added successfully');
    document.location.href='data.php';
    </script>
    "
    ;
}
?>
<html>
    <head>
        <title>Insert Data with geolocation data</title>
</head>
<style>body{
    background: url(source.gif);

    /* background-repeat: no-repeat; */
    background-size: cover;
    
}
h1{
    text-align: center;
    color: red;
    border: 3px solid gray;
    margin:3% auto;
    width: 45%;
    background-color: white;
    border-radius: 50%/100% 100% 0 0;
    font-family:Viner Hand ITC;
}
h3{
    text-align: center;
    background-color: pink;
    border: 3px solid gray;
    margin:3% auto;
    width: 9%;
    font-family:Viner Hand ITC;
}
small{
    visibility: hidden;
}
.smallchange1{
    visibility: visible;
    color:rgb(255, 251, 2);
    font-family:Microsoft Uighur;
    font-size:28px;

}
.smallchange2{
    visibility: visible;
    color:red;
    font-family:Algerian;

}
form div{
    margin: auto;
    text-align: right;
    border: 3px solid greenyellow;
    background-color: gray;
    width: 40%;
    padding:20px;
    opacity: 0.85;
    color:rgb(25, 0, 166);
    font-weight: bold;
    font-size: 25px;
    font-family: Segoe Script;
    box-shadow: 4px 4px 2px 2px black;

}
input{
    background-color: white;
    color: black;
    padding: 10px;
    font-size: 25px;
    width: 45%;
    margin-left:2px 50px;
}
p{
    margin-left: 37%;
}
a:hover{
	color:red;
	background-color:green;
}

  button{
    /* text-align: center; */
    /* border: 0px thin greenyellow; */
    background-color: white;
    width: 20%;
    opacity: 0.85;
    color:black;
    font-weight: bold;
    font-size: 25px;
    font-family: Segoe Script; 
    border-radius: 40px;
    height: 80px;
    cursor: pointer;   
}
button:hover{
    /* text-align: center; */
    /* border: 0px thin greenyellow; */
    background-color: blue;
    width: 20%;
    opacity: 0.85;
    color:red;
    font-weight: bold;
    font-size: 25px;
    font-family: Segoe Script; 
    border-radius: 40px;
    height: 80px;
    cursor: pointer;   
}</style>
<body>
<h3><a href="http://127.0.0.1:5500/two-column.html">Home Page</a></h3>
    <form class="myForm" action="" method="post" autocomplete="off">
        <h1>Insert Park</h1>
		
        <div><label for="">Parkname </label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <input type="text" name="name" required value="" size="30" /></div>
        <div><label for="">Address </label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <input type="text" name="email" required value=""></div>
        <div><label for="">Latitude </label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <input type="text" name="latitude" ></div>
        <div><label for="">Longitude </label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <input type="text" name="longitude" ></div>
   <p> <button type="submit" name="submit">Submit</button>&emsp;&emsp;
   <button type="reset" name="reset">Clear</button></p>

</form>
<script type="text/javascript">
   function getLocation(){
    if(navigator.getLocation){
        navigator.geolocation.getCurrentPosition(showPosition,showError);
    }
    
   } 
   function showPosition(position){
    document.querySelector('.myForm input[name="latitude"]').value=position.chords.latitude;
    document.querySelector('.myForm input[name="longitude"]').value=position.chords.longitude;
   }
    function showError(error){
        switch(error.code){
            case error.PERMISSION_DENIED:
                alert("You must allow the request for geolocatio tofill out the form");
                location.reload();
               break;
            }
    }
	function calcDistance(){
		a1=document.getElementByName("latitude").value;
		b1=document.getElementByName("longitude").value;
		lat1=parseFloat(a1);
		lon1=parseFloat(b1);
		lat2=13.067439;
		lon2=80.237617;
		r = 6371;
		p = 0.017453292519943295 ;
		a = 0.5 - cos((lat2-lat1)*p)/2 + cos(lat1*p)*cos(lat2*p) * (1-cos((lon2-lon1)*p)) / 2

		d = 2 * r * Math.asin(Math.sqrt(a));
	}
   
</script>
<br>
<div><h3><a href="data.php">Database Page</a></h3></div>
</body>
</html>
