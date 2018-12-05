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

          $owner_VAT = $_GET['owner_VAT'];
          $animal_name = $_GET['animal_name'];
          $consult_date = $_GET['consult_date'];
          $consult_date = str_replace(" ","*", $consult_date);


          echo("<form action = 'insert_blood_test_results.php' method = 'get'>
              <p> <input type='hidden' name='owner_VAT' value= " . $owner_VAT . "> </p>
              <p> <input type='hidden' name='animal_name' value=" . $animal_name . "> </p>
              <p> <input type='hidden' name='consult_date' value=" . $consult_date . "> </p>
              <p> Assistant :
              <select name='assistant_VAT'>
                <option value='243379726'>Callum Marshall - 243379726</option>
                <option value='307700243'>Evan Francis - 307700243</option>
                <option value='693543473'>Petra Louis - 693543473</option>
                <option value='695743999'>Ruslaud Yoi - 695743999</option>
              </select> </p>
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
