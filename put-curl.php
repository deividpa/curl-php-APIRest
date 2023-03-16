<?php

    // Realizando una petición PUT por medio de cURL para actualización de datos


    $array = [
        "name" => "David",
        "apellido" => "perez"
    ];

    $data = http_build_query($array);
    echo $data;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://reqres.in/api/users");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    echo "<hr />Undecoded response cURL PUT: ".$response."<hr />";
    
    if(curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        $decoded = json_decode($response, true);
        echo "Decoded response cURL PUT: ";
        var_dump($decoded);
        echo "<hr />";

        foreach($decoded as $ind => $val) {
            echo "<br />$ind: $val";
        }
    }
    curl_close($ch);