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

          $client_VAT = $_REQUEST['client_VAT'];
          $owner_VAT = $_REQUEST['owner_VAT'];
          $animal_name = $_REQUEST['animal_name'];

          echo "<p> $animal_name </p>";
          //ARRANJAR FORMA DE ADICIONAR MAIS DO QUE UM DIAGNOSTICO, SEM POR DIRETAMENTE N INPUTS

          echo("<form action = 'insert_consult.php' method = 'post'>
              <p> Owner VAT : <input type = 'number' name = 'owner_VAT' value = $owner_VAT /></p>
              <p> Client VAT : <input type = 'number' name = 'client_VAT' value = $client_VAT /></p>
              <p> Animal Name : <input type = 'text' name = 'animal_name' value = $animal_name /></p>
              <p> Veterinary VAT : <input type = 'number' name = 'vet_VAT'/></p>
              <p> Animal's weight : <input type = 'number' name = 'weight'/></p>
              <h4> SOAPs </h4>
              <p> S : <input type = 'text' name = 'S'/></p>
              <p> O : <input type = 'text' name = 'O'/></p>
              <p> A : <input type = 'text' name = 'A'/></p>
              <p> P : <input type = 'text' name = 'P'/></p>
              <p> Diagnostic codes : <input type = 'number' name = 'diagnostic_code'/></p>
              <p> <input type='submit' value='Submit'/></p>
          </form>");
          $connection = null;
      ?>


    </body>
</html>
