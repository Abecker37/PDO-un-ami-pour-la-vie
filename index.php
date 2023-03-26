<!DOCTYPE html>
<html>
<head>
	<title>Liste des personnages</title>
</head>
<body>
	<h1>Liste des personnages</h1>
	<ul>
		<?php
		include('connect.php');
		$characters = $db->query('SELECT * FROM friend')->fetchAll();

		foreach ($characters as $character) {
			echo "<li>" . $character['firstname'] . " " . $character['lastname'] . "</li>";
		}
		?>
	</ul>

		<?php
	if(isset($_GET['error'])) {
		$error_message = urldecode($_GET['error']);
		echo "<div class='error'>$error_message</div>";
} ?>

	<h2>Ajouter un personnage</h2>
	<form action="add_character.php" method="post">
		<label for="firstname">Prénom :</label>
		<input type="text" name="firstname" required maxlength="45">
		<label for="lastname">Nom :</label>
		<input type="text" name="lastname" required maxlength="45">
		<button type="submit">Ajouter</button>
	</form>
</body>
</html>


