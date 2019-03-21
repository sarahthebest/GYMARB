<html>

<head>


<body>

  <?php

$Namn = $_POST["inputName3"];
$Namn = "'" . $Namn . "'";
echo "Hello," . $Namn;

$Password = $_POST["inputPassword3"];
echo "Password3," . $Password;


if (strlen($Password) == 0) {
   $message = "Lösenord får inte vara tomt";
   echo "<script type='text/javascript'>alert('$message');</script>";
   return;
}


if (strlen($Namn) == 0) {
   $message = "Användarman får inte vara tomt";
   echo "<script type='text/javascript'>alert('$message');</script>";
   return;
}


$servername = "localhost";
$username   = "16saem";
$password   = "Saisavas1";
$dbname     = "16saem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql    = "SELECT Username FROM User where Username = $Namn";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
   echo "Användarnamnet är hittat!";
   
} else {
   $message = "Ogiltig lösenord/användarnamn";
   echo "<script type='text/javascript'>alert('$message');</script>";
   return;
}


$sql    = "SELECT Password FROM User where Username = $Namn";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

   echo "Användarnamnet är hittat!";
   
   while ($row = $result->fetch_assoc()) {
       
      if ($row['Password'] == $Password) {
         session_start();
         $_SESSION['username'] = $Namn;
      } else {
         $message = "Ogiltig lösenord/användarnamn";
         echo "<script type='text/javascript'>alert('$message');</script>";
      }
   }
}

else {
   $message = "Ett fel har uppstått";
   echo "<script type='text/javascript'>alert('$message');</script>";
   return;
}



$conn->close();


?>


</body>

</head>




</html>
