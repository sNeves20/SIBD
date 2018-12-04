<!DOCTYPE html>
<html lang="en" dir="ltr">
      <h3>List of Animals</h3>
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
              //Requesting access to variables from previous page
              $client_VAT = $_REQUEST['client_VAT'];
              $animal_name = $_REQUEST['animal_name'];
              $owner_name = $_REQUEST['owner_name'];

              //Issuing MySQL command
              $sql = "SELECT animal.VAT, person.name as owner, animal.name FROM person NATURAL JOIN client INNER JOIN animal ON animal.VAT = person.VAT WHERE animal.name='$animal_name' AND person.name like '%$owner_name%'";
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
                  <td>VAT</td>
                  <td>Owner</td>
                  <td>Animal</td>
                </tr>");
                foreach($result as $row)
                {

                    $owner_VAT = $row['VAT'];
    		            $owner = $row['owner'];
    		            $animal = $row['name'];
                    echo "<tr>";
                    echo "<td>" . $owner_VAT . "</td>";
                    echo "<td>" . $owner . "</td>";
                    echo "<td>" . '<a href="list_of_consults.php?owner_VAT='. $owner_VAT .'&animal_name='.$animal_name. '&client_VAT='.$client_VAT. '">'. $animal .'</a>'."</td>";
                    echo "</tr>";
                }
              echo ("</table>");
              $connection = null;
              echo("<form action='register_new_animal.php' method='post'>
                <p> <input type='hidden' name='client_VAT' value= " . $client_VAT . "> </p>
                <p> <input type='hidden' name='animal_name' value=" . $animal_name . "> </p>
                <p> <input type='submit' value='Register New Animal'> </p>
              </form>");
          ?>
    </body>
</html>
