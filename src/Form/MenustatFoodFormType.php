<?php

namespace App\Form;

use App\Entity\MenustatFood;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
                ,IntegerType::class,[
                    'attr'=> array(
                        'class'=>'form-control',
                        'type'=>'number'
                    )
                ]
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
            ->add('EnergyAmount'
            ,IntegerType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ]
            )
            ->add('FatAmount'
            ,IntegerType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ])
            ->add('SaturatedFatAmount'
            ,IntegerType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ])
            ->add('TransFatAmount'
            ,IntegerType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ])
            ->add('CholesterolAmount'
            ,IntegerType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ])
            ->add('SodiumAmount'
            ,IntegerType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ])
            ->add('PotassiumAmount'
            ,IntegerType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ])
            ->add('CarbAmount'
            ,IntegerType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ])
            ->add('ProteinAmount'
            ,IntegerType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ])
            ->add('SugarAmount'
            ,IntegerType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ])
            ->add('FiberAmount'
            ,IntegerType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ])
            ->add('Date'
            ,DateType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                )
            ])
            ->add('Quantity'
            ,IntegerType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MenustatFood::class,
        ]);
    }
}
