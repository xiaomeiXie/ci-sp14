<?php
//join.php is a codeigniter controller
class Join extends CI_Controller
{
   public function index()
   {//here we're making data available header and footer
   	 $this->load->model('MailList_model');
   	 $data['mail_list'] = $this->MailList_model->get_maillist();
     $data['title']= "Here is our title tag!";
     $this->load->view('header',$data);
     //var_dump( $data['mail_list']);
     $this->load->view('footer',$data);
   
   }


}

?>