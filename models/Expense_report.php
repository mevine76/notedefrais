<?php

class Expense_report
{

    // nous allons créer les propriétés de l'objet en fonction des champs de la table employees, ils seront privés
    private int $_id;
    private string $_date;
    private float $_amount_ttc;
    private float $_amount_ht;
    private string $_description;
    private string $_proof;
    private string $_cancel_reason;
    private string $_decisions_date;
    private int $_id_type;
    private int $_id_statut;
    private int $_id_employee;

    // nous allons utiliser la méthode magique __get pour récupérer les propriétés de l'objet en dehors de la classe
    function __get(string $name)
    {
        return $this->$name;
    }


    /**
     * Permet de rajouter un employé dans la base de données
     * @param array $post_form tableau contenant les données du formulaire
     * @return bool true si l'employé a été ajouté, sinon false
     */
    public static function addEmployee(array $post_form): bool
    {
        try {
            // Creation d'une instance de connexion à la base de données
            $pdo = Database::createInstancePDO();

            // requête SQL pour ajouter un employé avec des marqueurs nominatifs pour faciliter le bindValue
            $sql = 'INSERT INTO `employees` (`exp_date`, `exp_amount_ttc`, `exp_amount_ht`, `exp_description`, `exp_proof`, `exp_cancel_reason`, `exp_decisions_date`, `exp_id_type`, `exp_id_statut`, `exp_id_employee`)
            VALUES (:lastname, :firstname, :phonenumber, :mail, :password)';

            // On prépare la requête avant de l'exécuter
            $stmt = $pdo->prepare($sql);

            // On injecte les valeurs dans la requête et nous utilisons la méthode bindValue pour se prémunir des injections SQL
            // bien penser à hasher le mot de passe
            $stmt->bindValue(':password', password_hash($post_form['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);

            $stmt->bindValue(':firstname', htmlspecialchars($post_form['firstname']), PDO::PARAM_STR);
            $stmt->bindValue(':phonenumber', htmlspecialchars($post_form['phoneNumber']), PDO::PARAM_STR);
            $stmt->bindValue(':lastname', htmlspecialchars($post_form['lastname']), PDO::PARAM_STR);
            $stmt->bindValue(':mail', htmlspecialchars($post_form['mail']), PDO::PARAM_STR);

            // On exécute la requête, elle sera true si elle réussi, dans le cas contraire il y aura une exception
            return $stmt->execute();
        } catch (PDOException $e) {
            // test unitaire pour vérifier que l'employé n'a pas été ajouté et connaitre la raison
            // echo 'Erreur : ' . $e->getMessage();
            return false;
        }
    }
    
}
