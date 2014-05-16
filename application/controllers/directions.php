<?php
//news.php is a codeigniter controller
class News extends CI_Controller
{  
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Directons_model');
		}
   public function index()
   {//here we're making data available header and footer
   	 $this->load->model('Directons_model');
   	 $this->load->library('form_validation');
   	
   	 $data['direct'] = $this->Directions_model->getLocation($address);
   	 
   	 
     $data['title']= "Here is our title tag!";
     $data['style']= "cerulean.css";
     $data['banner']= "Here is our Web Site !";
     $data['copyright']= "copyright goes here!";
     $data['base_url']= base_url();
     $this->load->view('header',$data);
     $this->load->view('directions/add_directions',$data);
     $this->load->view('footer',$data);
   	
   }
   public function map()
   {
	$this->load->model('Directions_model');
	//$this->load->library('form_validation');
	$this->load->helper('url');	
	var directionsDisplay;
		var directionsService = new google.maps.DirectionsService();
		var map;

		function initialize() {
		  directionsDisplay = new google.maps.DirectionsRenderer();
		  var myStart = new google.maps.LatLng($sLat, $sLng);
		  var mapOptions = {
			zoom:7,
			center: myStart
		  }
		  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		  directionsDisplay.setMap(map);
		  directionsDisplay.setPanel(document.getElementById("directionsPanel"));
		  calcRoute();
		}

		function calcRoute() {
		  var start = new google.maps.LatLng($sLat, $sLng);
		  var end = new google.maps.LatLng($dLat, $dLng);
		  var request = {
			  origin:start,
			  destination:end,
			  travelMode: google.maps.TravelMode.DRIVING
		  };
		  directionsService.route(request, function(response, status) {
			if (status == google.maps.DirectionsStatus.OK) {
			  directionsDisplay.setDirections(response);
			}
		  });
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	
	   
	}


 
}

?>