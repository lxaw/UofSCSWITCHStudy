<?php

namespace App\FoodDatabaseInteraction\Classes;
use App\FoodDatabaseInteraction\Classes\MySQLiConnection;
use App\FoodDatabaseInteraction\Classes\Util;
use App\FoodDatabaseInteraction\Configs\DatabaseConfig;
// for connection to db
//
// require_once('MySQLiConnection.php');
// for str replace if null
//
// require_once('../funcs/str_replace_if_null.php');

// for get img path 
//
// require_once('../funcs/str_get_img_path.php');

class DBSearcher{
    // for connection to mysql
    //
    private $_MySQLiConnection;

    function __construct(){
        // upon construction create a mysql connection
        $this->_MySQLiConnection = new MySQLiConnection();
        $this->_Util = new Util();
    }

    // Queries the menustat db.
    // This function is designed to act when the user 
    // has already queried the db for the name of the food.
    // Thus this is just for getting more info.
    // Inputs:
    // str for food name, str for restaurant name
    // Outputs:
    // array of data on the food
    function arrQueryMenustatDetail($strId){
        $stmt = $this->_MySQLiConnection->mysqli()->prepare('
            select
                *
            from
                menustat
            where
                menustat_id = ?
        ');
        $stmt->bind_param("i",$strId);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        // populate all of the data that doesn't change between entries
        //
        $templateData = array(
            'data_type'=>DatabaseConfig::$DATA_TYPE_MENUSTAT,
            'id'=>$strId,
            'description'=>$this->_Util->strReplaceIfNull($data[0]['description'],DatabaseConfig::$NULL_REPLACEMENT),
            'restaurant'=>$this->_Util->strReplaceIfNull($data[0]['restaurant'],DatabaseConfig::$NULL_REPLACEMENT),
        );
        // populate the data that does change between entries
        //
        foreach($data as $tableEntry){
            $arrSubEntry = array(
                'serving_size'=>$this->_Util->strReplaceIfNull($tableEntry['serving_size'],DatabaseConfig::$NULL_REPLACEMENT),
                'serving_size_unit'=>$this->_Util->strReplaceIfNull($tableEntry['serving_size_unit'],DatabaseConfig::$NULL_REPLACEMENT),
                'serving_size_text'=>$this->_Util->strReplaceIfNull($tableEntry['serving_size_text'],DatabaseConfig::$NULL_REPLACEMENT),
                'protein_amount'=>$this->_Util->strReplaceIfNull($tableEntry['protein_amount'],DatabaseConfig::$NULL_REPLACEMENT),
                'energy_amount'=>$this->_Util->strReplaceIfNull($tableEntry['energy_amount'],DatabaseConfig::$NULL_REPLACEMENT),
                'fat_amount'=>$this->_Util->strReplaceIfNull($tableEntry['fat_amount'],DatabaseConfig::$NULL_REPLACEMENT),
                'carb_amount'=>$this->_Util->strReplaceIfNull($tableEntry['carb_amount'],DatabaseConfig::$NULL_REPLACEMENT),
                'potassium_amount'=>$this->_Util->strReplaceIfNull($tableEntry['potassium_amount'],DatabaseConfig::$NULL_REPLACEMENT),
                'fiber_amount'=>$this->_Util->strReplaceIfNull($tableEntry['fiber_amount'],DatabaseConfig::$NULL_REPLACEMENT)
            );
            // push template data
            //
            array_push($templateData,$arrSubEntry);
        }

        $stmt->close();
        return $templateData;
    }

    // queries the menustat db for names 
    // Input:
    // str name of food
    // output
    // array of food names with their respective restaurants
    function arrQueryMenustatNames($strQuery,$intOffset){
        // TO DO:
        // Use smarter querying
        //
        $strFormattedQuery = '%'.$strQuery.'%';

        // prepare sql statement
        $stmt = $this->_MySQLiConnection->mysqli()->prepare('
            select
                *
            from
                menustat_query
            where
                description like
                    ?
            limit
                '.DatabaseConfig::$ENTRIES_PER_PAGE.'
            offset
                ?
        ');

        $stmt->bind_param("si",$strFormattedQuery,$intOffset);
        $stmt->execute();
        $result =$stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        $strRestaurant = "";
        $strDescription = "";
        $strServingSize = "";
        $strServingSizeText = "";
        $strServingSizeUnit = "";
        $strImgPath = "";
        $strId = '';

        // start the index off at the offset value
        $intIndex = $intOffset;

        $arrAllTemplateData = array();

        foreach($data as $subArr){
            // perform checks for nulls here
            //
            $strRestaurant = $this->_Util->strReplaceIfNull($subArr['restaurant'],DatabaseConfig::$NULL_REPLACEMENT);
            $strDescription= $this->_Util->strReplaceIfNull($subArr['description'],DatabaseConfig::$NULL_REPLACEMENT);
            $strImgPath = $this->_Util->strGetImgPath($strDescription,$strRestaurant,DatabaseConfig::$IMG_DIR.'/'.DatabaseConfig::$MENUSTAT_IMGS);
            $strId = $this->_Util->strReplaceIfNull($subArr['menustat_id'],DatabaseConfig::$NULL_REPLACEMENT);

            $templateData = array(
                "index" =>$intIndex,
                "restaurant" => $strRestaurant,
                "description" => $strDescription,
                "img_path"=>$strImgPath,
                'id'=>$strId,
            );
            array_push($arrAllTemplateData,$templateData);
            $intIndex += 1;
        }

        $stmt->close();

        return $arrAllTemplateData;
    }

    function arrQueryUSDABrandedNames($strQuery,$intOffset){
        // TO DO:
        // Use smarter querying
        //
        $strFormattedQuery = '%'.$strQuery.'%';

        // prepare sql statement
        $stmt = $this->_MySQLiConnection->mysqli()->prepare('
            select
                *
            from
                usda_branded_query 
            where
                description like
                    ?
            limit
                '.DatabaseConfig::$ENTRIES_PER_PAGE.'
            offset
                ?    
        ');

        $stmt->bind_param("si",$strFormattedQuery,$intOffset);
        $stmt->execute();
        $result =$stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        $strBrandOwner= "";
        $strDescription = "";
        $strFdcId = "";

        $strImgPath = "";

        // start the index off at the offset value
        $intIndex = $intOffset;

        $arrAllTemplateData = array();

        foreach($data as $subArr){
            // perform checks for nulls here
            //
            $strBrandOwner= $this->_Util->strReplaceIfNull($subArr['brand_owner'],DatabaseConfig::$NULL_REPLACEMENT);
            $strDescription= $this->_Util->strReplaceIfNull($subArr['description'],DatabaseConfig::$NULL_REPLACEMENT);
            $strImgPath = $this->_Util->strGetImgPath($strDescription,$strBrandOwner,DatabaseConfig::$IMG_DIR.'/'.DatabaseConfig::$USDA_BRANDED_IMGS);
            $strFdcId= $this->_Util->strReplaceIfNull($subArr['fdc_id'],DatabaseConfig::$NULL_REPLACEMENT);

            $templateData = array(
                "index" =>$intIndex,
                "brand_owner" => $strBrandOwner,
                "fdc_id"=>$strFdcId,
                "description" => $strDescription,
                "img_path"=>$strImgPath,
            );
            array_push($arrAllTemplateData,$templateData);
            $intIndex += 1;
        }

        $stmt->close();

        return $arrAllTemplateData;
    }

    function arrQueryUSDANonBrandedNames($strQuery,$intOffset){
        // TO DO:
        // Use smarter querying
        //
        $strFormattedQuery = '%'.$strQuery.'%';

        // prepare sql statement
        $stmt = $this->_MySQLiConnection->mysqli()->prepare('
            select
                *
            from
                usda_non_branded_query 
            where
                description like
                    ?
            limit
                '.DatabaseConfig::$ENTRIES_PER_PAGE.'
            offset
                ?
        ');

        $stmt->bind_param("si",$strFormattedQuery,$intOffset);
        $stmt->execute();
        $result =$stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        $strRestaurant = "";
        $strDescription = "";
        $strImgPath = "";
        $strFdcId = "";

        // start the index at the offset value
        $intIndex = $intOffset;

        $arrAllTemplateData = array();

        foreach($data as $subArr){
            // perform checks for nulls here
            //
            $strDescription= $this->_Util->strReplaceIfNull($subArr['description'],DatabaseConfig::$NULL_REPLACEMENT);
            $strFdcId= $this->_Util->strReplaceIfNull($subArr['fdc_id'],DatabaseConfig::$NULL_REPLACEMENT);

            // to do:
            // usda_non_branded has no restaurant / brand owner info, so the
            // format for an image path is slightly different
            //
            $strImgPath = $this->_Util->strGetImgPathNoRestaurant($strDescription,DatabaseConfig::$IMG_DIR.'/'.DatabaseConfig::$USDA_NON_BRANDED_IMGS);

            $templateData = array(
                "index" =>$intIndex,
                'fdc_id'=>$strFdcId,
                "description" => $strDescription,
                "img_path"=>$strImgPath,
            );
            array_push($arrAllTemplateData,$templateData);
            $intIndex += 1;
        }

        $stmt->close();

        return $arrAllTemplateData;
    }

    // Queries the usda branded db.
    // This function is designed to act when the user 
    // has already queried the db for the name of the food.
    // Thus this is just for getting more info.
    // Inputs:
    // str for food name, str for restaurant name
    // Outputs:
    // array of data on the food
    function arrQueryUSDABrandedDetail($strFdcId){
        $stmt = $this->_MySQLiConnection->mysqli()->prepare('
            select
                *
            from
                usda_branded_column
            where
                fdc_id = ?
        ');
        $stmt->bind_param("i",$strFdcId);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        $templateData = array(
            'fdc_id'=>$strFdcId,
        );

        // Note! 
        // There may be multiple entries for each serving size
        // thus we have an array of template data here
        //
        $templateData = array(
            // return the datatype to js
            'data_type'=>DatabaseConfig::$DATA_TYPE_USDA_BRANDED,
            'fdc_id'=>$strFdcId,
        );
        $boolFirstLoop = TRUE;
        foreach($data as $tableEntry){
            // get the description (only need to get once)
            //
            if($boolFirstLoop){
                $templateData['description'] = $this->_Util->strReplaceIfNull($tableEntry['description'],DatabaseConfig::$NULL_REPLACEMENT);
                $templateData['brand_owner']=$this->_Util->strReplaceIfNull($tableEntry['brand_owner'],DatabaseConfig::$NULL_REPLACEMENT);
                $boolFirstLoop = FALSE;
            }

            // likely have multiple table entries
            //
            $arrSubEntry = array(
                'serving_size'=>$this->_Util->strReplaceIfNull($tableEntry['serving_size'],DatabaseConfig::$NULL_REPLACEMENT),
                'serving_size_unit'=>$this->_Util->strReplaceIfNull($tableEntry['serving_size_unit'],DatabaseConfig::$NULL_REPLACEMENT),
                'protein_amount'=>$this->_Util->strReplaceIfNull($tableEntry['protein_amount'],DatabaseConfig::$NULL_REPLACEMENT),
                'protein_unit'=>$this->_Util->strReplaceIfNull($tableEntry['protein_unit'],DatabaseConfig::$NULL_REPLACEMENT),
                'energy_amount'=>$this->_Util->strReplaceIfNull($tableEntry['energy_amount'],DatabaseConfig::$NULL_REPLACEMENT),
                'energy_unit'=>$this->_Util->strReplaceIfNull($tableEntry['energy_unit'],DatabaseConfig::$NULL_REPLACEMENT),
                'carb_amount'=>$this->_Util->strReplaceIfNull($tableEntry['carb_amount'],DatabaseConfig::$NULL_REPLACEMENT),
                'carb_unit'=>$this->_Util->strReplaceIfNull($tableEntry['carb_unit'],DatabaseConfig::$NULL_REPLACEMENT),
                'fat_amount'=>$this->_Util->strReplaceIfNull($tableEntry['fat_amount'],DatabaseConfig::$NULL_REPLACEMENT),
                'fat_unit'=>$this->_Util->strReplaceIfNull($tableEntry['fat_unit'],DatabaseConfig::$NULL_REPLACEMENT),
                'potassium_amount'=>$this->_Util->strReplaceIfNull($tableEntry['potassium_amount'],DatabaseConfig::$NULL_REPLACEMENT),
                'potassium_unit'=>$this->_Util->strReplaceIfNull($tableEntry['potassium_unit'],DatabaseConfig::$NULL_REPLACEMENT),
                'fiber_amount'=>$this->_Util->strReplaceIfNull($tableEntry['fiber_amount'],DatabaseConfig::$NULL_REPLACEMENT),
                'fiber_unit'=>$this->_Util->strReplaceIfNull($tableEntry['fiber_unit'],DatabaseConfig::$NULL_REPLACEMENT),
            );
            // push to template data
            //
            array_push($templateData,$arrSubEntry);
        }


        $stmt->close();

        return $templateData;
    }

    // Queries the usda non branded db.
    // This function is designed to act when the user 
    // has already queried the db for the name of the food.
    // Thus this is just for getting more info.
    // Inputs:
    // str for food name, str for restaurant name
    // Outputs:
    // array of data on the food
    function arrQueryUSDANonBrandedDetail($strFdcId){
        $stmt = $this->_MySQLiConnection->mysqli()->prepare('
            select
                *
            from
                usda_non_branded_column
            where
                fdc_id = ? 
        ');
        // TO DO:
        // Dont know why bind_param is not working here.
        //
        $stmt->bind_param("i",$strFdcId);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        // Note! 
        // There may be multiple entries for each serving size
        // thus we have an array of template data here
        //
        $templateData = array(
            // return the datatype to js
            'data_type'=>DatabaseConfig::$DATA_TYPE_USDA_NON_BRANDED,
            'fdc_id'=>$strFdcId,
        );
        $boolFirstLoop = TRUE;
        foreach($data as $tableEntry){
            // get the description (only need to get once)
            //
            if($boolFirstLoop){
                $templateData['description'] = $this->_Util->strReplaceIfNull($tableEntry['description'],DatabaseConfig::$NULL_REPLACEMENT);
                $boolFirstLoop = FALSE;
            }

            // likely have multiple table entries
            //
            $arrSubEntry = array(
                'serving_size'=>$this->_Util->strReplaceIfNull($tableEntry['serving_size'],DatabaseConfig::$NULL_REPLACEMENT),
                'protein_amount'=>$this->_Util->strReplaceIfNull($tableEntry['protein_amount'],DatabaseConfig::$NULL_REPLACEMENT),
                'protein_unit'=>$this->_Util->strReplaceIfNull($tableEntry['protein_unit'],DatabaseConfig::$NULL_REPLACEMENT),
                'energy_amount'=>$this->_Util->strReplaceIfNull($tableEntry['energy_amount'],DatabaseConfig::$NULL_REPLACEMENT),
                'energy_unit'=>$this->_Util->strReplaceIfNull($tableEntry['energy_unit'],DatabaseConfig::$NULL_REPLACEMENT),
                'carb_amount'=>$this->_Util->strReplaceIfNull($tableEntry['carb_amount'],DatabaseConfig::$NULL_REPLACEMENT),
                'carb_unit'=>$this->_Util->strReplaceIfNull($tableEntry['carb_unit'],DatabaseConfig::$NULL_REPLACEMENT),
                'fat_amount'=>$this->_Util->strReplaceIfNull($tableEntry['fat_amount'],DatabaseConfig::$NULL_REPLACEMENT),
                'fat_unit'=>$this->_Util->strReplaceIfNull($tableEntry['fat_unit'],DatabaseConfig::$NULL_REPLACEMENT),
                'protein_amount'=>$this->_Util->strReplaceIfNull($tableEntry['protein_amount'],DatabaseConfig::$NULL_REPLACEMENT),
                'protein_unit'=>$this->_Util->strReplaceIfNull($tableEntry['protein_unit'],DatabaseConfig::$NULL_REPLACEMENT),
                'fiber_amount'=>$this->_Util->strReplaceIfNull($tableEntry['fiber_amount'],DatabaseConfig::$NULL_REPLACEMENT),
                'fiber_unit'=>$this->_Util->strReplaceIfNull($tableEntry['fiber_unit'],DatabaseConfig::$NULL_REPLACEMENT),
                'serving_text'=>$this->_Util->strReplaceIfNull($tableEntry['serving_text'],DatabaseConfig::$NULL_REPLACEMENT),
                'potassium_amount'=>$this->_Util->strReplaceIfNull($tableEntry['potassium_amount'],DatabaseConfig::$NULL_REPLACEMENT),
                'potassium_unit'=>$this->_Util->strReplaceIfNull($tableEntry['potassium_unit'],DatabaseConfig::$NULL_REPLACEMENT),
            );
            // push to template data
            //
            array_push($templateData,$arrSubEntry);
        }
        // get serving sizes
        //
        $stmt->close();

        return $templateData;

    }

}