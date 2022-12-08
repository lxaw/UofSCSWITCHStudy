<?php

namespace App\FoodDatabaseInteraction\Classes;
use App\FoodDatabaseInteraction\Configs\DatabaseConfig;
use App\FoodDatabaseInteraction\Classes\Util;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// see:
// https://stackoverflow.com/questions/2905696/method-for-creating-php-templates/pie_charts-ie-html-with-variables

// loads data into html and
// returns strings for js
//

class TemplateLoader{

    function __construct($rootDir = NULL){
        $this->ROOT_DIR = $rootDir;
        $this->_Util = new Util();
    }
    
    // Populates HTML template with data from array (dictionary)
    // Input: $arrData (array of str), $strFilePath (str)
    // Output: string of html template 
    //
    function strTemplateToStr($arrData,$strFilePath){
        // load the template boday as str
        //
        $strTempBody = file_get_contents($strFilePath);

        // populate the template
        // values to populate in template are in sqaure brackets, ie
        // [VALUE]
        //
        foreach($arrData as $key=>$value){
            $strTempBody = str_replace("[$key]",$value,$strTempBody);
        }

        // return the template as str
        //
        return $strTempBody;
    }

    // populates usda_non_branded modal
    //
    function strPopulateUsdaNonBrandedModal($arrUsdaNBData){
        // usda nb array looks like
        //
        // array(
        //      'data_type'-> [DATABASE_NAME]
        //      'fdc_id'-> [FDC_ID]
        //      'description'->[DESCRIPTION]
        //      'img_src'->[IMG_SRC]
        //      
        //      array(
        //          [ENTRY_1],
        //          [ENTRY_2],
        //          ...
        //      )
        //
        //)
        //)

        // load the modal html
        //
        $strModalHtml = file_get_contents($this->ROOT_DIR."/templates/pie_charts/usda_non_branded/popup_v1.html");

        // first create the select
        //
        $arrSelectArgs = array();

        // store all the modal data in one big str
        // this str is decoded by js and then used to
        // separate each data by serving size
        //
        $strModalDatas = "";

        // need to keep track if first loop 
        // first loop we need to use a visible modal data,
        // the rest can be invisible
        // intCounter also used for id of div popups
        //
        $intCounter = 0;

        foreach($arrUsdaNBData as $subElement){
            if(gettype($subElement) == 'array'){
                /*
                ------------
                Create select
                ------------
                */
                // create array argumnts for select
                //
                $arrSelectValues = array(
                    'value'=>$subElement['serving_text'],
                    'text'=>'portion: '.$subElement['serving_text']
                );
                // append to args
                array_push($arrSelectArgs,$arrSelectValues);
                /*
                ------------
                Load modal datas
                ------------
                */
                $modalData = '';
                if($intCounter == 0){
                    // first modal data is always visible, the rest will be invisible
                    // until change the select for the serving size
                    //
                    $modalData = file_get_contents($this->ROOT_DIR.'/templates/pie_charts/usda_non_branded/popup_visible.html');
                }else{
                    // change to invisible
                    $modalData = file_get_contents($this->ROOT_DIR.'/templates/pie_charts/usda_non_branded/popup_invisible.html');
                };

                // get the template for the data
                //
                $templateData = file_get_contents($this->ROOT_DIR.'/templates/pie_charts/usda_non_branded/popup_data.html');
                
                // populate modal
                //
                // begin by giving it the fields for the data
                $modalData = str_replace('[popup_data]',$templateData,$modalData);

                // give id
                // id is of form
                // div__popup-data-[NAME OF FOOD]-[INDEX OF SELECT]
                // remove non-alphanumeric chars
                $strModifiedDesc = preg_replace('/(\W)+/','-',$arrUsdaNBData['description']);
                
                $modalData = str_replace('[id]','div__popup-data-'.$strModifiedDesc.'-'.$intCounter,$modalData);
                // give carbs
                $modalData = str_replace('[carbohydrate_amount]',$subElement['carb_amount'],$modalData);
                $modalData = str_replace('[carbohydrate_unit]',$subElement['carb_unit'],$modalData);
                // give energy
                $modalData = str_replace('[energy_amount]',$subElement['energy_amount'],$modalData);
                // give fat
                $modalData = str_replace('[fat_amount]',$subElement['fat_amount'],$modalData);
                $modalData = str_replace('[fat_unit]',$subElement['fat_unit'],$modalData);
                // give protein
                $modalData = str_replace('[protein_amount]',$subElement['protein_amount'],$modalData);
                $modalData = str_replace('[protein_unit]',$subElement['protein_unit'],$modalData);
                // give potassium
                $modalData = str_replace('[potassium_amount]',$subElement['potassium_amount'],$modalData);
                $modalData = str_replace('[potassium_unit]',$subElement['potassium_unit'],$modalData);
                // give fiber
                $modalData = str_replace('[fiber_amount]',$subElement['fiber_amount'],$modalData);
                $modalData = str_replace('[fiber_unit]',$subElement['fiber_unit'],$modalData);
                // give portion gram weight
                $modalData = str_replace('[serving_size]',$subElement['serving_size'],$modalData);
                // append to modals
                //
                $strModalDatas .= $modalData;

                // increment count
                //
                $intCounter = $intCounter +1;
            }
        }
        // create the select
        //
        $strSelect = $this->strSelectToStr($arrSelectArgs);
        
        // put the select in the modal
        //
        $strModalHtml = str_replace('[select]',$strSelect,$strModalHtml);

        // put the description in
        //
        $strModalHtml = str_replace('[description]',$arrUsdaNBData['description'],$strModalHtml);
        // put the img in
        //
        $strModalHtml = str_replace('[img_src]',$arrUsdaNBData['img_src'],$strModalHtml);

        // put db id in (not fdc id)
        //
        $strModalHtml = str_replace('[dbId]',$arrUsdaNBData['id'],$strModalHtml);

        // put the modal data in
        //
        $strModalHtml = str_replace('[popup_datas]',$strModalDatas,$strModalHtml);
        return $strModalHtml;
    }
    function strPopulateMenustatModal($arrMenustatData){
        // populates menustat modal
        //

        // arr menustat array looks like
        //
        // array(
        //      'data_type'-> [DATABASE_NAME]
        //      'description'-> [DESCRIPTION]
        //      'img_src'->[IMG_SRC]
        //      'restaurant'->[RESTAURANT]
        //      
        //      array(
        //          [ENTRY_1],
        //          [ENTRY_2],
        //          ...
        //      )
        //)
        //)
        // load modal html
        //
        $strModalHtml = file_get_contents($this->ROOT_DIR.'/templates/pie_charts/menustat/popup_v1.html');

        // create the select
        //
        // store all the modal data in one big str
        // this str is decoded by js and then used to
        // separate each data by serving size
        //
        $strModalDatas = "";
        
        // need to keep track if first loop 
        // first loop we need to use a visible modal data,
        // the rest can be invisible
        // intCounter also used for id of div popups
        //
        $intCounter = 0;


        $arrSelectArgs = array();
        foreach($arrMenustatData as $subElement){
            if(gettype($subElement) == 'array'){
                /*
                ------------
                Create select
                ------------
                */
                // create array argumnts for select
                //
                $arrSelectValues = array(
                    'value'=>$subElement['serving_size'].$subElement['serving_size_unit'],
                    'text'=>'portion: '.$subElement['serving_size'].$subElement['serving_size_unit'],
                );
                // append to args
                array_push($arrSelectArgs,$arrSelectValues);
                /*
                ------------
                Load modal datas
                ------------
                */
                $modalData = '';
                if($intCounter == 0){
                    // first modal data is always visible, the rest will be invisible
                    // until change the select for the serving size
                    //
                    $modalData = file_get_contents($this->ROOT_DIR.'/templates/pie_charts/menustat/popup_visible.html');
                }else{
                    // change to invisible
                    $modalData = file_get_contents($this->ROOT_DIR.'/templates/pie_charts/menustat/popup_invisible.html');
                };

                // get the template for the data
                //
                $templateData = file_get_contents($this->ROOT_DIR.'/templates/pie_charts/menustat/popup_data.html');
                
                // populate modal
                //
                // begin by giving it the fields for the data
                $modalData = str_replace('[popup_data]',$templateData,$modalData);

                // give id
                // id is of form
                // div__popup-data-[NAME OF FOOD]-[INDEX OF SELECT]
                // remove non-alphanumeric chars
                $strModifiedDesc = preg_replace('/(\W)+/','-',$arrMenustatData['description']);
                
                $modalData = str_replace('[id]','div__popup-data-'.$strModifiedDesc.'-'.$intCounter,$modalData);
                // give carbs
                $modalData = str_replace('[carbohydrate_amount]',$subElement['carb_amount'],$modalData);
                // give energy
                $modalData = str_replace('[calorie_amount]',$subElement['energy_amount'],$modalData);
                // give fat
                $modalData = str_replace('[fat_amount]',$subElement['fat_amount'],$modalData);
                // give protein
                $modalData = str_replace('[protein_amount]',$subElement['protein_amount'],$modalData);
                // give potassium
                $modalData = str_replace('[potassium_amount]',$subElement['potassium_amount'],$modalData);
                // give fiber
                $modalData = str_replace('[fiber_amount]',$subElement['fiber_amount'],$modalData);
                // give portion gram weight
                $modalData = str_replace('[serving_size]',$subElement['serving_size'],$modalData);
                $modalData = str_replace('[serving_size_unit]',$subElement['serving_size_unit'],$modalData);
                // give restaurant
                $modalData = str_replace('[restaurant]',$arrMenustatData['restaurant'],$modalData);


                // append to modals
                //
                $strModalDatas .= $modalData;

                // increment count
                //
                $intCounter = $intCounter +1;
            }
        }
        // create the select
        //
        $strSelect = $this->strSelectToStr($arrSelectArgs);
        
        // put the select in the modal
        //
        $strModalHtml = str_replace('[select]',$strSelect,$strModalHtml);

        // put the description in
        //
        $strModalHtml = str_replace('[description]',$arrMenustatData['description'],$strModalHtml);

        // put img in
        //
        $strModalHtml = str_replace('[img_src]',$arrMenustatData['img_src'],$strModalHtml);

        // put the id in 
        //
        $strModalHtml  = str_replace('[id]',$arrMenustatData['id'],$strModalHtml);


        // put the modal data in
        //
        $strModalHtml = str_replace('[popup_datas]',$strModalDatas,$strModalHtml);
        return $strModalHtml;
    }

