<?php

$conn = new mysqli("localhost", "root", "", "bitly_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $longUrl = $_POST["long_url"];

    $shortCode = generateShortCode();
    $sql = "INSERT INTO short_links (long_url, short_code) VALUES ('$longUrl', '$shortCode')";
    $conn->query($sql);

    $shortUrl = "http://yourdomain.com/$shortCode";

    echo "Shorten Link: <a href=\"$shortUrl\" target=\"_blank\">$shortUrl</a>";
}

function generateShortCode($length = 6) {
    $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $shortCode = "";
    for ($i = 0; $i < $length; $i++) {
        $shortCode .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $shortCode;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bitly</title>
</head>
<body>
    <h1>Shorten Link Here</h1>

    <form method="post" action="index.php">
        <label for="long_url">Long Link:</label>
        <input type="url" name="long_url" required>
        <button type="submit">Shorten</button>
    </form>
</body>
</html>
