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
        //Parcourir les champs du form
        foreach($champs as $champ){
            //Verification si absent ou vide
            if(!isset($form[$champ]) || empty($form[$champ])){
                
                return false;
            }
        }
        return true;
    }


    
}