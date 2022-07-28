<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class WidgetController extends Controller
{
    
    /* 
        Returns the optimal packs to send for a specific quantity of widgets
    */
    function getWidgetPacks(Request $request)
    {

        //Validate information
        $request->validate([
            'widgets' => 'required|numeric|min:1'
        ]);

        //Store the required amount of widgets
        $widgets = $request->widgets;
        
        //Widget packs available (in descending order)
        //If this was not an interview test, this data would be stored in a database
        $db = array(5000, 2000, 1000, 500, 250);

        //Array to store results
        $results = array();
        
        //Hold the required widgets as a changing value
        $remaining = $widgets;

        //First, check if we can fulfil this widget count with a single small pack
        //Only check smaller values (less than 1000) as we don't want to send unnecessary widgets in large packs
        $smallPacks = array();
        foreach($db as $pack)
        {
            if($pack < 1000)
            {
                array_push($smallPacks, $pack);
            }
        }

        //For each small pack, check if we can fulfil this widget order
        for($i=0; $i<count($smallPacks)-1; $i++)
        {
            $maxPack = $smallPacks[$i];
            $minPack = $smallPacks[$i+1];

            if($widgets < $maxPack && $widgets > $minPack)
            {
                //Can be fulfilled with a single pack
                array_push($results, $maxPack);
                $remaining = 0;
                
            }
        }

        //Calculate widgets required using pack amounts if not already sorted in a single pack above
        while ($remaining > 0)
        {
            //For each pack available
            for($i=0; $i<count($db); $i++)
            {

                $packSize = $db[$i];

                if($remaining < $packSize)
                {
                    //If we have reached the minimum pack size, then add this on as there is nothing smaller
                    if($packSize == $db[count($db)-1])
                    {
                        array_push($results, $packSize);
                        $remaining = $remaining - $packSize;
                        break;
                    }

                } else {
                    
                    //Add the pack to the results
                    array_push($results, $packSize);
                    $remaining = $remaining - $packSize;
                    break;

                }

            }

        }

        //optimise results
        $finalResults = array();
        foreach($results as $pack)
        {
            $added = false;

            //Add to existing final results if not already
            foreach($finalResults as &$final)
            {
                if($final['pack'] == $pack)
                {
                    $final['qty']++;
                    $added = true;
                }
                unset($final);
            }

            //If not exists in final results then add a new entry
            if(!$added)
            {
                $final = array();
                $final['pack'] = $pack;
                $final['qty'] = 1;
                array_push($finalResults, $final);
            }
        }

        //Return results
        return response()->json($finalResults);
        
    }

}
