<html>

<head>


<body>

    <?php
        
        
        $Namn = $_POST["inputName"];
        $Namn = "'" . $Namn . "'";
        echo "Hello," . $Namn;
        
        $Password1 = $_POST["inputPassword1"];
        echo "Password1," . $Password1;
    
        $Mail = $_POST["inputEmail3"];
        $Mail = "'" . $Mail . "'";
        echo "Mail is:" . $Mail;    
    
        $Password2 = $_POST["inputPassword2"];
        echo "Password2," . $Password2;
    
        if(isset($_POST['rememberMe']) &&
           $_POST['rememberMe'] == 'Yes')
        {    
            $rememberMe = 1;
        }
        else
        {    
            $rememberMe = 0;
        }
        echo "rememberMe," . $rememberMe;
        if ($Password1 != $Password2) 
        {
            echo "Lösonorden är inte lika! Skriv om!";
            return;     
        }
    
        if (strlen($Password1) == 0 ) 
        {
            echo "Lösenordet får inte vara tomt!";
            return;     
        }
    
      if (strlen($Mail) == 0 ) 
        {
            echo "Ogiltigt mejladress!";
            return;     
        }
    
      if (strlen($Namn) == 0 ) 
        {
            echo "Användarnamnet får inte vara tomt!";
            return;     
        }
    
    
    $servername = "localhost";
$username = "16saem";
$password = "Saisavas1";
$dbname = "16saem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Username FROM User where Username = $Namn";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    echo "Användarnamnet är taget!";
            return;  
} else {
    echo "0 results";    
}
        
    $Password = "'" . $Password1 . "'";
    
    $sql = "INSERT INTO User (Email, Username, Password, RememberMe)
VALUES ($Mail, $Namn, $Password, $rememberMe)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
    
    
        ?>


</body>

</head>




</html>
