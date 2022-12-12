<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFunctions(){
        return array(
            'class' => new TwigFunction('get_class',array($this,'getClass'))
        );
    }
    public function getName(){
        return 'class_twig_extension';
    }
    public function getClass($object){
        return (new \ReflectionClass($object)) -> getShortName();
    }
}