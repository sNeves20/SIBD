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
            $animal_name = $_REQUEST['animal_name'];
            $consult_date = $_REQUEST['consult_date'];

            $assistant_VAT = $_REQUEST['assistant_VAT'];
            $Cholesterol = $_REQUEST['Cholesterol'];
            $Creatinine = $_REQUEST['Creatinine'];
            $RBC = $_REQUEST['RBC'];
            $WBC = $_REQUEST['WBC'];


            //Inserts information into table consult
            $sql = "INSERT INTO produced_indicator VALUES('$animal_name','$owner_VAT', '$consult_date', 2, 'Cholesterol', $Cholesterol)";

            $result = $connection->query($sql);
            if ($result == FALSE)
            {
                $info = $connection->errorInfo();
                echo("<p>Error: {$info[2]}</p>");
                exit();
            }


            //list_of_consults.php
            echo("<form action='list_of_consults.php' method='post'>
              <p> <input type='submit' value='Submit'> </p>
            </form>");

            $connection = null;
        ?>

    </body>
</html>