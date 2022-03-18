<?php

namespace App\Form;

use App\Entity\Conseiller;
use App\Entity\Destination;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class ConseillerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('email', EmailType::class, [
            'required' => 'false'
        ])
            ->add('roles',ChoiceType::class,[
                'choices'  => [
                    'ROLE_CONSEILLER' => 'ROLE_CONSEILLER',
                    'ROLE_ADMIN' => 'ROLE_ADMIN',   
                ], 
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('password',PasswordType::class)
            ->add('nom', TextType::class, [
                'required' => 'false'
            ])
            ->add('prenom', TextType::class, [
                'required' => 'false'
            ])
            ->add('photoFile',VichImageType::class,[
                'label' => 'photo',
                'download_label' => 'false'
            ])
            ->add('referent')
            ->add('description')
            // ->add('maj')
            ->add('specialite', EntityType::class,[
                'class' => Destination::class ,
                'choice_label' => 'titre',
               
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Conseiller::class,
        ]);
    }
}
