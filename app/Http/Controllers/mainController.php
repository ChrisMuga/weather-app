<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class mainController extends BaseController
{
    #fetch from openweathermap.org api
    public function fetch()
    {
        $apikey     =   'bec78ab9a765701d40fc9d0b9bc1aace';
        $counter    =   0;
        $stack      =   array();
        
        $json       =   file_get_contents('http://api.openweathermap.org/data/2.5/group?id=184745,186301,191245,184622,187896,182701,196742&units=metric&APPID=bec78ab9a765701d40fc9d0b9bc1aace');

        $data       =   json_decode($json, true);



        #count

        $count      =   $data["cnt"];


        while($counter < $count)
        {
            #city-name
            $cityName                           =   $data["list"][$counter]["name"];
            #temperature
            $cityTemp                           =   $data["list"][$counter]["main"]["temp"];
            #pressure
            $cityPressure                       =   $data["list"][$counter]["main"]["pressure"];
            #humidity
            $cityHumidity                       =   $data["list"][$counter]["main"]["humidity"];

            #assignment

            $stack[$counter]["city"]            =   $cityName;
            $stack[$counter]["temperature"]     =   $cityTemp;
            $stack[$counter]["humidity"]        =   $cityHumidity;
            $stack[$counter]["pressure"]        =   $cityPressure;


            #increment
            $counter++;

        }

        return $stack;

        #return $data["list"][0];
    }
}
