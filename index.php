<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "esp32_control";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle AJAX request
if (isset($_POST['led']) && isset($_POST['status'])) {
    $led = $_POST['led'];
    $status = $_POST['status'];

    $sql = "UPDATE led_status SET $led=$status WHERE id=1";
    $conn->query($sql);
    exit;
}

// Retrieve LED status
$sql = "SELECT * FROM led_status WHERE id=1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>ESP LED Control & DHT Sensor Data</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <h1>ESP LED Control</h1>
            <label class="toggle-switch">
                <input type="checkbox" name="led1" <?php if ($row['led1']) echo 'checked'; ?> onchange="handleToggle(event)">
                <span class="slider"></span>
            </label> LED 1<br>
            <label class="toggle-switch">
                <input type="checkbox" name="led2" <?php if ($row['led2']) echo 'checked'; ?> onchange="handleToggle(event)">
                <span class="slider"></span>
            </label> LED 2<br>
            <label class="toggle-switch">
                <input type="checkbox" name="led3" <?php if ($row['led3']) echo 'checked'; ?> onchange="handleToggle(event)">
                <span class="slider"></span>
            </label> LED 3<br>
            <label class="toggle-switch">
                <input type="checkbox" name="led4" <?php if ($row['led4']) echo 'checked'; ?> onchange="handleToggle(event)">
                <span class="slider"></span>
            </label> LED 4<br>
        </div>

   
    </div>

    <script src="script.js"></script>
</body>
</html>
