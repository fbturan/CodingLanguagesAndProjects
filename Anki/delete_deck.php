<?php

$conn = new mysqli("localhost", "root", "", "anki_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$deckName = $_GET["data"];

$sqlDeleteDeck = "DROP TABLE IF EXISTS $deckName";

if ($conn->query($sqlDeleteDeck)) {
    echo "Success";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();

header("Location: ind.php");
exit();
?>

