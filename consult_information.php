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
            $sql = "SELECT * FROM consult WHERE consult.name = '$animal_name' AND consult.date_timestamp = CAST('$consult_date' AS datetime) AND consult.VAT_owner =".intval($owner_VAT).";";
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
                <td>Owners' VAT</td>
                <td>Date</td>
                <td>Clients' VAT</td>
                <td>Veterinaries' VAT</td>
              <tr>");

            foreach ($result as $row) {
              $cli_VAT= $row['VAT_client'];
              $vet_VAT= $row['VAT_vet'];
              $S = $row['s'];
              $O = $row['o'];
              $A = $row['a'];
              $P = $row['p'];
              $weight = $row['weight'];

              echo "<tr>";
              echo "<td>" . $animal_name . "</td>";
              echo "<td>" . $consult_date . "</td>";
              echo "<td>" . $owner_VAT . "</td>";
              echo "<td>" . $cli_VAT . "</td>";
              echo "<td>" . $vet_VAT . "</td>";
            }
            $sql = "SELECT * FROM animal WHERE animal.name = '$animal_name' AND animal.VAT =".intval($owner_VAT).";";
            $result = $connection->query($sql);

            if ($result == FALSE)
            {// code...
                $info = $connection->errorInfo();
                echo("<p>Error: {$info[2]}</p>");
                exit();
            }
            echo "<h5> Animal Info </h5>";
            echo ("<table border='1'>
              <tr>
                <td>Species</td>
                <td>Colour</td>
                <td>Gender</td>
                <td>Birth Year</td>
                <td>Age</td>
                <td>Weight</td>
              </tr>");

            foreach ($result as $row) {
              $species = $row['species_name'];
              $colour = $row['colour'];
              $gender = $row['gender'];
              $birth_year = $row['birth_year'];
              $age = $row['age'];
              echo "<tr>";
              echo "<td>" . $species . "</td>";
              echo "<td>" . $colour . "</td>";
              echo "<td>" . $gender . "</td>";
              echo "<td>" . $birth_year . "</td>";
              echo "<td>". $age ."</td>";
              echo "<td>" . $weight . "</td>";
              echo "</tr>";
            }
            echo "</table>";

            //SOAP Notes
            echo "<h5>SOAP Notes</h5>";
            echo ("<table border='1'>
              <tr>
                <td> S </td>
                <td> O </td>
                <td> A </td>
                <td> P </td>
              </tr>
              <tr>
                <td>  $S  </td>
                <td>  $O  </td>
                <td>  $A  </td>
                <td>  $P  </td>
              </tr>
            ");
            echo "</table>";
        //Issuing MySQL command for getting prescription Information

          $sql = "SELECT prescription.*, diagnosis_code.name AS diagnosis_name FROM prescription NATURAL JOIN consult_diagnosis LEFT JOIN diagnosis_code ON diagnosis_code.code = prescription.code WHERE prescription.name = '$animal_name' AND prescription.VAT_owner = ".intval($owner_VAT)." AND prescription.date_timestamp = CAST('$consult_date' AS datetime);";
          $result = $connection->query($sql);

          if ($result == FALSE)
          {
              $info = $connection->errorInfo();
              echo("<p>Error: {$info[2]}</p>");
              exit();
          }


          echo "<h5>Prescriptions</h5>";

          echo ("<table border='1'>
            <tr>
                <td> Diagnosis  </td>
              <td> Diagnosis Code </td>
              <td> Medication Name </td>
              <td> Laboratory </td>
              <td> Dosage </td>
              <td> Regime </td>
            </tr>");

            foreach ($result as $row) {
                $diagnosis = $row['diagnosis_name'];
                $diagnosis_code = $row['code'];
                $med_name = $row['name_med'];
                $lab = $row['lab'];
                $dosage = $row['dosage'];
                $regime = $row['regime'];

                echo "<tr>
                <td>$diagnosis</td>
                <td>$diagnosis_code</td>
                <td>$med_name</td>
                <td>$lab</td>
                <td>$dosage</td>
                <td>$regime</td>
                </tr>";
            }
            echo "</table>";

          //Issuing MySQL command For getting procedure Information
          $sql = "SELECT p.name, p.VAT_owner, p.num, p.date_timestamp, procedure_.description, test_procedure.type, radiography.file FROM (SELECT name, VAT_owner, date_timestamp, num FROM
                  procedure_ UNION SELECT name, VAT_owner, date_timestamp, num FROM test_procedure UNION SELECT name, VAT_owner, date_timestamp, num FROM radiography) p LEFT JOIN procedure_ ON
                  p.name = procedure_.name AND p.VAT_owner = procedure_.VAT_owner AND p.date_timestamp = procedure_.date_timestamp AND p.num = procedure_.num LEFT JOIN test_procedure ON
                  p.name = test_procedure.name AND p.VAT_owner = test_procedure.VAT_owner AND p.date_timestamp = test_procedure.date_timestamp AND p.num = test_procedure.num LEFT JOIN radiography ON
                  p.name = radiography.name AND p.VAT_owner = radiography.VAT_owner AND p.date_timestamp = radiography.date_timestamp AND p.num = radiography.num, consult
                  WHERE consult.name = p.name AND consult.VAT_owner = p.VAT_owner AND p.date_timestamp = consult.date_timestamp AND p.name = '$animal_name' AND p.VAT_owner = ".intval($owner_VAT)." AND p.date_timestamp = CAST('$consult_date' AS datetime);";
          $result = $connection->query($sql);

          if ($result == FALSE)
          {
              $info = $connection->errorInfo();
              echo("<p>Error: {$info[2]}</p>");
              exit();
          }

          echo "<h5>Procedure Information</h5>";
          echo "<table border = '1'>
               <tr>
               <td>Procedure Number</td>
               <td>Description</td>
               <td>Type</td>
               <td>File</td>
               </tr>
               ";
          foreach ($result as $row) {
            $num = $row['num'];
            $description = $row['description'];
            $type = $row['type'];
            if($type == NULL){
              $type = "---";
            }
            $file = $row['file'];
            if($file == NULL){
              $file = "---";
            }

            echo "<tr>
            <td>$num</td>
            <td>$description</td>
            <td>$type</td>
            <td>$file</td>
            </tr>";
          }
          echo "</table>";
        if($type != "---" ){
              $sql = "SELECT * FROM produced_indicator, indicator WHERE produced_indicator.indicator_name = indicator.name AND produced_indicator.name = '$animal_name' AND produced_indicator.VAT_owner =". $owner_VAT." AND produced_indicator.date_timestamp = CAST('$consult_date' AS datetime);";
              $result = $connection->query($sql);

              if ($result == FALSE)
              {
                  $info = $connection->errorInfo();
                  echo("<p>Error: {$info[2]}</p>");
                  exit();
              }


              echo "<h5>Indicators</h5>";

              echo "<table border = '1'>";
              echo "<tr>";
              echo "<td>Indicator Name</td>";
              echo "<td>Value</td>";
              echo "<td>Reference Value</td>";
              echo "<td>Units</td>";
              echo "<td>Description</td>";
              echo "</tr>";

              foreach ($result as $row) {
                $indicator_name = $row['indicator_name'];
                $value = $row['value'];
                $ref_value = $row['reference_value'];
                $units = $row['units'];
                $indicator_desc = $row['description'];

                echo "<tr>";
                echo "<td>$indicator_name</td>";
                echo "<td>$value</td>";
                echo "<td>$ref_value</td>";
                echo "<td>$units</td>";
                echo "<td>$indicator_desc</td>";
                echo "</tr>";
              }
              echo "</table>";
        }
          $connection = null;
          echo("<form action='Searchforclient.php' method='GET'>
              <p> <input type='submit' value='Search for new client'> </p>
          </form>");

         ?>

    </body>
</html>
