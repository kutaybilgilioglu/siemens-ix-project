<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

if (isset($_GET["city"])) {
    $city = $_GET["city"];
    $apiKey = 'ef13d0043c3d42b192e82211232008';
    $apiUrl = "https://api.weatherapi.com/v1/forecast.json?key=ef13d0043c3d42b192e82211232008&q=$city&days=5&aqi=no&alerts=no&lang=tr";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        $weatherData = json_decode($response, true);

        if (isset($weatherData['forecast'])) {
            //$temperature = $weatherData['current']['temp_c'];
            //$condition = $weatherData['current']['condition']['text'];

            //echo "Weather in $city: $temperature °C, Condition: $condition";
            $dataToSend = array(
                'FirstMaxTemp' => $weatherData['forecast']['forecastday'][0]['day']['maxtemp_c'],
                'FirstMinTemp' => $weatherData['forecast']['forecastday'][0]['day']['mintemp_c'],
                'FirstCondition' => $weatherData['forecast']['forecastday'][0]['day']['condition']['text'],
                'FirstConditionIcon' => $weatherData['forecast']['forecastday'][0]['day']['condition']['icon'],
                'FirstAvgTemp' => $weatherData['forecast']['forecastday'][0]['day']['avgtemp_c'],
                'FirstDate' => $weatherData['forecast']['forecastday'][0]['date'],

                'SecondMaxTemp' => $weatherData['forecast']['forecastday'][1]['day']['maxtemp_c'],
                'SecondMinTemp' => $weatherData['forecast']['forecastday'][1]['day']['mintemp_c'],
                'SecondCondition' => $weatherData['forecast']['forecastday'][1]['day']['condition']['text'],
                'SecondConditionIcon' => $weatherData['forecast']['forecastday'][1]['day']['condition']['icon'],
                'SecondAvgTemp' => $weatherData['forecast']['forecastday'][1]['day']['avgtemp_c'],
                'SecondDate' => $weatherData['forecast']['forecastday'][1]['date'],

                'ThirdMaxTemp' => $weatherData['forecast']['forecastday'][2]['day']['maxtemp_c'],
                'ThirdMinTemp' => $weatherData['forecast']['forecastday'][2]['day']['mintemp_c'],
                'ThirdCondition' => $weatherData['forecast']['forecastday'][2]['day']['condition']['text'],
                'ThirdConditionIcon' => $weatherData['forecast']['forecastday'][2]['day']['condition']['icon'],
                'ThirdAvgTemp' => $weatherData['forecast']['forecastday'][2]['day']['avgtemp_c'],
                'ThirdDate' => $weatherData['forecast']['forecastday'][2]['date'],



                'FourthMaxTemp' => $weatherData['forecast']['forecastday'][3]['day']['maxtemp_c'],
                'FourthMinTemp' => $weatherData['forecast']['forecastday'][3]['day']['mintemp_c'],
                'FourthCondition' => $weatherData['forecast']['forecastday'][3]['day']['condition']['text'],
                'FourthConditionIcon' => $weatherData['forecast']['forecastday'][3]['day']['condition']['icon'],
                'FourthAvgTemp' => $weatherData['forecast']['forecastday'][3]['day']['avgtemp_c'],
                'FourthDate' => $weatherData['forecast']['forecastday'][3]['date'],





                'FifthMaxTemp' => $weatherData['forecast']['forecastday'][4]['day']['maxtemp_c'],
                'FifthMinTemp' => $weatherData['forecast']['forecastday'][4]['day']['mintemp_c'],
                'FifthCondition' => $weatherData['forecast']['forecastday'][4]['day']['condition']['text'],
                'FifthConditionIcon' => $weatherData['forecast']['forecastday'][4]['day']['condition']['icon'],
                'FifthAvgTemp' => $weatherData['forecast']['forecastday'][4]['day']['avgtemp_c'],
                'FifthDate' => $weatherData['forecast']['forecastday'][4]['date'],
            );

            echo json_encode($dataToSend);

        } else {
            echo "Weather data not available for $city.";
        }
    } else {
        echo "Failed to connect to the API.";
    }
} else {
    echo "City not provided.";
}


?>







