<?php

namespace App\Form;

use App\Entity\Event;
use DateTime;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('pictureFile', VichImageType::class, [
                'label' => 'Image à télécharger',
                'help' => 'le fichier ne doit pas dépasser ' . Event::MAX_SIZE,
                'required' => false,
                'allow_delete' => true,
                'download_uri' => true,
                'download_link' => false,
                'delete_label' => 'Supprimer cette image',
            ])
            ->add('description', TextareaType::class)
            ->add('focus')
            ->add('date', DateType::class, [
                'label' => 'Date: jour/mois/année',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'html5' => false,
                'attr' => ['class' => 'js-datepicker col mb-3'],
                'data' => new DateTime("now"),
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
