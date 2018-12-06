<?php
    session_start();
 ?>
<html>
    <h3>Blood Test Results</h3>
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

          $owner_VAT = $_SESSION['owner_VAT'];
          $animal_name = $_SESSION['animal_name'];
          $consult_date = $_GET['consult_date'];
          $consult_date = str_replace(" ","*", $consult_date);

          $sql = " SELECT assistant.VAT, person.name FROM person NATURAL JOIN assistant";
          $result = $connection->query($sql);
          if ($result == FALSE)
          {
              $info = $connection->errorInfo();
              echo("<p>Error: {$info[2]}</p>");
              exit();
          }

          echo("<form action = 'insert_blood_test_results.php' method = 'get'>
              <p> <input type='hidden' name='consult_date' value=" . $consult_date . "> </p>
              <p> Assistant :
              <select name='assistant_VAT'>");

              foreach ($result as $row) {
                  $assistant_VAT = $row['VAT'];
                  $assistant_name = $row['name'];
                  echo ("<option value=\"$assistant_VAT\">$assistant_name - $assistant_VAT</option>");
              }
              echo ("</select> </p>
              <p> Procedure description: <input type = 'text' name = 'description'/></p>
              <h4> Indicators (obtained values) </h4>
              <p> Cholesterol (mg): <input type = 'number' name = 'Cholesterol'/></p>
              <p> Creatinine (mg/L) : <input type = 'number' name = 'Creatinine'/></p>
              <p> Red blood cells (mg) : <input type = 'number' name = 'RBC'/></p>
              <p> White blood cells (mg) : <input type = 'number' name = 'WBC'/></p>
              <p> <input type='submit' value='Submit'/></p>
          </form>");

          $connection = null;
      ?>


    </body>
</html>
