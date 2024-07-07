<?php

namespace App\Form\Type\Set;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Contracts\Translation\TranslatorInterface;

use App\Form\Type\Field\ImageButtonType;
use App\Form\Type\Field\PasswordType;

/**
 * Form Type pour les champs saisies de mot de passe avec un bouton pour
 * afficher ou masquer le mot de passe
 */
class ShowHidePasswordType extends AbstractType
{   

    protected TranslatorInterface $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * Configurer les options du Form Type
     * 
     * @param OptionsResolver $resolver Gère les options du formulaire
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'label' => false,  // désactiver le label
            'placeholder' => 'global.password',
            'invalid_field_name' => 'global.password',  // nom du champ affiché pour l'erreur champ requis
        ]);

        $resolver->setAllowedTypes('placeholder', ['null', 'string']);
        $resolver->setAllowedTypes('invalid_field_name', ['null', 'string']);
    }

    /**
     * Construit le formulaire
     * 
     * @param FormBuilderInterface $builder Le constructeur du formulaire 
     * @param array $options Les arguments à passer si besoin 
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('password', PasswordType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => $options['placeholder'],
                    'data-invalid-message' => $this->translator->trans('global.field_required', [  // Erreur affichée lorsque l'utilisateur ne saisie pas le champ
                        'FIELD_NAME' => $this->translator->trans($options['invalid_field_name'])
                    ]),
                ],
                'no_div' => true,
            ])
            ->add('showHideButton', ImageButtonType::class, [
                'button_classes' => 'toggle-password',
                'img_url' => 'images/picto/visibility.svg',
                'img_alt' => 'Afficher le mot de passe',
            ]);
    }
}