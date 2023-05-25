<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function getActorsBornOnDate(Request $request)
{    $month = $request->input('month');
     $day = $request->input('day');
    $API_KEY = "769ecab13fmshc3548ed563d0057p15619bjsn90934e2ae9f4"; // Your API key here

    function getActorIDsBornOnDate($Month, $Day, $API_KEY)
    {
        $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://online-movie-database.p.rapidapi.com/actors/list-born-today?month=$Month&day=$Day",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: online-movie-database.p.rapidapi.com",
            "X-RapidAPI-Key: $API_KEY"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
    
    if ($err) {
        echo "cURL Error #:" . $err;
    } else { 
        return json_decode($response, true);
       
}

    }

    function getActorDetailsByID($nconst, $API_KEY)
    {
        
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://online-movie-database.p.rapidapi.com/actors/get-bio?nconst=$nconst",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: online-movie-database.p.rapidapi.com",
            "X-RapidAPI-Key: $API_KEY"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        
        return json_decode($response, true);
    }

    }

    $actor_list = getActorIDsBornOnDate($month, $day, $API_KEY);

    $actor_ids = array_map(function ($actor) {
        return substr($actor, 6, -1); // extract the ID from the string
    }, $actor_list);

    $counter = 0;
    $actors_data = array();
    foreach ($actor_ids as $id) {
        $counter++;

        $actors_data[] = getActorDetailsByID($id, $API_KEY);
        if ($counter == 3) {
            break;
        }
    }

    $res = array("actors" => array());
    foreach ($actors_data as $actor) {
        $res['actors'][] = array('name' => $actor['name'], 'birthDate' => $actor['birthDate'], 'birthPlace' => $actor['birthPlace']);
    }

    return response()->json($res);
}
}
