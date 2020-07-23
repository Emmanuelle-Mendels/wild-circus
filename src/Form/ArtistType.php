<?php

namespace App\Form;

use App\Entity\Artist;
use App\Entity\Performance;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ArtistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('pictureFile', VichImageType::class, [
                'label' => 'Image à télécharger',
                'help' => 'le fichier ne doit pas dépasser ' . Artist::MAX_SIZE,
                'required' => false,
                'allow_delete' => true,
                'download_uri' => true,
                'download_link' => false,
                'delete_label' => 'Supprimer cette image',
            ])
            ->add('speciality', TextType::class, [
                'label' => 'Spécialité',
            ])
            ->add('text', TextareaType::class, [
                'label' => 'Présentation',
            ])
            ->add('focus')
            ->add('performances',  EntityType::class, [
                'class' => Performance::class,
                'choice_label' => 'name',
                'expanded' => true,
                'multiple' => true,
                'by_reference' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Artist::class,
        ]);
    }
}
