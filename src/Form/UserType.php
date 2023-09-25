<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Adresse;
use App\Form\AvatarType;
use App\Form\AdresseType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('avatar', AvatarType::class, ['label'=> false])
            ->add('email')
            ->remove('roles')
            ->remove('password')
            ->add('plainPassword', RepeatedType::class, [
                'type'=> PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent être identiques.',
                'required' => false,
                'first_options' => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmation du mot de passe'],
                'mapped' => false,
                'help' => 'Le mot de passe doit contenir 6 caractères minimum.'
            ])
            ->add('nom')
            ->add('prenom')
            ->add('tel')
            ->remove('isVerified')
            ->add('modifier', SubmitType::class, ["attr"=>["class"=>"btn btn-success mt-3"]])
            ->add('adresses', CollectionType::class, ['entry_type'=>AdresseType::class, "allow_add"=>true, 
            "by_reference"=>false, 'allow_delete'=>true, 'label'=>false, 'entry_options'=>['fromUser'=>true]])
            ;    
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
           
        ]);
    }
}
