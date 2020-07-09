<?php 

$user = "root";
$pass = "";  
$server = "localhost";
$database = "gta_movile";


$conn = mysqli_connect($server, $user, $pass, $database);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

 function insertMessage ($id,$message,$destinatary)
{
    $code = uniqid();
    $messageEncode = base64_encode($message);
    
    $sql = "INSERT INTO message (id_game, message, code, destinatary) VALUES ('$id', '$messageEncode', '$code','$destinatary')";

    if (mysqli_query($GLOBALS['conn'], $sql)) {
        return $code;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($GLOBALS['conn']);
    }
}

 function verifyUser ($id)
{
    

    $sql = "SELECT * FROM USERS WHERE id_game = '$id'";

    $result = $GLOBALS['conn']->query($sql);

    if ($result->num_rows > 0) {
         return true;
        } else {
         return  false;
        }
}


function returnMesagge ($ID,$code)
{
    
    $sql = "SELECT message FROM message WHERE code = '$code' and destinatary = '$ID'";

    $result = $GLOBALS['conn']->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $messageDecode = base64_decode($row["message"]);
           return  $messageDecode;
          }
        } else {
         return  "No hay ningún mensaje con este código";
        }
}


?>