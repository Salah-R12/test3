<?php

namespace App\Enum;

/**
 * Le role d'un utilisateur
 */
enum Role: string {
    case ROLE_CES = 'ROLE_CES';
    case ROLE_TC = 'ROLE_TC';
    case ROLE_EC = 'ROLE_EC';
    case ROLE_NV = 'ROLE_NV';
}