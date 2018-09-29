<?php

class MySportsFeeds {
	/*public $baseUrl = 'https://api.mysportsfeeds.com/v1.2/pull/nfl/';
	public $token = '2dccc868-f9ab-45ec-a649-92826d';
	public $pw = 'PH3-Pbd-4DT-7e9';*/

	function callApi($extension) {
		$baseUrl = 'https://api.mysportsfeeds.com/v1.2/pull/nfl/';
		$token = '2dccc868-f9ab-45ec-a649-92826d';
		$pw = 'PH3-Pbd-4DT-7e9';

		/*echo 'Base URL: ' . $baseUrl . '<br>';
		echo 'URL: ' . $extension . '<br>';
		echo 'Token: ' . $token . '<br>';
		echo 'PW: ' . $pw;*/

	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $baseUrl . $extension);
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_ENCODING, "gzip");
	    curl_setopt($ch, CURLOPT_HTTPHEADER, [
	    	"Authorization: Basic " . base64_encode($token . ":" . $pw)
	    ]);

	    $resp = curl_exec($ch);
	    $resp = json_decode($resp);

	    if (!$resp) {
	        die('Error: "' . curl_error($ch) . '" - Code: ' . curl_getinfo($ch, CURLINFO_HTTP_CODE) );
	    } else {
	        // echo "Response HTTP Status Code : " . curl_getinfo($ch, CURLINFO_HTTP_CODE);
	        // echo "\nResponse HTTP Body : " . $resp;
	        return $resp;
	    }

	    curl_close($ch);
	}
	

}

?>