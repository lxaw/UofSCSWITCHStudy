<?php

/*
Holds the constants related to the food database.
*/
namespace App\FoodDatabaseInteraction\Configs;

class DatabaseConfig
{
    // constants to access mysql
    //
    public static $DB_HOST = "127.0.0.1";
    public static $DB_NAME = "mlife";
    public static $DB_USER = "root";
    public static $DB_PASSWORD = "password";
    public static $IMG_DIR = "/images/FoodDatabaseImages";
    public static $MENUSTAT_IMGS = "menustat";
    public static $USDA_BRANDED_IMGS = "usda_branded";
    public static $USDA_NON_BRANDED_IMGS= "usda_non_branded";
    public static $NULL_REPLACEMENT = "0";

    // data types
    //
    public static $DATA_TYPE_USDA_NON_BRANDED= "usda_non_branded";
    public static $DATA_TYPE_USDA_BRANDED= "usda_branded";
    public static $DATA_TYPE_MENUSTAT= "menustat";
    // number of entries per page
    //
    public static $ENTRIES_PER_PAGE = 20;

    // name of image directory
    //
}