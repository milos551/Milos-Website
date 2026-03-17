<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = "milos.avramovic.designer@gmail.com"; // Tvoj email
    $subject = "Nova poruka sa kontakt forme";
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "Ime: $name\n";
    $body .= "Mejl: $email\n";
    $body .= "Poruka:\n$message\n";

    // Šaljemo mejl
    if (mail($to, $subject, $body, $headers)) {
        echo "success"; // Možeš ovde staviti JS za alert ili redirekciju
    } else {
        echo "error";
    }
} else {
    header("Location: index.html"); // Ako neko direktno pristupi fajlu, vrati ga na početnu stranu
}
?>
