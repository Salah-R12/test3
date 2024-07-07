<?php

namespace App\Enum;

/**
 * Le status d'un utilisateur
 */
enum Status: string {
    case ACTIVE = 'Active';
    case INACTIVE = 'Inactive';
    case MUST_CHANGE_PASSWORD = 'MustChangePassword';  // Si l'utilisateur doit changer son mot de passe
}