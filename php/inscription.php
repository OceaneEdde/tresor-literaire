<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $email = $_POST["mail"];
    $password = $_POST["password"];

   
    if(isset($_FILES["profile_picture"])) {
        $file_name = $_FILES["profile_picture"]["name"];
        $file_temp = $_FILES["profile_picture"]["tmp_name"];
        $file_type = $_FILES["profile_picture"]["type"];
        $file_size = $_FILES["profile_picture"]["size"];

       
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($file_name);

        if(move_uploaded_file($file_temp, $target_file)) {
            echo "Photo de profil téléchargée avec succès.";
        } else {
            echo "Erreur lors du téléchargement de la photo de profil.";
        }
    }

    $servername = "localhost";
    $username = "votre_nom_utilisateur";
    $password = "votre_mot_de_passe";
    $dbname = "votre_base_de_donnees";

    $conn = new mysqli($servername, $username, $password, $dbname);

   
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données: " . $conn->connect_error);
    }

    
    $sql = "INSERT INTO utilisateurs (username, email, password, profile_picture) 
            VALUES ('$username', '$email', '$password', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouvel utilisateur enregistré avec succès.";
    } else {
        echo "Erreur lors de l'inscription: " . $conn->error;
    }

   
    $conn->close();
}
?>
