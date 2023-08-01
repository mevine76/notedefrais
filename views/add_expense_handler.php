<!-- add_expense_handler.php -->

<?php
// Assurez-vous que le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Connexion à la base de données (à compléter avec vos identifiants)
    $db_host = "localhost";
    $db_name = "expense";
    $db_user = "root";
    $db_pass = "";

    try {
        $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer les données soumises par le formulaire
        $description = $_POST['description'];
        $amount = $_POST['amount'];
        // Récupérer d'autres champs si nécessaire

        // Valider les données (à compléter selon vos critères de validation)
        if (empty($description) || !is_numeric($amount) || $amount <= 0) {
            throw new Exception("Veuillez remplir tous les champs correctement.");
        }

        // Insérer les données dans la base de données
        $stmt = $conn->prepare("INSERT INTO expense_report (description, amount) VALUES (:description, :amount)");
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':amount', $amount);
        $stmt->execute();

        // Rediriger vers la page de liste des notes de frais avec un message de succès
        header("Location: list_expenses.php?success=1");
        exit();
    } catch (PDOException $e) {
        // En cas d'erreur lors de la connexion à la base de données
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    } catch (Exception $e) {
        // En cas d'erreur de validation ou autre erreur
        echo "Erreur : " . $e->getMessage();
    }
} else {
    // Rediriger vers le formulaire si la soumission du formulaire n'a pas été faite
    header("Location: add_expense.php");
    exit();
}
?>
