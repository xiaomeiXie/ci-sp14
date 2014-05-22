<?php
//directions.php is a CodeIgniter controller

class Directions extends CI_Controller
{
function __construct(){
parent::__construct();
$this->load->helper('url');
$this->load->model('Directions_model');
}//end constructor

public function index()
{//here we're making data available to our header and footer
$this->load->helper('form');

$data['title'] = "Here is our title tag!";
$data['style'] = "cerulean.css";
$data['banner'] = "Here we find directions to wherever we want!";
$data['copyright'] = "Copyright goes here";
$data['base_url'] = base_url();
$this->load->view('header',$data);

$this->load->view('directions/view_directions',$data);

$this->load->view('footer',$data);
}//end index()

public function map()
{//will insert the data entered via add()
$this->load->model('Directions_model');
$this->load->library('form_validation');

//must have at least one validation rule to insert
$this->form_validation->set_rules('address','Address','trim|required');

if($this->form_validation->run() == FALSE)
{//failed validation = send back to form
//VIEW DATA ON FAILURE GOES HERE!!

$this->load->helper('form');
$data['title'] = "Adding a record!";
$data['style'] = "cerulean.css";
$data['banner'] = "Data Entry Error!";
$data['copyright'] = "Copyright goes here";
$data['base_url'] = base_url();
$this->load->view('header',$data);

$this->load->view('directions/view_directions',$data);

$this->load->view('footer',$data);	

}else{//insert data
$post = $this->input->post('address');
$post = urlencode($post);

$loc = Directions_model::getLocation($post);

$lat = $loc['lat'];
$lng = $loc['lng'];


$data['dLat'] = $loc['lat'];
$data['dLng'] = $loc['lng'];
$this->load->view('directions/view_map',$data);

$dLat = $data['dLat'];
$dLng = $data['dLng'];
echo "Direction Address: Lat is $lat ; long is $lng";
//echo "Lat is $data['dLat'] long is $data['dLng']";
 
}	
}//end insert
}
?>