<?php
include_once 'template/head.php'
?>

<div class="container mt-3">
    <div class="row">
        <div class="col-12 text-center">
            <p class="h1">Bonjour, <?= $_SESSION['user']['firstname'] ?></p>
        </div>
    </div>
    <div class="row justify-content-center mx-0">
        <div class="col-7">

            <p class="text-center">Dernières notes de frais</p>

            <!-- Affichage des notes de frais dans un tableau -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Date dépense</th>
                        <th>Description</th>
                        <th>Montant TTC</th>
                        <th>Montant HT</th>
                        <th>Justificatif</th>
                        <th>Statut</th>
                        <!-- Autres en-têtes de colonnes si nécessaire -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Connexion à la base de données (à compléter avec vos identifiants)
                    $db_host = "localhost";
                    $db_name = "expense";
                    $db_user = "root";
                    $db_pass = "";

                    try {
                        $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Récupérer les données des notes de frais depuis la base de données
                        $stmt = $conn->query("SELECT exp_date, exp_description, exp_amount_ttc, exp_amount_ht, exp_proof, sta_id FROM expense_report");
                        $expenses = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        // Afficher les notes de frais dans le tableau
                        foreach ($expenses as $expense) {
                            echo "<tr>";
                            echo "<td>";
                            if ($expense['sta_id'] === 'en cours') {
                                echo '<span class="badge bg-secondary">En cours</span>';
                            } elseif ($expense['sta_id'] === 'acceptée') {
                                echo '<span class="badge bg-success">Acceptée</span>';
                            } elseif ($expense['sta_id'] === 'réfusée') {
                                echo '<span class="badge bg-danger">Réfusée</span>';
                            }
                            echo "</td>";
                            echo "<td>" . htmlspecialchars($expense['exp_date']) . "</td>";
                            echo "<td>" . htmlspecialchars($expense['exp_description']) . "</td>";
                            echo "<td>" . htmlspecialchars($expense['exp_amount_ttc']) . "</td>";
                            echo "<td>" . htmlspecialchars($expense['exp_amount_ht']) . "</td>";
                            // echo "<td>" . htmlspecialchars($expense['exp_proof']) . "</td>";
                            // Au lieu d'afficher le nom du justificatif, afficher l'image du dossier upload en miniature
                            echo "<td><img src='../controllers/upload/facture1.jpg" . htmlspecialchars($expense['exp_proof']) . "'alt='Justificatif' style='max-height: 100px;'></td>";
                            
                            // Afficher d'autres colonnes si nécessaire
                            echo "</tr>";
                        }
                    } catch (PDOException $e) {
                        // En cas d'erreur lors de la connexion à la base de données
                        echo "Erreur de connexion à la base de données : " . $e->getMessage();
                    }
                    ?>
                </tbody>
            </table>

            <a class="btn btn-dark mt-4" href="../controllers/expense-form-controller.php">+ Ajout d'une nouvelle note</a>

        </div>
    </div>
</div>

<?php include_once 'template/footer.php' ?>