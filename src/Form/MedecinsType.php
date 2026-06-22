<?php

namespace App\Form;

use App\Entity\Medecins;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedecinsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class)
            ->add('prenom',TextType::class)
            ->add('specialite',TextType::class)
            ->add('numeroLicence', NumberType::class)
            ->add('biographie', TextareaType::class)
            ->add('photo', FileType::class, [  'label' => 'Photo de profil',
                'mapped' => false,
                'required' => false,
                'data_class' => null, ])
            ->add('joursTravail',ChoiceType::class, [
                'choices'=>[
                    'lundi'=>'Lundi',
                    'mardi'=>'Mardi',
                    'mercredi'=>'Mercredi',
                    'jeudi'=>'Jeudi',
                    'vendredi'=>'Vendredi',
                    'samedi'=>'Samedi',

                ],
                'multiple'=>true,
                'expanded'=>true,

            ])
            ->add('heureDebut', TimeType::class)
            ->add('heureFin', TimeType::class)
            ->add('dureeConsultation', IntegerType::class, [
                'label' => 'Durée de consultation (minutes)',
            ])
            ->add('tarifConsultation',MoneyType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Medecins::class,
        ]);
    }
}
