<?php

namespace Giaco\ProjetPoo\Utils;


class MyFunction {


    public static function dump($var)
    {
        echo '<pre>';
            var_dump($var);
        echo '</pre>';
    }


    /**
     * Display date => format fr d/m/Y (20/01/2023)
     *
     * @param [type] $date
     * @return void
     */
    public static function dateFormat($date)
    {
        return date("d/m/Y", strtotime($date));
    }

}