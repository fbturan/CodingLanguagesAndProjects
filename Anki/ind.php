<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory Cards</title> 
</head>
<body>
    <h1>Welcome to Anki</h1>
    <div>
        <h2>Memory Card Decks</h2>
		<button onclick="addDeck()">Deste Ekle</button>
        <?php include 'show_deck.php'; ?>
    </div>
	<script>
	function PHPWithQueryStringadd(i) {
		var dataToSend = document.getElementById(i).innerHTML;
		window.location.href = 'add_card.php?data=' + encodeURIComponent(dataToSend);
	}

	function PHPWithQueryStringstart(i) {
		var dataToSend = document.getElementById(i).innerHTML;
		window.location.href = 'start.php?data=' + encodeURIComponent(dataToSend);
	}

	function PHPWithQueryStringdelete(i) {
		var dataToSend = document.getElementById(i).innerHTML;
		window.location.href = 'delete_deck.php?data=' + encodeURIComponent(dataToSend);
	}

	function addDeck(deckName) {
		window.location.href = 'add_deck.php?deck=' + encodeURIComponent(deckName);
	}

	function addCard(deckName) {
		window.location.href = 'add_card.php?deck=' + encodeURIComponent(deckName);
	}

	function start(deckName) {
		window.location.href = 'start.php?deck=' + encodeURIComponent(deckName);
	}

	function deleteDeck(deckName) {
		window.location.href = 'delete_deck.php?deck=' + encodeURIComponent(deckName);
	}

</script>
</body>
</html>