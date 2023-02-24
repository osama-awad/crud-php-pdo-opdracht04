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


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $sql = "UPDATE Afspraak1
            SET color1 = :color1,
            color2 = :color2,
            color3 = :color3,
            color4 = :color4,
            phone = :phone,
            email = :email,
            appointment = :appointment 
            treatment1 = :treatment1
            treatment2 = :treatment2
            treatment3 = :treatment3
            timestamp = :timestamp
            WHERE Id = :Id";

    $statement = $pdo->prepare($sql);

    $statement->bindValue(':color1', $_POST['color1'], PDO::PARAM_STR);
    $statement->bindValue(':color2', $_POST['color2'], PDO::PARAM_STR);
    $statement->bindValue(':color3', $_POST['color3'], PDO::PARAM_STR);
    $statement->bindValue(':color4', $_POST['color4'], PDO::PARAM_STR);
    $statement->bindValue(':phone', $_POST['phone'], PDO::PARAM_STR);
    $statement->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $statement->bindValue(':appointment', $_POST['appointment'], PDO::PARAM_STR);
    $statement->bindValue(':treatment1', $_POST['treatment1'], PDO::PARAM_STR);
    $statement->bindValue(':treatment2', $_POST['treatment2'], PDO::PARAM_STR);
    $statement->bindValue(':treatment3', $_POST['treatment3'], PDO::PARAM_STR);
    $stmt->bindValue(':timestamp', $_POST['timestamp'], PDO::PARAM_STR);
    $statement->bindValue(':Id', $_POST['id'], PDO::PARAM_STR);

    $statement->execute();

    echo "Het updaten is gelukt";
    header('Refresh:3; url=read.php');

    exit();
}

$sql = "SELECT * FROM Afspraak1 WHERE Id = :Id";

// Maak de sql-query klaar om de $_GET['Id'] waade te kopplen aan de placeholder :Id
$statement = $pdo->prepare($sql);
// Koppel de waarde $_GET['Id'] aan de placeholder :Id
$statement->bindValue(':Id', $_GET['id'], PDO::PARAM_INT);



//Voer de query uit

$statement->execute();
//Haal het resultaat op met fetch en stop het object in de variabal $result
$result = $statement->fetch(PDO::FETCH_OBJ);
//var_dump($result);  

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>PHP PDO CRUD</title>
</head>

<body>
    <H1>PHP PDO CRUD</H1>

    <form action="update.php" method="post">
        <label>Kies 4 basiskleuren voor uw nagels:</label><br>
        <input type="color" name="color1" value="#ff0000" required value="<?= $result->color1; ?>"><br>
        <input type="color" name="color2" value="#00ff00" required value="<?= $result->color2; ?>"><br>
        <input type="color" name="color3" value="#0000ff" required value="<?= $result->color3; ?>"><br>
        <input type="color" name="color4" value="#ffff00" required value="<?= $result->color4; ?>"><br><br>

        <label>Uw telefoonnummer:</label><br>
        <input type="tel" name="phone" pattern="[0-9]{10}" required value="<?= $result->phone; ?>"><br><br>

        <label>Uw e-mailadres:</label><br>
        <input type="email" name="email" required value="<?= $result->email; ?>"><br><br>

        <label>Afspraak datum/tijd:</label><br>
        <input type="datetime-local" name="appointment" required value="<?= $result->appointment; ?>"><br><br>

        <label>Soort behandeling:</label><br>
        <input type="checkbox" name="treatment1" value="manicure" value="<?= $result->treatment1; ?>">Manicure<br>
        <input type="checkbox" name="treatment2" value="pedicure" value="<?= $result->treatment2; ?>">Pedicure<br>
        <input type="checkbox" name="treatment3" value="nail-art" value="<?= $result->treatment3; ?>">Nail Art<br><br>


        <input type="hidden" name="timestamp" value="<?php echo date('Y-m-d H:i:s'); ?>">
  

        <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
        <input type="reset" value="Reset">
        <input type="submit" value="Verzenden">
  
    </form>
</body>

</html>