<?php

namespace App\FoodDatabaseInteraction\Classes;

class Util{
    function __construct(){

    }
    public function strGetImgPath($strFoodName,$strRestaurantName,$strSourcePath){
        // Return imgs path
        //
        $strFormattedFoodName = preg_replace('/[\W]/','',$strFoodName);

        $strFormattedRestName= preg_replace('/[\W]/','',$strRestaurantName);

        return 
            $strSourcePath."/".$strFormattedRestName."/".$strFormattedFoodName.".jpeg";
    }

    public function strGetImgPathNoRestaurant($strFoodName,$strSourcePath){
        // for usda_no_branded
        // TO DO:
        // See if better way to do this.
        $strFormattedFoodName = preg_replace('/[\W]/','',$strFoodName);

        return 
            $strSourcePath."/".$strFormattedFoodName.".jpeg";
    }
    function strReplaceIfNull($strValue, $strReplacement){
        // replaces $value if NULL
        if($strValue!= NULL && $strValue != 0){
            return $strValue;
        }
        return $strReplacement;
    }
}