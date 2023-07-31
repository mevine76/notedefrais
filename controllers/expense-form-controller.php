<?php

// nous ouvrons une session
session_start();

// j'inclus les fichiers nécessaires se trouvant dans le fichier config.php
require_once '../config.php';

// j'inclus les fichiers nécessaires se trouvant dans le dossier helpers
require_once '../helpers/Database.php';
require_once '../helpers/Form.php';

// j'inclus les fichiers nécessaires se trouvant dans le dossier models Employees.php
require_once '../models/Employees.php';
require_once '../models/Expense_report.php';


// Nous définissons un tableau d'erreurs
$errors = [];

// Nous définissons une variable permettant cacher / afficher le formulaire d'inscription : de base = true
$showForm = true;

// Déclenchement des actions uniquement à l'aide d'un POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Contrôle du date : vide
    if (isset($_POST['date'])) {

        if (empty($_POST['date'])) {
            $errors['date'] = 'La date est obligatoire';
        }
    }

    // Contrôle du type : vide
    if (!isset($_POST['type'])) {
        $errors['type'] = 'veuillez choisir un type de frais';
    }

    // Contrôle du type : être un entier
    if (isset($_POST['type'])) {
        if (is_int($_POST['type'])) {
            $errors['type'] = 'ce type de frais n\'existe pas';
        }
    }

    // Contrôle du amount : vide et uniquement des nombres
    if (isset($_POST['amount'])) {

        if (empty($_POST['amount'])) {
            $errors['amount'] = 'Le montant TTC est obligatoire';
        } else if (!is_numeric($_POST['amount'])) {
            $errors['amount'] = 'Le montant TTC doit être un nombre';
        }
    }

    // Contrôle du motif : vide
    if (isset($_POST['description'])) {

        if (empty($_POST['description'])) {
            $errors['description'] = 'Le motif est obligatoire';
        }
    }

    // Contrôle du justificatif : vide
    if (isset($_FILES['proof'])) {
        // si le code d'erreur est égal à 4, cela signifie que l'utilisateur n'a pas téléchargé de fichier
        if ($_FILES['proof']['error'] == 4) {
            $errors['proof'] = 'Le justificatif est obligatoire';
        } else {
            // controle du type
            // controle de lextension
            
            // controle de la taille
            $tmpName = $_FILES['proof']['tmp_name'];
            $name = $_FILES['proof']['name'];
            $size = $_FILES['proof']['size'];
            $error = $_FILES['proof']['error'];
            $tabExtension = explode('.', $name);
            $extension = strtolower(end($tabExtension));
        }

        if(in_array($extension, UPLOAD_EXTENSIONS)) {
            move_uploaded_file($tmpName, './upload/' . $name);
        }
        else{
            echo "mauvaise extension de fichier";
        }
    }


    // si le tableau d'erreurs n'est pas vide, on ajoute la note dans la base de données
    if (empty($errors)) {

        $objExpense = new Expense_report();
        if ( $objExpense->addExpense($_SESSION['user']['id'], $_POST['date'], $_POST['amount'], $_POST['amount']*0.80, $_POST['description'], $_FILES['proof']['name'], $_POST['type'])
        ) {
            // nous cachons le formulaire
            $showForm = false;
        } else {
            // nous mettons en place un message d'erreur dans le cas où la requête échouée
            $errors['bdd'] = 'Une erreur est survenue lors de la creation de votre note de frais';
        }
    }

}


// ExpenseController.php

class ExpenseController
{
    public function handleRequest()
    {
        // Créez une instance du modèle
        $model = new Expense_report();

        // Vérifiez les actions demandées dans l'URL
        $action = isset($_GET['action']) ? $_GET['action'] : 'list';

        switch ($action) {
            case 'list':
                // Afficher la liste des notes de frais pour un employé donné
                $emp_id = 1; // Ici, nous utilisons l'ID de l'employé 1 à titre d'exemple, vous pouvez récupérer l'ID de l'employé connecté
                $expenses = $model->getEmployeeExpenses($emp_id);
                include '../views/expense-form-view.php';
                break;
            case 'add':
                // Ajouter une nouvelle note de frais
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Traitement du formulaire d'ajout ici
                    // Récupérer les données du formulaire, puis appeler la fonction pour ajouter la note de frais
                    $emp_id = 1; // Ici, nous utilisons l'ID de l'employé 1 à titre d'exemple, vous pouvez récupérer l'ID de l'employé connecté
                    $exp_date = $_POST['date'];
                    $exp_amount_ttc = $_POST['amount'];
                    $exp_amount_ht = $_POST['amount'];
                    $exp_description = $_POST['description'];
                    $exp_proof = $_POST['proof'];
                    $typ_id = $_POST['type'];
                    $model->addExpense($emp_id, $exp_date, $exp_amount_ttc, $exp_amount_ht, $exp_description, $exp_proof, $typ_id);

                    // Rediriger vers la liste des notes de frais
                    header('Location: index.php?controller=Expense&action=list');
                    exit;
                } else {
                    include '../views/add_expense.php';
                }
                break;
            case 'validate':
                // Valider une note de frais (action réservée aux administrateurs)
                // Vérifiez les autorisations ici (vous pouvez utiliser une variable de session pour vérifier si l'utilisateur est administrateur)
                $exp_id = $_GET['exp_id'];
                $model->validateExpense($exp_id);

                // Rediriger vers la liste des notes de frais
                header('Location: index.php?controller=Expense&action=list');
                exit;
                break;
            // Gérer les autres actions : modifier, supprimer, etc.
            default:
                die("Action non valide.");
                break;
        }
    }

    }

        // include '../views/login-view.php';
    


?>

<!-- nous incluons la vue register-view.php -->
<?php include_once '../views/expense-form-view.php'; ?>
