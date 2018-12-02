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

          $owner_VAT = $_REQUEST['client_VAT'];
          $animal_name = $_REQUEST['animal_name'];

          echo("<form action = 'insert_animal.php' method = 'post'>
              <p> Owner VAT : <input type = 'number' name = 'owner_VAT' value = $owner_VAT /></p>
              <p> Animal Name : <input type = 'text' name = 'animal_name' value = $animal_name /></p>
              <p> Species : <input type = 'text' name = 'species_name'/></p>
              <p> Colour : <input type = 'text' name = 'colour'/></p>
              <p> Gender : <input type = 'text' name = 'gender'/></p>
              <p> Birth Year : <input type = 'number' name = 'birth_year'/></p>
              <p> <input type='submit' value='Submit'/></p>
          </form>");
          $connection = null;
      ?>


    </body>
</html>
