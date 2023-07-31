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

    private PDO $db;

    // nous allons utiliser la méthode magique __get pour récupérer les propriétés de l'objet en dehors de la classe
    function __get(string $name)
    {
        return $this->$name;
    }


    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=expense', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Fonctions pour gérer les notes de frais, à compléter selon vos besoins

    // Exemple : Ajouter une note de frais pour un employé
    public function addExpense($emp_id, $exp_date, $exp_amount_ttc, $exp_amount_ht, $exp_description, $exp_proof, $typ_id)
    {
        try {
            $query = $this->db->prepare("INSERT INTO expense_report (emp_id, exp_date, exp_amount_ttc, exp_amount_ht, exp_description, exp_proof, typ_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
            return $query->execute([$emp_id, $exp_date, $exp_amount_ttc, $exp_amount_ht, $exp_description, $exp_proof, $typ_id]);

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }

    }

    // Exemple : Récupérer les notes de frais pour un employé donné
    public function getEmployeeExpenses($emp_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM expense_report WHERE emp_id = ?");
        $stmt->execute([$emp_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Exemple : Valider une note de frais par un administrateur
    public function validateExpense($exp_id)
    {
        $stmt = $this->db->prepare("UPDATE expense_report SET sta_id = 2 WHERE exp_id = ?");
        $stmt->execute([$exp_id]);
    }

    // Autres fonctions de gestion des notes de frais : modifier, supprimer, etc.

    public function checkAdminCredentials($email, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM administrators WHERE adm_mail = ?");
        $stmt->execute([$email]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($password, $admin['adm_password'])) {
            return true;
        }

        return false;
    }

    public function checkEmployeeCredentials($email, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM employees WHERE emp_mail = ?");
        $stmt->execute([$email]);
        $employee = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($employee && password_verify($password, $employee['emp_password'])) {
            return true;
        }

        return false;
    }
    
}
