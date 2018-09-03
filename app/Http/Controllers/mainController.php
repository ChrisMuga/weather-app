<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class mainController extends BaseController
{
    #function1
    public function display()
    {
        $apikey =   'bec78ab9a765701d40fc9d0b9bc1aace';
        
        $json   =   file_get_contents('http://api.openweathermap.org/data/2.5/group?id=184745,186301,191245&units=metric&APPID=bec78ab9a765701d40fc9d0b9bc1aace');
        $data   =   json_decode($json, true);

        #city-name
        $cityName   =   $data["list"][0]["name"];
        echo $cityName;
        echo "<hr/>";
        //return $data["list"][0];
    }
}