    // populates usda_non_branded modal
    //
    function strPopulateUsdaBrandedModal($arrUsdaData){
        // usda array looks like
        //
        // array(
        //      'data_type'-> [DATABASE_NAME]
        //      'fdc_id'-> [FDC_ID]
        //      'description'->[DESCRIPTION]
        //      'img_src'->[IMG_SRC]
        //      
        //      array(
        //          [ENTRY_1],
        //          [ENTRY_2],
        //          ...
        //      )
        //
        //)
        //)

        // load the modal html
        //
        $strModalHtml = file_get_contents($this->ROOT_DIR."/templates/pie_charts/usda_branded/popup_v1.html");


        // first create the select
        //
        $arrSelectArgs = array();

        // store all the modal data in one big str
        // this str is decoded by js and then used to
        // separate each data by serving size
        //
        $strModalDatas = "";

        // need to keep track if first loop 
        // first loop we need to use a visible modal data,
        // the rest can be invisible
        // intCounter also used for id of div popups
        //
        $intCounter = 0;

        foreach($arrUsdaData as $subElement){
            if(gettype($subElement) == 'array'){
                /*
                ------------
                Create select
                ------------
                */
                // create array argumnts for select
                //
                $arrSelectValues = array(
                    'value'=>$subElement['serving_size'].$subElement['serving_size_unit'],
                    'text'=>'portion: '.$subElement['serving_size'].$subElement['serving_size_unit']
                );
                // append to args
                array_push($arrSelectArgs,$arrSelectValues);
                /*
                ------------
                Load modal datas
                ------------
                */
                $modalData = '';
                if($intCounter == 0){
                    // first modal data is always visible, the rest will be invisible
                    // until change the select for the serving size
                    //
                    $modalData = file_get_contents($this->ROOT_DIR.'/templates/pie_charts/usda_branded/popup_visible.html');
                }else{
                    // change to invisible
                    $modalData = file_get_contents($this->ROOT_DIR.'/templates/pie_charts/usda_branded/popup_invisible.html');
                };

                // get the template for the data
                //
                $templateData = file_get_contents($this->ROOT_DIR.'/templates/pie_charts/usda_branded/popup_data.html');
                
                // populate modal
                //
                // begin by giving it the fields for the data
                $modalData = str_replace('[popup_data]',$templateData,$modalData);

                // give id
                // id is of form
                // div__popup-data-[NAME OF FOOD]-[INDEX OF SELECT]
                // remove non-alphanumeric chars
                $strModifiedDesc = preg_replace('/(\W)+/','-',$arrUsdaData['description']);
                
                $modalData = str_replace('[id]','div__popup-data-'.$strModifiedDesc.'-'.$intCounter,$modalData);
                // give carbs
                $modalData = str_replace('[carbohydrate_amount]',$subElement['carb_amount'],$modalData);
                $modalData = str_replace('[carbohydrate_unit]',$subElement['carb_unit'],$modalData);
                // give energy
                $modalData = str_replace('[calorie_amount]',$subElement['energy_amount'],$modalData);
                // give fat
                $modalData = str_replace('[fat_amount]',$subElement['fat_amount'],$modalData);
                $modalData = str_replace('[fat_unit]',$subElement['fat_unit'],$modalData);
                // give protein
                $modalData = str_replace('[protein_amount]',$subElement['protein_amount'],$modalData);
                $modalData = str_replace('[protein_unit]',$subElement['protein_unit'],$modalData);
                // give portion gram weight
                $modalData = str_replace('[serving_size]',$subElement['serving_size'],$modalData);
                $modalData = str_replace('[serving_size_unit]',$subElement['serving_size_unit'],$modalData);
                // give potassium
                $modalData = str_replace('[potassium_amount]',$subElement['potassium_amount'],$modalData);
                $modalData = str_replace('[potassium_unit]',$subElement['potassium_unit'],$modalData);
                // give fiber
                $modalData = str_replace('[fiber_amount]',$subElement['fiber_amount'],$modalData);
                $modalData = str_replace('[fiber_unit]',$subElement['fiber_unit'],$modalData);

                // give brand owner
                $modalData = str_replace('[brand_owner]',$arrUsdaData['brand_owner'],$modalData);


                // append to modals
                //
                $strModalDatas .= $modalData;

                // increment count
                //
                $intCounter = $intCounter +1;
            }
        }
        // create the select
        //
        $strSelect = $this->strSelectToStr($arrSelectArgs);
        
        // put the select in the modal
        //
        $strModalHtml = str_replace('[select]',$strSelect,$strModalHtml);

        // put the description in
        //
        $strModalHtml = str_replace('[description]',$arrUsdaData['description'],$strModalHtml);
        // put the img in
        //
        $strModalHtml = str_replace('[img_src]',$arrUsdaData['img_src'],$strModalHtml);

        // put db id in (not fdc id)
        //
        $strModalHtml = str_replace('[dbId]',$arrUsdaData['id'],$strModalHtml);

        // put the modal data in
        //
        $strModalHtml = str_replace('[popup_datas]',$strModalDatas,$strModalHtml);
        return $strModalHtml;
    }

    // Populates a select
    // input:
    // array of arrays of type
    // arr = {
    //    'value'=>[VALUE],
    //    'text'=>[TEXT]
    //}
    // Output: str of html template
    //
    function strSelectToStr($arrData){
        // load the template for choices
        //
        $strOriginalOptionTemplate = file_get_contents($this->ROOT_DIR."/templates/pie_charts/general/option.html");

        // create the basic select
        // finish it when all options added
        //
        $strSelect = "<select class = 'form-select'>";

        $strOption = "";

        // loop over number of data, create options for each
        //
        foreach($arrData as $arrSelectValuesArr){
            // reload the option template
            //
            $strOption = $strOriginalOptionTemplate;

            // each option has two variables
            // text: the text shown for the choice
            // value: the value of the choice
            $strOptionTemplate = str_replace('[text]',$arrSelectValuesArr['text'],$strOption);
            $strOptionTemplate = str_replace('[value]',$arrSelectValuesArr['value'],$strOptionTemplate);

            // append to select
            //
            $strSelect.=$strOptionTemplate;
        }
        // end the select
        //
        $strSelect .= '</select>';

        return $strSelect;
    }

}