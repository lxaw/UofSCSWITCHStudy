<?php

namespace App\FoodDatabaseInteraction\Configs;

class DatabaseConfig
{
    public static $DB_HOST = "127.0.0.1";
}
// constants to access mysql
//
define("kDB_HOST","127.0.0.1");
define("kDB_NAME",'food_db');
define("kDB_USER","root");
define("kDB_PASSWORD","password");

// constants used to access file system
//
define("kIMG_DIR",'imgs');
define("kMENUSTAT_IMGS",'menustat');
define("kUSDA_BRANDED_IMGS",'usda_branded');
define("kUSDA_NON_BRANDED_IMGS",'usda_non_branded');

// value to replace nulls
//
define("kNULL_REPLACEMENT",'0');

// data types
//
define("kDataTypeUsdaNonBranded",'usda_non_branded');
define("kDataTypeUsdaBranded",'usda_branded');
define('kDataTypeMenustat','menustat');

// number of entries per page
//
define('kENTRIES_PER_PAGE',20);
