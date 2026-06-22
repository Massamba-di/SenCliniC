<?php

namespace App\Form;

use App\Entity\Creneaux;
use App\Entity\Medecins;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreneauxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date',DateType::class,[
                'widget'=>'single_text',
            ])
            ->add('heureDebut',TimeType::class,[])
            ->add('heureFin',TimeType::class,[])
            ->add('placesDisponibles',IntegerType::class,[])
            ->add('actif')
            ->add('medecins', EntityType::class, [
                'class' => Medecins::class,
                'choice_label' => 'nom',
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
