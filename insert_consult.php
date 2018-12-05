<!DOCTYPE html>
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

            $owner_VAT = $_REQUEST['owner_VAT'];
            $client_VAT = $_REQUEST['client_VAT'];
            $animal_name = $_REQUEST['animal_name'];
            $vet_VAT = $_REQUEST['vet_VAT'];
            $weight = $_REQUEST['weight'];
            $S = $_REQUEST['S'];
            $O = $_REQUEST['O'];
            $A = $_REQUEST['A'];
            $P = $_REQUEST['P'];

            $date_time = date('Y-m-d H:i:s');

            //Inserts information into table consult
            $sql_consult = "INSERT INTO consult VALUES('$animal_name','$owner_VAT', '$date_time', '$S' , '$O', '$A' , '$P', '$client_VAT', '$vet_VAT', '$weight')";

            $result = $connection->query($sql_consult);
            if ($result == FALSE)
            {
                $info = $connection->errorInfo();
                echo("<p>Error: {$info[2]}</p>");
                exit();
            }


            //Inserts information into table consult_diagnosis (the number of insertions depends on the number of diagnostic codes)
            if(!empty($_REQUEST['code1'])){
              $diagnostic_code1 = $_REQUEST['code1'];

              $sql_code1 = "INSERT INTO consult_diagnosis VALUES('$diagnostic_code1','$animal_name','$owner_VAT', '$date_time')";

              $result = $connection->query($sql_code1);
              if ($result == FALSE)
              {
                  $info = $connection->errorInfo();
                  echo("<p>Error: {$info[2]}</p>");
                  exit();
              }
            }

            if(!empty($_REQUEST['code2'])){
              $diagnostic_code2 = $_REQUEST['code2'];

              $sql_code2 = "INSERT INTO consult_diagnosis VALUES('$diagnostic_code2','$animal_name','$owner_VAT', '$date_time')";

              $result = $connection->query($sql_code2);
              if ($result == FALSE)
              {
                  $info = $connection->errorInfo();
                  echo("<p>Error: {$info[2]}</p>");
                  exit();
              }
            }

            if(!empty($_REQUEST['code3'])){
              $diagnostic_code3 = $_REQUEST['code3'];

              $sql_code3 = "INSERT INTO consult_diagnosis VALUES('$diagnostic_code3','$animal_name','$owner_VAT', '$date_time')";

              $result = $connection->query($sql_code3);
              if ($result == FALSE)
              {
                  $info = $connection->errorInfo();
                  echo("<p>Error: {$info[2]}</p>");
                  exit();
              }
            }

            if(!empty($_REQUEST['code4'])){
              $diagnostic_code4 = $_REQUEST['code4'];

              $sql_code4 = "INSERT INTO consult_diagnosis VALUES('$diagnostic_code4','$animal_name','$owner_VAT', '$date_time')";

              $result = $connection->query($sql_code4);
              if ($result == FALSE)
              {
                  $info = $connection->errorInfo();
                  echo("<p>Error: {$info[2]}</p>");
                  exit();
              }
            }

            if(!empty($_REQUEST['code5'])){
              $diagnostic_code5 = $_REQUEST['code5'];

              $sql_code5 = "INSERT INTO consult_diagnosis VALUES('$diagnostic_code5','$animal_name','$owner_VAT', '$date_time')";

              $result = $connection->query($sql_code5);
              if ($result == FALSE)
              {
                  $info = $connection->errorInfo();
                  echo("<p>Error: {$info[2]}</p>");
                  exit();
              }
            }

            echo("<p>New consult created successfully!</p>");
            
            echo("<form action='list_of_consults.php' method='GET'>
              <p> <input type='hidden' name='owner_VAT' value= " . $owner_VAT . "> </p>
              <p> <input type='hidden' name='client_VAT' value= " . $owner_VAT . "> </p>
              <p> <input type='hidden' name='animal_name' value=" . $animal_name . "> </p>
              <p> <input type='submit' value='List of consults'> </p>
            </form>");

            $connection = null;
        ?>

    </body>
</html>
