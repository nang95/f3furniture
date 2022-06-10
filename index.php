<?php

$server_key = "SB-Mid-server-cKpxEjig6NHhu8UEkyoyF2YR";
$is_production = false;

$api_url = $is_production ? 
'https://app.midtrans.com/snap/v1/transactions':
'https://app.sanbox.midtrans.com/snap/v1/transactions';

if(!strpos($_SERVER['REQUEST_URL'], '/charge')){
    http_response_code(404);
    echo "Wrong path, make sure it's '/charge'";
}

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    http_response_code(404);
    echo "Page not found or wrong HTTP request method is used";
}

$request_body = file_get_contents('php://input');
header('Content-Type: application/json');

$charge_result = chargeAPI($api_url, $server_key, $request_body);

http_response_code($charge_result['http_code']);
echo $charge_result['body'];

function chargeAPI($api_url, $server_key, $request_body){
    $ch = curl_init();
    $curl_options = array(
        CURLOPT_URL => $app_url,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_HTTPHEADER => array(
            'Content_Type: application/json',
            'Accept: application/json',
            'Authorization: Basic '. base64_decode($server_key)
        ),
        CURLOPT_POSTFIELDS => $request_body
    );

    curl_setopt_array($ch, $curl_options);
    $result = array(
        'body' => curl_exec($ch),
        'http_code' => curl_getinfo($sc, CURLINFO_HTTP_CODE)
    );

    return $result; 
    
}

?>

<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.3/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.8.3/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyAzVGwrFZESf8buSezshzxEx3DA5GUp1iE",
    authDomain: "dogwood-keep-352904.firebaseapp.com",
    projectId: "dogwood-keep-352904",
    storageBucket: "dogwood-keep-352904.appspot.com",
    messagingSenderId: "940487574429",
    appId: "1:940487574429:web:e565e311a27e559777a574",
    measurementId: "G-MRBRTFJSCP"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>