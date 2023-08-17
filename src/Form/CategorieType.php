<?php

namespace App\Form;

use App\Entity\Categorie;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategorieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isActive', CheckboxType::class, ['required'=>false, 'label'=>'Active', 'attr'=>
            ["class"=>"form-check_input"], 'row_attr'=>["class"=>"form-switch mb-2"]])
            ->add('nom', TextType::class, ['required'=>true])
            ->add('description', CKEditorType::class, ['required'=>false])
            ->remove('imageName')
            ->remove('updatedAt', DateTimeType::class, ['widget'=>'single_text'])
            ->remove('slug')
            ->add('imageFile', FileType::class, ['required'=>false, "label"=>"Image"] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Categorie::class,
        ]);
    }
}
