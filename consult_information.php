<!DOCTYPE html>
<html lang="en" dir="ltr">
    <h3>Consult Information</h3>
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

            $animal_name = $_GET['animal_name'];
            $consult_date = $_GET['consult_date'];
            $owner_VAT = $_GET['owner_VAT'];


            //Issuing MySQL command
            $sql = " SELECT * FROM animal INNER JOIN consult NATURAL JOIN consult_diagnosis NATURAL JOIN procedure_ WHERE animal.name = '$animal_name' AND animal.VAT =".intval($owner_VAT)."AND consult.date_timestamp = '$consult_date';";
            $result = $connection->query($sql);

            if ($result == FALSE)
            {
                $info = $connection->errorInfo();
                echo("<p>Error: {$info[2]}</p>");
                exit();
            }


            echo ("<table border='1'>
              <tr>
                <td>Animal Name</td>
                <td>Date</td>
                <td>Owners' VAT</td>
                <td>S</td>
                <td>O</td>
                <td>A</td>
                <td>P</td>
                <td>Clients' VAT</td>
                <td>Veterinaries' VAT</td>
                <td>Weight</td>

                <td>Species Name</td>
                <td>Colour</td>
                <td>Gender</td>
                <td>Birth Year</td>
                <td>Code</td>
                <td>Num</td>
                <td>Description</td>
              </tr>");


              foreach ($result as $row) {
                  $S = $row['s'];
                  $O = $row['o'];
                  $A = $row['a'];
                  $P = $row['p'];
                  $cli_VAT= $row['VAT_client'];
                  $vet_VAT= $row['VAT_vet'];
                  $weight = $row['weight'];

                  $species = $row['species_name'];
                  $colour = $row['colour'];
                  $birth_year = $row['birth_year'];
                  $code = $row['code'];
                  $num = $row['num'];
                  $desc = $row['description'];

                  echo "<tr>";
                  echo "<td>" . $animal_name . "</td>";
                  echo "<td>" . $consult_date . "</td>";
                  echo "<td>" . $owner_VAT . "</td>";
                  echo "<td>" . $S . "</td>";
                  echo "<td>" . $O . "</td>";
                  echo "<td>" . $A . "</td>";
                  echo "<td>" . $P . "</td>";
                  echo "<td>" . $cli_VAT . "</td>";
                  echo "<td>" . $vet_VAT . "</td>";
                  echo "<td>" . $weight . "</td>";

                  echo "<td>" . $species . "</td>";
                  echo "<td>" . $colour . "</td>";
                  echo "<td>" . $birth_year . "</td>";
                  echo "<td>" . $code . "</td>";
                  echo "<td>" . $num . "</td>";
                  echo "<td>" . $desc . "</td>";
                  echo "</tr>";
            }

            echo ("</table>");

            $connection = null;
            echo("<form action='blood_test_results.php' method='post'>
              <p> <input type='hidden' name='owner_VAT' value= " . $owner_VAT . "> </p>
              <p> <input type='hidden' name='animal_name' value=" . $animal_name . "> </p>
              <p> <input type='hidden' name='consult_date' value=" . $consult_date . "> </p>
              <p> <input type='submit' value='Insert Boold Test Results'> </p>
            </form>");

         ?>


    </body>
</html>
