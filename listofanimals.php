<!DOCTYPE html>
<html lang="en" dir="ltr">
    <h3>List of Animals</h3>
    <body>
        <?php
            $host = "db.ist.utl.pt";
            $user = "ist178111";
            $pass = "fryk4600";
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
            //Requesting access to variables from previous page
            $client_VAT = $_REQUEST['client_VAT'];
            $animal_name = $_REQUEST['animal_name'];
            $owner_name = $_REQUEST['owner_name'];

            //Issuing MySQL command
            $sql = "SELECT animal.VAT, person.name, animal.name FROM person NATURAL JOIN client INNER JOIN animal WHERE animal.name='$animal_name' AND person.name like '%$owner_name%'";
            $result = $connection->query($sql);
            if ($result == FALSE)
            {
                $info = $connection->errorInfo();
                echo("<p>Error: {$info[2]}</p>");
                exit();
            }

            foreach($result as $row)
            {
            $VAT = $row['VAT'];
                echo("<option value=\"$VAT\">$VAT</option>");

            }

         ?>
    </body>
</html>
