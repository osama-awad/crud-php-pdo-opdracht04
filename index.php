<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="create.php">
        <label>Kies 4 basiskleuren voor uw nagels:</label><br>
        <input type="color" name="color1" value="#ff0000" required>
        <input type="color" name="color2" value="#00ff00" required>
        <input type="color" name="color3" value="#0000ff" required>
        <input type="color" name="color4" value="#ffff00" required><br><br>

        <label>Uw telefoonnummer:</label><br>
        <input type="tel" name="phone" pattern="[0-9]{10}" required><br><br>

        <label>Uw e-mailadres:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Afspraak datum/tijd:</label><br>
        <input type="datetime-local" name="appointment" required><br><br>

        <label>Soort behandeling:</label><br>
        <input type="checkbox" name="treatment1" value="manicure">Manicure<br>
        <input type="checkbox" name="treatment2" value="pedicure">Pedicure<br>
        <input type="checkbox" name="treatment3" value="nail-art">Nail Art<br><br>

        <input type="reset" value="Reset">
        <input type="submit" value="Verzenden">

        <input type="hidden" name="timestamp" value="<?php echo date('Y-m-d H:i:s'); ?>">
    </form>
</body>

</html>