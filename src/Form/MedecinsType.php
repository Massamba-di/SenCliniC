<?php

namespace App\Form;

use App\Entity\Medecins;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedecinsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('specialite')
            ->add('numeroLicence')
            ->add('biographie')
            ->add('photo')
            ->add('joursTravail')
            ->add('heureDebut')
            ->add('heureFin')
            ->add('dureeConsultation')
            ->add('tarifConsultation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Medecins::class,
        ]);
    }
}
