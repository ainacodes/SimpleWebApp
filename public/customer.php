{"records":[
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "miniproject";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, email, password, name FROM users";
    $result = $conn->query($sql);
    $currentrow = 0;

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            $currentrow += 1;
            echo '{ "Name":"' . $row["name"] . '", "Email":"' . $row["email"] . '"}';
            if ($result->num_rows > $currentrow) { echo ','; }
        }
    }
    else 
    {
        echo "0 results";
    }
    $conn->close();
    ?>
]}