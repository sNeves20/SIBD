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


          echo("<form action = 'register_new_animal.php' method = 'post'>
              <p> Owner VAT : <input type = 'number' name = 'owner_VAT'/></p>
              <p> Animal Name : <input type = 'text' name = 'animal_name'/></p>
              <p> Species : <input type = 'text' name = 'species_name'/></p>
              <p> Colour : <input type = 'text' name = 'colour'/></p>
              <p> Gender : <input type = 'text' name = 'gender'/></p>
              <p> Birth Year : <input type = 'number' name = 'birth_year'/></p>
              <p> <input type='submit' value='Submit'/></p>
          </form>");

          //Requesting access to variables obtained in the form
          $owner_VAT = $_REQUEST['owner_VAT'];
          $animal_name = $_REQUEST['animal_name'];
          $species_name = $_REQUEST['species_name'];
          $colour = $_REQUEST['colour'];
          $gender = $_REQUEST['gender'];
          $birth_year = $_REQUEST['birth_year'];

          //Issuing MySQL command
          $sql = "INSERT INTO animal(name, VAT, species_name, colour, gender, birth_year) VALUES(".$animal_name.",".$owner_VAT.",'Pug', 'Black' , 'F', 2010)";

          //$sql = "INSERT INTO animal(name, VAT, species_name, colour, gender, birth_year) VALUES($animal_name, $owner_VAT, $species_name, $colour, $gender, $birth_year)";
          //$sql = "INSERT INTO animal(name, VAT, species_name, colour, gender, birth_year) VALUES('Newt', 184530918, 'Pug', 'Black' , 'F', 2010)";

          $result = $connection->query($sql);
          if ($result == FALSE)
          {
              $info = $connection->errorInfo();
              echo("<p>Error: {$info[2]}</p>");
              exit();
          }
/*
          echo("<form action = 'create_new_consult.php' method = 'post'>
              <p> <input type='submit' value='Submit'/></p>
          </form>");
*/
      ?>


    </body>
</html>
