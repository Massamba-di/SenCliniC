<?php

namespace App\Form;

use App\Entity\Creneaux;
use App\Entity\Medecins;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreneauxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date')
            ->add('heureDebut')
            ->add('heureFin')
            ->add('placesDisponibles')
            ->add('actif')
            ->add('medecins', EntityType::class, [
                'class' => Medecins::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Creneaux::class,
        ]);
    }
}
