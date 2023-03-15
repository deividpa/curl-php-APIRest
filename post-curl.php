<?php

    // Realizando una petición POST por medio de cURL


    $array = [
        "name" => "Davidsito",
        "apellido" => "perez"
    ];

    $data = http_build_query($array);
    echo $data;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://reqres.in/api/users");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    echo "<hr />Undecoded response cURL POST: ".$response."<hr />";
    
    if(curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        $decoded = json_decode($response, true);
        echo "Decoded response cURL POST: ";
        var_dump($decoded);
        echo "<hr />";

        foreach($decoded as $ind => $val) {
            echo "<br />$ind: $val";
        }
    }
    curl_close($ch);