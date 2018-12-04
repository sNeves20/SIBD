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

          $owner_VAT = $_REQUEST['owner_VAT'];
          $animal_name = $_REQUEST['animal_name'];
          $consult_date = $_REQUEST['consult_date'];

          echo("<form action = 'insert_blood_test_results.php' method = 'post'>
              <p> <input type='hidden' name='owner_VAT' value= " . $owner_VAT . "> </p>
              <p> <input type='hidden' name='animal_name' value=" . $animal_name . "> </p>
              <p> <input type='hidden' name='consult_date' value=" . $consult_date . "> </p>
              <p> Assistant VAT : <input type = 'number' name = 'assistant_VAT'/></p>
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
