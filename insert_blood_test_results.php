<!DOCTYPE html>
<?php
    session_start();
 ?>
<html lang="en" dir="ltr">
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

            echo ($owner_VAT = $_SESSION['owner_VAT']);
            echo ($animal_name = $_SESSION['animal_name']);
            $consult_date = $_REQUEST['consult_date'];
            echo ($consult_date = str_replace("*"," ", $consult_date));

            $assistant_VAT = $_REQUEST['assistant_VAT'];
            $description = $_REQUEST['description'];
            $Cholesterol = $_REQUEST['Cholesterol'];
            $Creatinine = $_REQUEST['Creatinine'];
            $RBC = $_REQUEST['RBC'];
            $WBC = $_REQUEST['WBC'];

            $procedure_num = 2; //Number associated to blood test procedure
            $type = 'B'; //Type associated to blood test procedure --> B=blood_test


            //Begin Transaction
            $connection->beginTransaction();

            //Inserts into procedure_
            $sql = "INSERT INTO procedure_ VALUES('$animal_name', '$owner_VAT', '$consult_date', '$procedure_num', '$description')";

            $result = $connection->exec($sql);
            if ($result == FALSE)
            {
                $info = $connection->errorInfo();
                echo("<p>Error: {$info[2]}</p>");
                exit();
            }

            //Inserts into performed
            $sql2 = "INSERT INTO performed VALUES('$animal_name', '$owner_VAT', '$consult_date', '$procedure_num', '$assistant_VAT')";

            $result = $connection->exec($sql2);
            if ($result == FALSE)
            {
                $info = $connection->errorInfo();
                echo("<p>Error: {$info[2]}</p>");
                exit();
            }

            //Inserts into test_procedure
            $sql3 = "INSERT INTO test_procedure VALUES('$animal_name', '$owner_VAT', '$consult_date', '$procedure_num', '$type')";

            $result = $connection->exec($sql3);
            if ($result == FALSE)
            {
                $info = $connection->errorInfo();
                echo("<p>Error: {$info[2]}</p>");
                exit();
            }

            //Inserts information into table produced_indicator (the number of insertions depends on the number of indicators)
            if(!empty($Cholesterol)){
              $indicator_name = 'Cholesterol';

              $sql_code4 = "INSERT INTO produced_indicator VALUES('$animal_name', '$owner_VAT', '$consult_date', '$procedure_num', '$indicator_name', '$Cholesterol')";

              $result = $connection->exec($sql_code4);
              if ($result == FALSE)
              {
                  $info = $connection->errorInfo();
                  echo("<p>Error: {$info[2]}</p>");
                  exit();
              }
            }

            if(!empty($Creatinine)){
              $indicator_name = 'Creatinine Level';

              $sql_code5 = "INSERT INTO produced_indicator VALUES('$animal_name', '$owner_VAT', '$consult_date', '$procedure_num', '$indicator_name', '$Creatinine')";

              $result = $connection->exec($sql_code5);
              if ($result == FALSE)
              {
                  $info = $connection->errorInfo();
                  echo("<p>Error: {$info[2]}</p>");
                  exit();
              }
            }

            if(!empty($RBC)){
              $indicator_name = 'Red Blood Cells';

              $sql_code6 = "INSERT INTO produced_indicator VALUES('$animal_name', '$owner_VAT', '$consult_date', '$procedure_num', '$indicator_name', '$RBC')";

              $result = $connection->exec($sql_code6);
              if ($result == FALSE)
              {
                  $info = $connection->errorInfo();
                  echo("<p>Error: {$info[2]}</p>");
                  exit();
              }
            }

            if(!empty($WBC)){
              $indicator_name = 'White Blood Cells';

              $sql_code7 = "INSERT INTO produced_indicator VALUES('$animal_name', '$owner_VAT', '$consult_date', '$procedure_num', '$indicator_name', '$WBC')";

              $result = $connection->exec($sql_code7);
              if ($result == FALSE)
              {
                  $info = $connection->errorInfo();
                  echo("<p>Error: {$info[2]}</p>");
                  exit();
              }
            }

            $connection->commit();
            echo("<p>Blood test procedure information inserted successfully in the consult!</p>");

            echo("<form action='Searchforclient.php' method='post'>
              <p> <input type='submit' value='Seach for new client'> </p>
            </form>");


            $connection = null;
        ?>

    </body>
</html>
