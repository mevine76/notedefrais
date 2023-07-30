<!-- delete_expense.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Supprimer une note de frais</title>
    <!-- Ajouter les liens CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Supprimer une note de frais</h1>
        <p>Voulez-vous vraiment supprimer cette note de frais ?</p>
        <!-- Afficher les détails de la note de frais à supprimer -->
        <p>Date : <?= $expense['exp_date'] ?></p>
        <p>Montant TTC : <?= $expense['exp_amount_ttc'] ?></p>
        <p>Motif : <?= $expense['exp_description'] ?></p>

        <!-- Formulaire de confirmation pour la suppression -->
        <form method="post">
            <input type="hidden" name="exp_id" value="<?= $expense['exp_id'] ?>">
            <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
        </form>
    </div>

    <!-- Ajouter les liens JavaScript de Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
