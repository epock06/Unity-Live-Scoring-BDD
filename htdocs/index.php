<meta http-equiv="refresh" content="3" />
<style type="text/css">
div {
    width: 407px;
    height: 878px;
    margin: auto;
    border: 3px solid #ff9600;
    overflow: hidden;
}
.bgimg {
    background-image: url('fond.jpg');
}

</style>
<html>
<body bgcolor="#000000">
<font color ="#ffffff">
<?php
	
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Forza";

$playerName = $_POST["playerName"]; 
$playerScore = $_POST["score"];

$rank = 0;

//$playerName = 'Sonicc'; 
//$playerScore = '1:04';


//echo "name = ".$playerName;
//echo "</br>";
//echo "score = ".$playerScore;
//echo "</br>";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




//$sql = "INSERT INTO player (Name, Time)
//VALUES ('John', '1:22')";



if ($playerName <> "") {
	
	$sql = "INSERT INTO score (name, chrono)
	VALUES ('$playerName', '$playerScore')";



	if ($conn->query($sql) === TRUE) {
    	echo "New record created successfully";
	} else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}else{
	//echo("error value is null");
}
 
$sql = "SELECT  name, chrono FROM score ORDER BY chrono ASC ";
	$result = mysqli_query($conn ,$sql);
	echo("<div width:50px align='center' class='bgimg'>");
echo ("<h1>Game Scoring</h1>");
echo ("<h2>Live Scoring Player</h2>");
echo("<table border=0.5>");
	if(mysqli_num_rows($result) > 0){
		//show data for each row
		while($row = mysqli_fetch_assoc($result)){
			$rank++;
			echo("<tr align='center'>");
			echo("<td>");
			echo("<font size=5 color ='#ffffff'>");

			echo $rank." »»»";

			echo("</td>");
			echo("<td>");
			echo("<font size=5 color ='#ffffff'>");

			echo $row['name']." -- ";

			echo("</td>");
			echo("<td>");
			echo("<font size=5 color ='#ffffff'>");

			echo$row['chrono'];

			echo("</td>");
			echo("</tr>");
		}
	}
echo("</font>");
echo("</table>");
echo ("</div>");
$conn->close();
?>
</body>
</html>