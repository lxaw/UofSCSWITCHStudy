<?php

namespace App\Form;

use App\Entity\Food;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class FoodFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('FoodName',TextType::class,[
                'attr'=> array(
                    'class'=>'form-control',
                    'type'=>'text'
                ),
                'required' => false
            ])
            ->add('Restaurant',TextType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'text'
                ),
                'required' => false
            ])
            ->add('FoodCategory',TextType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'text'
                ),
                'required' => false
            ])
            ->add('ServingSize',NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                ),
                'required' => false
            ])
            ->add('ServingSizeUnit',TextType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'text'
                ),
                'required' => false
            ])
            ->add('EnergyAmount',NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                ),
                'required' => false
            ])
            ->add('EnergyUnit',TextType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'text'
                ),
                'required' => false
            ])
            ->add('FatAmount',NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                ),
                'required' => false
            ])
            ->add('FatUnit',TextType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'text'
                ),
                'required' => false
            ])
            ->add('CarbAmount',NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                ),
                'required' => false
            ])
            ->add('CarbUnit',TextType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'text'
                ),
                'required' => false
            ])
            ->add('ProteinAmount',NumberType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'number'
                ),
                'required' => false
            ])
            ->add('ProteinUnit',TextType::class,[
                'attr'=>array(
                    'class'=>'form-control',
                    'type'=>'text'
                ),
                'required' => false
            ])
            // ->add('User')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Food::class,
        ]);
    }
}
