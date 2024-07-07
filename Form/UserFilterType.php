<?php
// src/Form/UserFilterType.php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('search', TextType::class, [
                'required' => false,
                'label' => 'Recherche',
            ])
            ->add('profileType', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'Admin' => 'ROLE_ADMIN',
                    'User' => 'ROLE_USER',
                    // Ajoutez d'autres types de profils si nécessaire
                ],
                'label' => 'Type de Profil',
            ])
            ->add('status', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'Actif' => 'active',
                    'Inactif' => 'inactive',
                    // Ajoutez d'autres statuts si nécessaire
                ],
                'label' => 'Statut',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
