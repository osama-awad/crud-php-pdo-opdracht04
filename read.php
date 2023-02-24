<?php

$host = 'localhost';
$dbname = 'Nailstudio';
$username = 'root';
$password = '';

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

$sql = "SELECT * FROM Afspraak1 ORDER BY appointment DESC";

// Prepare the SQL query for execution
$statement = $pdo->prepare($sql);

// Execute the prepared SQL query
$statement->execute();

// Fetch all the records from the "Afspraak" table and store them in an array of objects
$result = $statement->fetchAll(PDO::FETCH_OBJ);

// Loop through each record and construct the HTML table rows
$rows = "";
foreach ($result as $info) {
    $rows .= "<tr>
                <td>$info->Id</td>
                <td>$info->color1</td>
                <td>$info->color2</td>
                <td>$info->color3</td>
                <td>$info->color4</td>
                <td>$info->phone</td>
                <td>$info->email</td>
                <td>$info->appointment</td>
                <td>$info->treatment1</td>
                <td>$info->treatment2</td>
                <td>$info->treatment3</td>
                <td>$info->timestamp</td>
                <td>
                    <a href='delete.php?id=$info->Id'>
                        <img src='img/b_drop.png' alt='kruis'>
                    </a>
                </td>
                <td>
                    <a href='update.php?id=$info->Id'>
                        <img src='img/b_edit.png' alt='potlood'>
                    </a>
                </td>
              </tr>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afspraak</title>
</head>

<body>
    <h3>Afspraak</h3>
    <table border='1'>
        <thead>
            <th>Id</th>
            <th>Color 1</th>
            <th>Color 2</th>
            <th>Color 3</th>
            <th>Color 4</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Appointment</th>
            <th>Treatment 1</th>
            <th>Treatment 2</th>
            <th>Treatment 3</th>
            <th>Timestamp</th>
            <th>Delete</th>
            <th>Edit</th>
        </thead>
        <tbody>
            <?= $rows; ?>
        </tbody>
    </table>