<?php
class ExpenseModel {
    public static function createExpense($date, $amountTTC, $amountHT, $description, $proof, $typeID, $employeeID) {
        $db = Database::connect();

        $sql = "INSERT INTO expense_report (exp_date, exp_amount_ttc, exp_amount_ht, exp_description, exp_proof, typ_id, emp_id) 
                VALUES (:date, :amountTTC, :amountHT, :description, :proof, :typeID, :employeeID)";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':amountTTC', $amountTTC);
        $stmt->bindParam(':amountHT', $amountHT);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':proof', $proof);
        $stmt->bindParam(':typeID', $typeID);
        $stmt->bindParam(':employeeID', $employeeID);

        return $stmt->execute();
    }

    public static function getAllExpenses() {
        $db = Database::connect();

        $sql = "SELECT * FROM expense_report";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
