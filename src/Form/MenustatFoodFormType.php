<?php

namespace App\Form;

use App\Entity\MenustatFood;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
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
                ,NumberType::class,[
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
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ]
            )
            ->add('FatAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ])
            ->add('SaturatedFatAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ])
            ->add('TransFatAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ])
            ->add('CholesterolAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ])
            ->add('SodiumAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ])
            ->add('PotassiumAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ])
            ->add('CarbAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ])
            ->add('ProteinAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ])
            ->add('SugarAmount'
            ,NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                )
            ])
            ->add('FiberAmount'
            ,NumberType::class,[
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
            ,NumberType::class,[
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
