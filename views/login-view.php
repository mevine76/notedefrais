<?php include_once 'template/head.php'; ?>

<div class="row mx-0 justify-content-center text-center">

    <div class="col-lg-3 col-10 bg-light mt-5 pt-4 pb-5 rounded">
        <p class="h3">Connexion</p>
        <form action="" method="POST" novalidate>
            <div class="login-error"><?= $errors['mail'] ?? '' ?></div>
            <input class="d-block mx-auto mb-2 text-center" type="mail" name="mail" placeholder="Identifiant" value="<?= $_POST['mail'] ?? '' ?>" required>
            <div class="login-error"><?= $errors['password'] ?? '' ?></div>
            <input class="d-block mx-auto mb-2 text-center" type="password" name="password" placeholder="Mot de passe" required>
            <div class="login-error"><?= $errors['signIn'] ?? '' ?></div>
            <button class="btn btn-secondary my-2" type="submit">Connexion</button>
        </form>
        <a class="d-block text-decoration-none text-dark" href="../controllers/register-controller.php">Inscription</a>
    </div>

</div>

<?php include_once 'template/footer.php'; ?>