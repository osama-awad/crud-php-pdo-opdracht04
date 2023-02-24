<?php
$host = 'localhost';
$dbname = 'Nailstudio';
$username = 'root';
$password = '';

// connect to database using PDO
$dsn = "mysql:host=$host;dbname=$dbname";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // define the SQL statement with named placeholders
    $sql = "INSERT INTO Afspraak1 (color1,
                                   color2,
                                   color3,
                                   color4, 
                                   phone, 
                                   email, 
                                   appointment, 
                                   treatment1, 
                                   treatment2, 
                                   treatment3, 
                                   timestamp) 
                        VALUES (:color1, 
                                :color2, 
                                :color3, 
                                :color4, 
                                :phone, 
                                :email, 
                                :appointment, 
                                :treatment1, 
                                :treatment2, 
                                :treatment3, 
                                :timestamp)";

    // prepare the SQL statement
    $stmt = $pdo->prepare($sql);

    // bind form data to the placeholders in the SQL statement using bindValue
    $stmt->bindValue(':color1', $_POST['color1']);
    $stmt->bindValue(':color2', $_POST['color2']);
    $stmt->bindValue(':color3', $_POST['color3']);
    $stmt->bindValue(':color4', $_POST['color4']);
    $stmt->bindValue(':phone', $_POST['phone']);
    $stmt->bindValue(':email', $_POST['email']);
    $stmt->bindValue(':appointment', $_POST['appointment']);
    $stmt->bindValue(':treatment1', isset($_POST['treatment1']) ? 1 : 0);
    $stmt->bindValue(':treatment2', isset($_POST['treatment2']) ? 1 : 0);
    $stmt->bindValue(':treatment3', isset($_POST['treatment3']) ? 1 : 0);
    $stmt->bindValue(':timestamp', $_POST['timestamp']);
    

    if ($stmt->execute()) {
        echo "Record created successfully";
        header('Refresh:2; url=read.php');
    } else {
        echo "Error creating record: " . $stmt->errorInfo()[2];
        header('Refresh:2; url=read.php');
    }}
