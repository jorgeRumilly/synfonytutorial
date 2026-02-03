<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => ['class' => 'form-control','placeholder' => 'Enter product name'],
                'label' => 'Nom du produit',
                'required' => true,
            ])
            ->add('description', TextareaType::class, [
                'attr' => ['rows' => 5, 'class' => 'form-control'],
            ])
            ->add('price', MoneyType::class, [
                'attr' => ['class' => 'form-control','placeholder' => 'Enter product price'],
                'label' => 'Prix du produit',
                'required' => true,
                'currency' => 'EUR',
            ])
            ->add('image')
            ->add('date_add', DateType::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
                'label' => 'Date d\'ajout',
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_value' => 'id',
                'choice_label' => 'name',
                'placeholder' => 'Select a category',
                'attr' => ['class' => 'form-select form-control'],
                'label' => 'Catégorie',
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Add Product',
                'attr' => ['class' => 'btn btn-primary'],
            ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
