<?php
//news_model.php
class Directions_model extends CI_Model
{
	public function __construct()
	{ //create an active connection to DB
		//$this->load->database();	
		
	}
	$address=urlencode("2200 2nd Avenue, Seattle, WA 98121");
$loc = $this->getLocation($address);

$lat = $loc['lat'];
$lng = $loc['lng'];
	private $url = "http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=";
	public function getLocation($address)
	{
	 $url = self::$url.urlencode($address);
        
        $resp_json = self::curl_file_get_contents($url);
        
        
        $resp = json_decode($resp_json, true);
		
		//return $resp;
		
        if($resp['status']='OK'){
            return $resp['results'][0]['geometry']['location'];
        }else{
            return false;
        }
  //$response = file_get_contents($request);
 //return simplexml_load_string($response);
}
 static private function curl_file_get_contents($URL){
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $URL);
        $contents = curl_exec($c);
        curl_close($c);

        if ($contents) return $contents;
            else return FALSE;
    }
}

?>