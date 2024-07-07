<?php

namespace App\Service;

/**
 * Fonctions bas niveau pour simplifier l'écriture du PHP
 */
class Shortcut
{
    /**
     * Convertir du texte en camelCase à partir d'un séparateur. 
     * Converti par défaut depuis le snake_case.
     * 
     * @param string $input La chaîne en entré
     * @param string $separator Le séparateur. 
     */
    public function camelize(string $input, string $separator = '_'): string
    {
        return lcfirst(str_replace($separator, '', ucwords($input, $separator)));
    }
}