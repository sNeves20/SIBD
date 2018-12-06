<?php
    session_start();
 ?>
<html>
    <h3>Register New Animal</h3>
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

          $owner_VAT = $_SESSION['client_VAT'];
          $animal_name = $_SESSION['animal_name'];

          $sql = "SELECT name2, name1 FROM generalization_species LEFT JOIN species ON generalization_species.name2 = species.name";
          $result = $connection->query($sql);
          if ($result == FALSE)
          {
              $info = $connection->errorInfo();
              echo("<p>Error: {$info[2]}</p>");
              exit();
          }

          echo("<form action = 'insert_animal.php' method = 'post'>
              <p> Owner VAT : <input type = 'number' name = 'owner_VAT' value = $owner_VAT /></p>
              <p> Animal Name : <input type = 'text' name = 'animal_name' value = $animal_name /></p>
              <p> Species :

              <select name='species_name'>");
                foreach ($result as $row) {
                    $species = $row['name2'];
                    $sub_species = $row['name1'];
                    echo ("<option value='$sub_species'>$species - $sub_species</option>");
                }
              echo("</select> </p>
              <p> Colour : <input type = 'text' name = 'colour'/></p>
              <p> Gender :
              <select name='gender'>
                <option value='F'>F</option>
                <option value='M'>M</option>
              </select> </p>
              <p> Birth Year : <input type = 'number' name = 'birth_year'/></p>
              <p> <input type='submit' value='Submit'/></p>
          </form>");
          $connection = null;
      ?>


    </body>
</html>
