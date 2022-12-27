<?php

namespace App\Form;

use App\Entity\MenustatFood;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MenustatFoodFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Restaurant'
            ,TextType::class,[
                'attr' => array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ]
            )
            ->add('FoodCategory'
            ,TextType::class,[
                'attr' => array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ]
            )
            ->add('Description'
            ,TextType::class,[
                'attr' => array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ]
            )
            ->add('ItemDescription'
            ,TextType::class,[
                'attr' => array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ]
            )
            ->add('ServingSize'
            )
            ->add('ServingSizeText'
            ,TextType::class,[
                'attr' => array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ]
            )
            ->add('ServingSizeUnit'
            ,TextType::class,[
                'attr' => array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ]
            )
            ->add('ServingSizeHousehold'
            ,TextType::class,[
                'attr' => array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ]
            )
            ->add('EnergyAmount')
            ->add('FatAmount')
            ->add('SaturatedFatAmount')
            ->add('TransFatAmount')
            ->add('CholesterolAmount')
            ->add('SodiumAmount')
            ->add('PotassiumAmount')
            ->add('CarbAmount')
            ->add('ProteinAmount')
            ->add('SugarAmount')
            ->add('FiberAmount')
            ->add('Date')
            ->add('Quantity')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MenustatFood::class,
        ]);
    }
}
