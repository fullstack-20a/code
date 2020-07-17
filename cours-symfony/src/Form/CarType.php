<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

// EXTENSION PHP Namespace Resolver AIDE BIEN... ;-p
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // ICI ON DONNE LA LISTE DES CHAMPS DU FORMULAIRE
        // LE HTML SERA CONSTRUIT DANS L'ORDRE DES add
        $builder
            ->add('marque')
            ->add('modele')
            ->add('couleur', TextareaType::class)
            ->add('kilometrage')
            ->add('immatriculation')
            ->add('carburant')
            ->add('chevaux', RangeType::class, [ 'attr' => [ 'min' => 5, 'max' => 20 ] ] )
            // ON POURRAIT AJOUTER LE BOUTON SI ON VEUT...
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
