
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $to = "infos@repair-pc-mac.fr"; // Remplacez par votre email
    $subject = "Nouveau message de contact";
    $body = "Vous avez reçu un nouveau message de contact :\n\n";
    $body .= "Nom : $nom\n";
    $body .= "Prénom : $prenom\n";
    $body .= "Adresse Postale : $adresse\n";
    $body .= "Email : $email\n\n";
    $body .= "Message :\n$message";

    $headers = "From: $email\r\n" .
               "Reply-To: $email\r\n" .
               "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $body, $headers)) {
        echo "Merci pour votre message. Nous vous répondrons bientôt.";
    } else {
        echo "Une erreur est survenue. Veuillez réessayer.";
    }
} else {
    echo "Méthode de requête non valide.";
}
?>
