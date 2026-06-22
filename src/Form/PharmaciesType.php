<?php

namespace App\Form;

use App\Entity\Pharmacies;
use App\Form\DataTransformer\HoraireGardeTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\JsonType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PharmaciesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de la pharmacie'
            ])
            ->add('adresse', TextType::class, [
                'label' => 'Adresse'
            ])
            ->add('telephone', TextType::class, [
                'label' => 'Téléphone'
            ])
            ->add('latitude', NumberType::class, [
                'label' => 'Latitude',
                'scale' => 8
            ])
            ->add('longitude', NumberType::class, [
                'label' => 'Longitude',
                'scale' => 8
            ])


->add('horaireGarde', TextareaType::class, [
        'label' => 'Horaires de garde',
        'required' => false,
        'attr' => ['rows' => 10],
    ])

            ->add('gardeAujourdhui', CheckboxType::class, [
                'label' => 'De garde aujourd\'hui',
                'required' => false
            ])
            ->get('horaireGarde')
            ->addModelTransformer(new HoraireGardeTransformer())
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pharmacies::class,
        ]);
    }
}
