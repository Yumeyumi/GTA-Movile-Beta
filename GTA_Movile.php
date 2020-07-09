<?php include 'BBDD.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="GTA_Movile.css">

<nav class="navbar fixed-top navbar-dark bg-primary">
  <a class="navbar-brand" href="#!"></br></a>
</nav>
<dic class="container">
<div  class="row">
  <div class="col-sm-12 offset-lg-2 col-lg-4 ">
  <div class="card">
  <div class="card-body  text-center">
    <p class="card-text">
        <form id="form" action="GTA_Movile.php" method="post">
        </br>
        <p>ID:<br> <input id="id" type="text" name="ID" /></p>
        <p>Destinatary: <br><input id="id" type="text" name="destinatary" /></p>
        <p></br><textarea id="text" name="message">Escribe tu mensaje....</textarea></p>
        <input type="submit" href="#!" name="submit" class="btn btn-primary" id= "btn" value="Encrypt">
        <?php 
        if(isset($_POST["submit"]) and isset($_POST['message'])  and isset($_POST['destinatary']) and isset($_POST['ID'])) { 

         $message = $_POST['message'];
         $destinatary = $_POST['destinatary'];
         $ID = $_POST['ID'];

         if ($ID==null or $message == null or $destinatary == null) {
          $resultEncrypt= "Debes rellenar correctamente los campos";
          echo "<p class = 'result'>{$resultEncrypt}</p>";

         } else {

          if( verifyUser($ID) == true ){
            $code = insertMessage($ID,$message,$destinatary);

            $resultDecrypt = "Eres un usuario";
            echo "<p class = 'result' >{$code}</p>";


          } else {
           $resultDecrypt = "No estás registrado como usuario tienes prohibida la entrada";
           echo "</br><p class = 'result' >{$resultDecrypt}</p></br>";
          }

         }

        }

        ?>
        </form>
   
    </p>
    
  </div>
</div>
  </div>
  <div class="col-sm-12 col-lg-4 ">
  <div class="card">
  <div class="card-body justify-content-center text-center">
    <p class="card-text">
    <form id="form" action="GTA_Movile.php" method="post">
        </br>
        <p>ID: <br> <input id="id" type="text" name="IDd" /></p>
        <p>CODE: <br> <input id="id" type="text" name="code" /></p>
        
        <input type="submit" href="#!" name="submitD" class="btn btn-primary" id= "btn" value="Decrypt">
        <?php 
        $resultDecrypt = "";
        if(isset($_POST["submitD"])) { 

         $code = $_POST['code'];
         $IDd = $_POST['IDd'];
         if ($IDd == null or $code == null) {
          $resultDecrypt= "Debes rellenar correctamente los campos";
          echo "<p class = 'result'>{$resultDecrypt}</p>";

         } else {

          if( verifyUser($IDd) == true ){
            $message = returnMesagge($IDd,$code);
            echo "<p class = 'result'>{$message}</p>";


          } else {
           $resultDecrypt = "No estás registrado como usuario tienes prohibida la entrada";
           
           echo "</br><p class = 'result'>{$resultDecrypt}</p></br>";
          }

         }

        }

        ?>
        </form>
        
    </p>
    
  </div>
</div>
  </div>


</div> 
</div>

<nav class="navbar fixed-bottom navbar-dark bg-primary">
  <a class="navbar-brand" href="#!"></br></a>
</nav>


  </body>
</html>