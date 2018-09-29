<?php 

function callAPI($method, $url, $token, $pw) {
    // Get cURL resource
    $ch = curl_init();
    // Set url
    curl_setopt($ch, CURLOPT_URL, $url);
    // Set method
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    // Set options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // Set compression
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    // Set headers
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
            // "Authorization: Basic " . $token . ":" . $pw
            "Authorization: Basic " . base64_encode($token . ":" . $pw)
    ]);
    // Send the request & save response to $resp
    $resp = curl_exec($ch);
    $resp = json_decode($resp);
    // var_dump($resp);
    if (!$resp) {
        die('Error: "' . curl_error($ch) . '" - Code: ' . curl_getinfo($ch, CURLINFO_HTTP_CODE) );
    } else {
        // echo "Response HTTP Status Code : " . curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // echo "\nResponse HTTP Body : " . $resp;
        return $resp;
    }
    // Close request to clear up some resources
    curl_close($ch);
}

?>