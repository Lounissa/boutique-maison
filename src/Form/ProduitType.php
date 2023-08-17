<?php

namespace App\Form;

use App\Entity\Produit;
use App\Form\ImageType;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isActive', CheckboxType::class, ['required'=>false, 'label'=>'Active', 'attr'=>
              ["class"=>"form-check_input"], 'row_attr'=>["class"=>"form-switch mb-2"]])
            ->add('nom', TextType::class, ['required'=>true])
            ->add('description', CKEditorType::class, ['required'=>true])
            ->add('prix', MoneyType::class, ['required'=>true] )
            ->remove('updatedAt', DateTimeType::class, ['widget'=>'single_text'])
            ->Remove('slug')
            ->add('categorie', EntityType::class, ['class'=>Categorie::class, 'choice_label'=>'nom', 'required'=>true])
            // https://symfony.com/doc/currant/form/form_collection.html
            ->add('images', CollectionType::class, ['entry_type'=>ImageType::class, 
            "allow_add"=>true,"by_reference"=>false, 'allow_delete'=>true, 'label'=>false, 
            'entry_options'=>['fromProduit'=>true, 'isNew'=>$options['isNew']]])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
            'isNew' => true,
        ]);
    }
}
