<html>
    <head>
        <style>
            body{
				background: url(https://media.giphy.com/media/vsAycyWFQB0Hu/giphy.gif);
                background-color:black;
                color:white;
                font-weight:bold;
				    background-size: cover;

            }
            table{
                color:black;
                background-color:deepskyblue;
                font-family:algerian;
                border: 15px solid green;
                font-weight: bold;


            }
            .center {
  margin-left: 24%;
  margin-right: auto;
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
	color:red;
    width: 10%;
    font-family:Viner Hand ITC;
}
h3:hover{
    text-align: center;
    background-color: green;
    border: 3px solid gray;
    margin:3% auto;
    width: 10%;
    font-family:Viner Hand ITC;
}
a:hover{
	color:red;
}
            </style>
    <title>Database page</title>
</head>
<body>
<h1>Shortest Park from chennai</h1>
    <table border=3 cellspacing=5 cellpadding=10 class="center">
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Address</td>
            <td>Maps</td>
			<td>KM's</td>
</tr>
<?php
require 'connection.php';
$rows=mysqli_query($conn,"SELECT * FROM tb_data ORDER BY KM");
$i=1;
foreach($rows as $row):
    ?>
    <tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["email"] ?></td>
    <td style="width:450px; height:450px;"><iframe src='https://www.google.com/maps?q=<?php echo $row["latitude"]; ?>,<?php echo $row["longitude"]; ?>&h1=es;z=14&output=embed' style="width:100%;height:100%;"></iframe></td>
	<td><?php echo $row["KM"] ?></td>
</tr>
<?php endforeach; ?>
</table>
<br><br>
<h3><a href="index.php">Home Page</a></h3>
</body>
</html>