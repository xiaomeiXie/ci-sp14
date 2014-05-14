<?php
//news_model.php
class Directions_model extends CI_Model
{
	public function __construct()
	{ //create an active connection to DB
		//$this->load->database();	
		
	}
	public function getLocation($address)
	{
	 $url = self::$url.urlencode($address);
        
        $resp_json = self::curl_file_get_contents($url);
        
        
        $resp = json_decode($resp_json, true);
		
        echo '<pre>';
        var_dump($resp_json);
        echo '</pre>';
        die;
        
		//return $resp;
		
        if($resp['status']='OK'){
            return $resp['results'][0]['geometry']['location'];
        }else{
            return false;
        }
  //$response = file_get_contents($request);
 //return simplexml_load_string($response);
}
}


?>