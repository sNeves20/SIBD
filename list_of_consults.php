<!DOCTYPE html>
<?php
    session_start();
 ?>
<html lang="en" dir="ltr">
    <h3>List of Consults</h3>
    <body>
        <?php
        //Connecting to server
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

        //Getting values passed from href
            $_SESSION['owner_VAT'] = intval($_GET['owner_VAT']);

        //Getting session values
            $animal_name = $_SESSION['animal_name'];
            $client_VAT = intval($_SESSION['client_VAT']);
            $owner_VAT = $_SESSION['owner_VAT'];

            $sql = "SELECT date_timestamp FROM consult WHERE name = '$animal_name' AND VAT_owner=".intval($owner_VAT).";";
            $result = $connection->query($sql);
            if ($result == FALSE)
            {
                $info = $connection->errorInfo();
                echo("<p>Error: {$info[2]}</p>");
                exit();
            }
            //
            echo ("<table border='1' cellspacing = '5'>
              <tr>
                <td>Consult Date</td>
              </tr>");
            foreach ($result as $row) {
                $consult_date = $row['date_timestamp'];
                echo "<tr>";
                echo "<td>" .'<a href="consult_information.php?consult_date='. $consult_date .'">'. $consult_date .'</a>'."</td>";

                echo("<td> <table border='0' cellspacing = '5'> <tr><td><a href=\"blood_test_results.php?consult_date=");
                echo ($consult_date);
                echo("\">Insert Blood Test Results</a></td></tr></table>\n");
                echo "</tr>";
            }
            echo ("</table>");

            $connection = null;

            echo("<form action='create_new_consult.php' method='post'>
              <p> <input type='submit' value='New Consult'> </p>
            </form>");

         ?>

    </body>
</html>
