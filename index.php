<?php
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,"https://catfact.ninja/fact");
    curl_exec($ch);
    if(curl_errno($ch)) {
        echo curl_error($ch);
    }
    curl_close($ch);
