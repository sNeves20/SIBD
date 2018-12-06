<?php
    session_start();
 ?>
<html>
    <h3>Create new consult</h3>
    <body>

      <?php
          $host = "db.ist.utl.pt";
          $user = "ist190841";
          $pass = "zzpq7270";
          $dsn = "mysql:host=$host;dbname=$user";
          try
          {
            $connection = new PDO($dsn, $user, $pass);
          }
          catch(PDOException $exception)
          {
            echo("<p>Error: ");
            echo($exception->getMessage());
            echo("</p>");
            exit();
          }

          $client_VAT = $_SESSION['client_VAT'];
          $owner_VAT = $_SESSION['owner_VAT'];
          $animal_name = $_SESSION['animal_name'];

         ;

          $sql = " SELECT veterinary.VAT, person.name FROM person NATURAL JOIN veterinary";
          $result = $connection->query($sql);
          if ($result == FALSE)
          {
              $info = $connection->errorInfo();
              echo("<p>Error: {$info[2]}</p>");
              exit();
          }

          echo("<form action = 'insert_consult.php' method = 'post'>
              <p> Owner VAT : <input type = 'number' name = 'owner_VAT' value = $owner_VAT /></p>
              <p> Client VAT : <input type = 'number' name = 'client_VAT' value = $client_VAT /></p>
              <p> Animal Name : <input type = 'text' name = 'animal_name' value = $animal_name /></p>
              <p> Veterinary :
              <select name='vet_VAT'>");

              foreach ($result as $row) {
                  $vet_VAT = $row['VAT'];
                  $vet_name = $row['name'];
                  echo ("<option value=\"$vet_VAT\">$vet_name - $vet_VAT</option>");
              }
              echo ("</select> </p>
              <p> Animal's weight (Kg) : <input type = 'number' name = 'weight'/></p>
              <h4> SOAPs </h4>
              <p> Subjective : <input type = 'text' name = 'S'/></p>
              <p> Objective : <input type = 'text' name = 'O'/></p>
              <p> Assessment : <input type = 'text' name = 'A'/></p>
              <p> Plan : <input type = 'text' name = 'P'/></p>
              <p>Diagnostic code(s):</p>
              <input type='checkbox' name='code1' value='7211'> 7211 - Fleas<br>
              <input type='checkbox' name='code2' value='7455'> 7455 - Kidney Failure<br>
              <input type='checkbox' name='code3' value='7644'> 7644 - Diabetes<br>
              <input type='checkbox' name='code4' value='7897'> 7897 - Broken Leg<br>
              <input type='checkbox' name='code5' value='7899'> 7899 - Broken Rib<br>
              <p> <input type='submit' value='Submit'/></p>
          </form>");
          $connection = null;
      ?>


    </body>
</html>
