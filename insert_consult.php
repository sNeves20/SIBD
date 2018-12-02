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
            $diagnostic_code = $_REQUEST['diagnostic_code'];

            $date_time = date('Y-m-d H:i:s');

            //Inserts information into table consult
            $sql_1 = "INSERT INTO consult VALUES('$animal_name','$owner_VAT', '$date_time', '$S' , '$O', '$A' , '$P', '$client_VAT', '$vet_VAT', '$weight')";

            $result = $connection->query($sql_1);
            if ($result == FALSE)
            {
                $info = $connection->errorInfo();
                echo("<p>Error: {$info[2]}</p>");
                exit();
            }

            //Inserts information into table consult_diagnosis
            $sql_2 = "INSERT INTO consult_diagnosis VALUES('$diagnostic_code','$animal_name','$owner_VAT', '$date_time')";

            $result = $connection->query($sql_2);
            if ($result == FALSE)
            {
                $info = $connection->errorInfo();
                echo("<p>Error: {$info[2]}</p>");
                exit();
            }

            //list_of_consults.php
            echo("<form action='list_of_consults.php' method='post'>
              <p> <input type='hidden' name='owner_VAT' value= " . $owner_VAT . "> </p>
              <p> <input type='hidden' name='client_VAT' value= " . $owner_VAT . "> </p>
              <p> <input type='hidden' name='animal_name' value=" . $animal_name . "> </p>
              <p> <input type='hidden' name='date_time' value=" . $date_time . "> </p>
              <p> <input type='submit' value='New Consult'> </p>
            </form>");

            $connection = null;
        ?>

    </body>
</html>
