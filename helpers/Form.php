<?php

class Form
{
    /**
     * Permet de sécuriser les données en appliquant les fonctions trim, stripslashes et htmlspecialchars
     * @param string Données à sécuriser et à rendre safe
     * @return string Donnée safe
     */
    public static function safeData($value): string
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        return $value;
    }


    /**
     * Permet de transformer une date au format FR en date au format US
     * @param string Date FR
     * @return string Date US
     */
    // public static function formatDateFrToUs($dateFR): string
    // {
    //     $date = date_create_from_format("j/m/Y", $dateFR);
    //     return $date_format = date_format($date, "Y-m-d");
    // }
}
