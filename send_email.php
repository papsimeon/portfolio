<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST["nom"]);
    $email = filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST["message"]);

    if (!$email) {
        die("Adresse email invalide.");
    }

    $to = "simestance@gmail.com"; // Ton adresse mail de réception
    $subject = "Nouveau message de contact";
    $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";

    $body = "Nom: $nom\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message";

    if (mail($to, $subject, $body, $headers)) {
        echo "Message envoyé avec succès.";
    } else {
        echo "Erreur lors de l'envoi du message.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>
