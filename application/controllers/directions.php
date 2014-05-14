<?php
//news.php is a codeigniter controller
class News extends CI_Controller
{  
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		}
   public function index()
   {//here we're making data available header and footer
     $request = "http://news.google.com/news?pz=1&cf=all&ned=us&hl=en&output=rss";
   	 $this->load->model('Directons_model');
   	 $data['xml'] = $this->Directions_model->getLocation($address);
   	 
   	 
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
	$this->form_validation->set_rules('address','address','trim|required|valid_address');
	        
  //echo "Insert clicked!";
	  /*echo '<pre>';
	  var_dump($_POST);
	  echo '</pre>';*/	  
	//must have at least on validation rule to test.		  
	  if($this->form_validation->run() == FALSE){
		 //failed validation - send back to form 
		
	 $this->load->helper('form');
     $data['title']= "Adding an address!";
     $data['style']= "cerulean.css";
     $data['banner']= "Data Entry Error !";
     $data['copyright']= "copyright goes here!";
     $data['base_url']= base_url();
     $this->load->view('header',$data);
     $this->load->view('directons/add_directions',$data);
     $this->load->view('footer',$data);
		  
		 echo "Insert Failed!";
		  
		  }else{//insert data
			  $post = array(
			  	'address'=>$this->input->post('address'),
			  	
			  	
			  
			  );
			  $this->Directions_model->map($post);
			  echo "Data Inserted?";
			  }
	  
	
	   
	}


 
}

?>