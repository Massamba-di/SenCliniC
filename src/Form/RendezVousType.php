<?php

namespace App\Form;

use App\Entity\Creneaux;
use App\Entity\Medecins;
use App\Entity\Paiements;
use App\Entity\Patients;
use App\Entity\RendezVous;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RendezVousType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date')
            ->add('heure')
            ->add('status')
            ->add('montant')
            ->add('motif')
            ->add('notes')
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('updatedAt')
            ->add('paiement', EntityType::class, [
                'class' => Paiements::class,
                'choice_label' => 'id',
            ])
            ->add('creneau', EntityType::class, [
                'class' => Creneaux::class,
                'choice_label' => 'id',
            ])
            ->add('medecin', EntityType::class, [
                'class' => Medecins::class,
                'choice_label' => 'id',
            ])
            ->add('patients', EntityType::class, [
                'class' => Patients::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RendezVous::class,
        ]);
    }
}
