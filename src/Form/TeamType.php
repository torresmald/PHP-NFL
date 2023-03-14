<?php

namespace App\Form;

use App\Entity\Stadium;
use App\Entity\Team;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\Dropzone\Form\DropzoneType;


class TeamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('code', TextType::class, [
            'label'=>'Team Code',
            'attr' => array(
                'placeholder' => 'Enter the Team Code'
            )
        ])
            ->add('name', TextType::class, [
                'label'=>'Team Name',
                'attr' => array(
                    'placeholder' => 'Enter the Team Name'
                )
            ])
            ->add('city', TextType::class, [
                'label'=>'City Name',
                'attr' => array(
                    'placeholder' => 'Enter the City Name'
                )
            ])
            ->add('division', TextType::class, [
                'label'=>'Division Name',
                'attr' => array(
                    'placeholder' => 'Enter the Division Name'
                )
            ])
            ->add('established', TextType::class, [
                'label'=>'Established Year',
                'attr' => array(
                    'placeholder' => 'Enter the Established Year'
                )
            ])
            ->add('headCoach', TextType::class, [
                'label'=>'Head Coach Name',
                'attr' => array(
                    'placeholder' => 'Enter the Head Coach Name'
                )
            ])
            ->add('owner', TextType::class, [
                'label'=>'Owner Name',
                'attr' => array(
                    'placeholder' => 'Enter the Owner Name'
                )
            ])
            ->add('logoImage', DropZoneType::class, ['mapped' => false])
            ->add('stadiums', EntityType::class, [
                'class' => Stadium::class,
                'choice_label' => 'name',
                'multiple' => true
            ])
            ->add('send', SubmitType::class)    
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Team::class,
        ]);
    }
}
