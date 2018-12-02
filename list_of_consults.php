<!DOCTYPE html>
<html lang="en" dir="ltr">
    <h3>List of Consults</h3>
    <body>
        <?php
        //Connecting to server
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

        //Getting values passed from href
            $animal_name = $_GET['animal_name'];
            $owner_VAT = intval($_GET['owner_VAT']);

            $sql = "SELECT date_timestamp FROM consult WHERE name = '$animal_name' AND VAT_owner=".intval($owner_VAT).";";
            $result = $connection->query($sql);
            if ($result == FALSE)
            {
                $info = $connection->errorInfo();
                echo("<p>Error: {$info[2]}</p>");
                exit();
            }
            //
            echo ("<table border='1'>
              <tr>
                <td>Consult Date</td>
              </tr>");
            foreach ($result as $row) {
                $consult_date = $row['date_timestamp'];
                echo "<tr>";
                echo "<td>" . '<a href="consult_information.php?consult_date='. $consult_date .'&animal_name='.$animal_name.'&owner_VAT='.$owner_VAT.'">'. $consult_date .'</a>'."</td>";
                echo "</tr>";
            }
            echo ("</table>");

            $connection = null;

         ?>

    </body>
</html>
