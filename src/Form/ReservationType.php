<?php

namespace App\Form;

use App\Entity\Representation;
use App\Entity\Reservation;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name', TextType::class, [
                'label' => "Nom, Prénom"
            ])
            ->add('email', EmailType::class)
            ->add('phone', TextType::class, [
                'label' => "Téléphone"
            ])
            ->add('representation', EntityType::class, [
                'class' => Representation::class,
                'choice_label' => 'DateString',
                'label' => 'Représentation',
            ])
            ->add('category', ChoiceType::class, [
                'choices' => Reservation::CATEGORY,
                'label' => "Catégorie",
            ])
            ->add('nb_adult', IntegerType::class, [
                'label' => "Nombre de billets plein tarif"])
            ->add('nb_child', IntegerType::class, [
                'label' => "Nombre de billets tarif réduit",
                'help' => "Le tarif réduit est applicable pour les enfants de moins de 14 ans, les demandeurs d'emploi, les étudiant et détenteur d'une carte d'invalidité."]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
