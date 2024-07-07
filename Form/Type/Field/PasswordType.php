<?php 

namespace App\Form\Type\Field;

use Symfony\Component\Form\Extension\Core\Type\PasswordType as PassType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Form Type pour les champs saisies de mot de passe avec message invalide personnalisé 
 * et possibilité de désactiver l'emboîtement dans une div.
 */
class PasswordType extends PassType
{
    /**
     * Configurer les options du Form Type
     * 
     * @param OptionsResolver $resolver Gère les options du formulaire
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults([
            'no_div' => null,  // désactive l'emboitement dans une div
        ]);

        $resolver->setAllowedTypes('no_div', ['null', 'bool']);
    }

    /**
     * Passer les options du Form Type dans le Twig
     * 
     * @param FormView $view Représente la Vue Twig du Form Type
     * @param FormInterface $form Représente le Form Type en PHP
     * @param array $options Les options du Form Type
     */
    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        parent::buildView($view, $form, $options);
        $view->vars['noDiv'] = $options['no_div'];
    }
}