<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', FileType::class, ["required"=>false, "label"=>"Image"])
            ->add('nom', TextType::class,["required"=>false])
            ->remove('imageName')
            ->add('quantite')
            ->add('prix', MoneyType::class, ['required'=>true])
            ->remove('updatedAt')
            ->remove('slug')
            ->add('produit', EntityType::class, ["class"=>Produit::class, "multiple"=>true, "required"=>false, "attr"=>["class"=>"select2"]])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
