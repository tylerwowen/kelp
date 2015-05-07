<?php
// Load configuration as an array. Use the actual location of your configuration file
$config = parse_ini_file('config.ini');

// Try and connect to the database
$username = $config['username'];
$password = $config['password'];
$dbname = $config['dbname'];


try {
    $conn = new PDO("mysql:host=127.0.0.1;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

    $sql = "INSERT INTO `kelp`.`tags` (`tagnumber`, `location`, `date`, `email`, `notes`, `coordinates`)
    VALUES ('$tagnumber', '$location', '$date', '$email', '$notes', GeomFromText(''))";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";

    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;
?>
