<?php
//mailing_list.php is a codeigniter controller
class Mailing_list extends CI_Controller
{  
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		}//end construct
   public function index()
   {//here we're making data available header and footer
   	 $this->load->model('Mailing_list_model');
   	 $data['query'] = $this->Mailing_list_model->get_mailing_list();
     $data['title']= "Here is our title tag!";
     $data['style']= "cerulean.css";
     $data['banner']= "Here is our Web Site !";
     $data['copyright']= "copyright goes here!";
     $data['base_url']= base_url();
     $this->load->view('header',$data);
     $this->load->view('mailing_list/view_mailing_list',$data);
     $this->load->view('footer',$data);
   	
   }//end index()
  public function view($id)
   {//here will show us the data from a single page.
   	 $this->load->model('Mailing_list_model');
   	 $data['query'] = $this->Mailing_list_model->get_id($id);
     $data['title']= "Here is our title tag!";
     $data['style']= "cerulean.css";
     $data['banner']= "Here is our Web Site !";
     $data['copyright']= "copyright goes here!";
     $data['base_url']= base_url();
     $this->load->view('header',$data);
     $this->load->view('mailing_list/view_mailing_list_detail',$data);
     $this->load->view('footer',$data);
   	
   }//end view()
  public function add()
  {//add is a for to add a new record
	 $this->load->helper('form');
     $data['title']= "Adding a record!";
     $data['style']= "cerulean.css";
     $data['banner']= "Adding a record !";
     $data['copyright']= "copyright goes here!";
     $data['base_url']= base_url();
     $this->load->view('header',$data);
     $this->load->view('mailing_list/add_mailing_list',$data);
     $this->load->view('footer',$data);
	
  }//end add()
  public function insert()
  {//will insert the data entered via add()
	  
	}//end insert()
 
}

?>