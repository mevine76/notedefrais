<?php

class Administrators {
    public static function authenticateAdministrator($email, $password) {
        $db = Database::connect();

        $sql = "SELECT * FROM administrators WHERE adm_mail = :email";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($password, $admin['adm_password'])) {
            return true;
        }

        return false;
    }
}