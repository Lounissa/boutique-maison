<?php

namespace App\Form;

use App\Form\UserType;
use App\Entity\Adresse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class AdresseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rue')
            ->add('ville')
            ->add('pays', CountryType::class, [
                'preferred_choices'=> ['FR'],
            ])
            ->add('codePostal')
            ->remove('complement')
            ->remove('users')
        ;
                
        if(!$options['fromUser']){
            $builder
            ->add('users', CollectionType::class, ['entry_type'=>UserType::class, "allow_add"=>true, "by_reference"=>false, 'allow_delete'=>true, 'label'=>false])
        ; 
        }
       
       
            }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adresse::class,
            'fromUser'=>false,
        ]);
    }
}
