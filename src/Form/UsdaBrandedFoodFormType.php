<?php

namespace App\Form;

use App\Entity\UsdaBrandedFood;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsdaBrandedFoodFormType extends AbstractType
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
            ->add('BrandName'
            ,TextType::class,[
                'attr' => array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ] 
            )
            ->add('BrandOwner'
            ,TextType::class,[
                'attr' => array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ] 
            )
            ->add('Ingredients'
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
            ->add('ServingSizeUnit'
            ,TextType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ]
            )
            ->add('FoodCategory'
            ,TextType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ]
            )
            ->add('SugarAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ]
            )
            ->add('SugarUnit'
            ,TextType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ]
            )
            ->add('FattyAcidTotalSaturatedAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ]
            )
            ->add('FattyAcidTotalSaturatedUnit'
            ,TextType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ]
            )
            ->add('CholesterolAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ]
            )
            ->add('CholestolUnit'
            ,TextType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ]
            )
            ->add('VitaminCTotalAscorbidAcidAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ]
            )
            ->add('VitaminCTotalAscorbicAcidUnit'
            ,TextType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ]
            )
            ->add('VitaminCTotalAscorbicAcidAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ]
            )
            ->add('VitaminDAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ]
            )
            ->add('VitaminDUnit'
            ,TextType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ]
            )
            ->add('VitaminAAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ]
            )
            ->add('VitaminAUnit'
            ,TextType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ]
            )
            ->add('SodiumAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ]
            )
            ->add('SodiumUnit'
            ,TextType::class,[
                'attr'=>array(
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
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ]
            )
            ->add('IronAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ]
            )
            ->add('IronUnit'
            ,TextType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'text'
                )
            ]
            )
            ->add('CalciumAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ]
            )
            ->add('CalciumUnit'
            ,TextType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'text'
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
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'text'
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
            ->add('EnergyUnit'
            ,TextType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'text'
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
            ->add('CarbUnit'
            ,TextType::class,[
                'attr'=>array(
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
            ->add('FatUnit'
            ,TextType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'text'
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
            ->add('ProteinUnit'
            ,TextType::class,[
                'attr'=>array(
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
            'data_class' => UsdaBrandedFood::class,
        ]);
    }
}
