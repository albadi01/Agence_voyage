<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

        ->add('email', EmailType::class, [
            'required' => false
        ])
        ->add('password')
        ->add('prenom', TextType::class, [
            'required' => false
        ])
        ->add('nom', TextType::class, [
            'required' => false
        ])
        ->add('telephone')

           
            ->add('adresse')
            ->add('ville')
            ->add('code_postal')
          
            // ->add('reservations')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
