<?php

namespace App\Form;

use App\Entity\Paiements;
use App\Entity\Patients;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaiementsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('montant')
            ->add('methodePaiement')
            ->add('statut')
            ->add('datePaiement')
            ->add('referenceTransaction')
            ->add('dateConfirmation')
            ->add('patients', EntityType::class, [
                'class' => Patients::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Paiements::class,
        ]);
    }
}
