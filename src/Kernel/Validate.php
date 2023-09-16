<?php

namespace Giaco\ProjetPoo\Kernel;


class Validate 
{
    /**
     * Validation if all form fields are completed
     *
     * @param array $form array issu du form($_GET ou $_POST)
     * @param array $champs array listant des champs obligatoire
     * @return bool
     */
    public static function validate(array $form, array $champs): bool
    {
        foreach($champs as $champ){
            if(!isset($form[$champ]) || empty($form[$champ])){
                return false;
            }
        }
        return true;
    }

    /**
     * Validation format email
     *
     * @param string $email
     * @return boolean
     */
    public static function validateEmail(string $email): bool
    {
        $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        if (preg_match($pattern, $email)) {
            return true; 
        } 
        return false; 
    }
    

    public static function validatePassword($password)
    {
        $pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*[\W_]).{8,}$/';

        if (preg_match($pattern, $password)) {
            return true; 
        } 
        return false; 
    }


}