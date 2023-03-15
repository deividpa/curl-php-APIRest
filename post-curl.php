<?php

    // Realizando una petición POST por medio de cURL


    $array = [
        "name" => "David",
        "apellido" => "perez"
    ];

    $data = http_build_query($array);
    echo $data;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://jsonplaceholder.typicode.com/todos/1");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    
    if(curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        $decoded = json_decode($response, true);
        var_dump($decoded);

        foreach($decoded as $ind => $val) {
            echo "$ind: $val";
        }
    }
    curl_close($ch);