<?php
include('connect.php');

$errors = [];
if (isset($_POST['firstname']) && isset($_POST['lastname'])) {
	$firstname = trim($_POST['firstname']);
	$lastname = trim($_POST['lastname']);

    if (empty($firstname)) {
        $errors[] = "Le prénom est obligatoire.";
    } else if (strlen($firstname) > 45) {
        $errors[] = "Le prénom ne doit pas dépasser 45 caractères.";
    }
    if (empty($lastname)) {
        $errors[] = "Le nom est obligatoire.";
    } else if (strlen($lastname) > 45) {
        $errors[] = "Le nom ne doit pas dépasser 45 caractères.";
    }
       }       // S'il y a des erreurs, on redirige vers index.php en affichant un message d'erreur
        if(!empty($errors)) {
            $error_message = "";
            foreach($errors as $error) {
                $error_message .= "- $error<br>";
            }
            header('Location: index.php?error='.urlencode($error_message));
            exit;
        }else {
                // Insertion dans la base de données
        $stmt = $db->prepare('INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)');
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->execute();

        // Redirection vers la page principale
        header('Location: index.php');
        exit();
}
        

    