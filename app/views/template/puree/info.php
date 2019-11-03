<?php
$servername = "localhost";
$username = "id11399066_root";
$password = "password";
$dbname = "id11399066_adidas";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "MySQL";
?>
<?php
printf(" version: %s\n", mysqli_get_server_info($conn));
phpinfo();
?>
