<?php
    session_start();
 ?>
<html>
    <body>
        <form action = "listofanimals.php" method = "post">
            <h3>Search for a client</h3>
            <p> Client VAT : <input type = "number" name = "client_VAT"/></p>
            <p> Animal Name : <input type = "text" name = "animal_name"/></p>
            <p> Owner Name : <input type = "text" name = "owner_name"/></p>
            <p> <input type="submit" value="Submit"/></p>
        </form>
    </body>
</html>
