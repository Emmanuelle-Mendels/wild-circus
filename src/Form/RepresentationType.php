<?php

namespace App\Form;

use App\Entity\Representation;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RepresentationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateTimeType::class, [
                'placeholder' => [
                    'day' => 'Jour', 'month' => 'Mois', 'year' => 'Année',
                    'hour' => 'Heure', 'minute' => 'Minute',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Representation::class,
        ]);
    }
}
