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

            //Requesting access to variables obtained in the form

            $owner_VAT = $_REQUEST['client_VAT'];
            $animal_name = $_REQUEST['animal_name'];
            $species_name = $_REQUEST['species_name'];
            $colour = $_REQUEST['colour'];
            $gender = $_REQUEST['gender'];
            $birth_year = $_REQUEST['birth_year'];

            //Issuing MySQL command
            $sql = "INSERT INTO animal(name, VAT, species_name, colour, gender, birth_year) VALUES('$animal_name', '184530918', '$species_name', '$colour' , '$gender', '$birth_year')";

            $result = $connection->query($sql);
            if ($result == FALSE)
            {
                $info = $connection->errorInfo();
                echo("<p>Error: {$info[2]}</p>");
                exit();
            }

            echo("<form action='create_new_consult.php' method='post'>
              <p> <input type='hidden' name = 'owner_VAT' value= " . $owner_VAT . "> </p>
              <p> <input type='hidden' name = 'client_VAT' value= " . $owner_VAT . "> </p>
              <p> <input type='hidden' name = 'animal_name' value=" . $animal_name . "> </p>
              <p> <input type='submit' value ='New Consult'> </p>
            </form>");

            $connection = null;
        ?>

    </body>
</html>
