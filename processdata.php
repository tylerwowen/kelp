<?php

// define variables and set to empty values
$tagnumber = $location = $date = $email = $notes = $coordinates = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $tagnumber = test_input($_POST["tagnumber"]);
  $location = test_input($_POST["location"]);
  $date = test_input($_POST["date"]);
  $email = test_input($_POST["email"]);
  $notes = test_input($_POST["notes"]);
  $coordinates = test_input($_POST["coordinates"]);

  // $myfile = fopen("testfile.txt", "w") or die("Unable to open file!");;
  // // test form
  // fwrite($myfile, $tagnumber);
  // fwrite($myfile, $location);
  // fwrite($myfile, $time);
  // fwrite($myfile, $email);
  // fwrite($myfile, $notes);
  // fclose($myfile);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

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
    VALUES ('$tagnumber', '$location', '$date', '$email', '$notes', GeomFromText('$coordinates'))";
    // use exec() because no results are returned
    $conn->exec($sql);
    $message = "You have successfully reported a tag. Thank you for your cooperation!";
    echo "<script type='text/javascript'>";
    echo "alert('$message');";
    echo "window.location.href = 'index.html';";
    echo "</script>";
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    $message = "Something went wrong. Please report it to administrators";
    echo "<script type='text/javascript'>";
    echo "alert('$message');";
    echo "window.location.href = 'addnew.html';";
    echo "</script>";
}

    $conn = null;
?>
