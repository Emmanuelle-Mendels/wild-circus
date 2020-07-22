<?php

namespace App\Form;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('pictureFile', VichImageType::class, [
                'label' => 'Image à télécharger',
                'help' => 'le fichier ne doit pas dépasser ' . Event::MAX_SIZE,
                'required' => false,
                'allow_delete' => true,
                'download_uri' => true,
                'download_link' => false,
                'delete_label' => 'Supprimer cette image',
            ])
            ->add('description')
            ->add('focus')
            ->add('date');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
