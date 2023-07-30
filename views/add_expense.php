<!-- add_expense.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une note de frais</title>
    <!-- Ajouter les liens CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Ajouter une note de frais</h1>
        <!-- Afficher le formulaire d'ajout d'une nouvelle note de frais -->
        <form method="post">
            <!-- Champs pour les nouvelles données -->
            <div class="form-group">
                <label for="date">Date :</label>
                <input type="date" class="form-control" name="date" id="date" required>
            </div>

            <div class="form-group">
                <label for="amount">Montant TTC :</label>
                <input type="number" class="form-control" name="amount" id="amount" required>
            </div>

            <div class="form-group">
                <label for="description">Motif :</label>
                <input type="text" class="form-control" name="description" id="description" required>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter la note de frais</button>
        </form>
    </div>

    <!-- Ajouter les liens JavaScript de Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
