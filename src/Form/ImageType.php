<?php

namespace App\Form;

use App\Entity\Image;
use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', FileType::class, ['required'=>$options['isNew'], 'label'=>'Image', "attr"=>["class"=>"select-image"]])
            ->remove('imageName')
            ->remove('updatedAt', DateTimeType::class, ['widget'=>'single_text'])
            //l'option data pdermet de définir une valeur affichée par défaut 
            ->add('rankOrder', IntegerType::class, ['required'=>true, 'data'=>1, "attr"=>["min"=>1]])
            
        ;
        if($options["fromProduit"]){
             $builder
            // pour rappel choice_label permet de choisir le champ qui sera affiché dans le select 
            // auquel cas on n'a pas besoin de la méthod __toString() dans l'entité
            ->add('produit', EntityType::class, ["class"=>Produit::class, "choice_label"=>'Nom'] )
            ;
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Image::class,
            'fromProduit'=>false,
            'isNew' =>true,
        ]);
    }
}
