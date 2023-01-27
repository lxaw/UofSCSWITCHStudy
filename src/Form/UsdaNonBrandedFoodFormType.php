<?php

namespace App\Form;

use App\Entity\UsdaNonBrandedFood;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class UsdaNonBrandedFoodFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Description'
            ,TextType::class,[
                'attr' => array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ] 
            )
            ->add('ServingAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ]
            )
            ->add('ServingText'
            ,TextType::class,[
                'attr' => array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ] 
            )
            ->add('ServingSize'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ]
            )
            ->add('ProteinUnit'
            ,TextType::class,[
                'attr' => array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ] 
            )
            ->add('CarbUnit'
            ,TextType::class,[
                'attr' => array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ] 
            )
            ->add('FatUnit'
            ,TextType::class,[
                'attr' => array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ] 
            )
            ->add('FatAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ]
            )
            ->add('CarbAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ]
            )
            ->add('EnergyAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ]
            )
            ->add('ProteinAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ]
            )
            ->add('FiberAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ]
            )
            ->add('FiberUnit'
            ,TextType::class,[
                'attr' => array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ] 
            )
            ->add('PotassiumAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ]
            )
            ->add('PotassiumUnit'
            ,TextType::class,[
                'attr' => array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ] 
            )
            ->add('Date'
            ,DateType::class,[
                'attr'=>array(
                    'class'=>'form-control'
                )
            ]
            )
            ->add('Quantity'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UsdaNonBrandedFood::class,
        ]);
    }
}
