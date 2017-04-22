<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homework extends CI_Controller
 {


	function __construct()
	{
		 parent::__construct();
		  $this->load->model('homeworkmodel');
		  $this->load->helper('url');
		  $this->load->library('session');
		  $this->load->model('class_manage');
        }
         
       
	public function home()
	 {
	 		 	$datas=$this->session->userdata();
  	 		    $user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
			 if($user_type==2){
			 $datas=$this->homeworkmodel->get_teacher_id($user_id);
			 $datas['result'] = $this->homeworkmodel->getall_details();
			 //print_r($datas);
	 		 $this->load->view('adminteacher/teacher_header');
			 $this->load->view('adminteacher/homework/add',$datas);
	 		 $this->load->view('adminteacher/teacher_footer');
	 		 }
	 		 else{
	 				redirect('/');
	 		 }
	 	}
		
		public function add_mark($hw_id)
		{
			  
			    $datas=$this->session->userdata();
  	 		    $user_id=$this->session->userdata('user_id');
				$user_type=$this->session->userdata('user_type');
				$datas['result'] = $this->homeworkmodel->get_stu_details($hw_id);
			    if($user_type==2)
			      {
					 $this->load->view('adminteacher/teacher_header');
					 $this->load->view('adminteacher/homework/add_test',$datas);
					 $this->load->view('adminteacher/teacher_footer');
				  }
	 		   else{
	 				redirect('/');
	 		 }
			
		} 
		
	  public function marks()
		{
			
			$enroll=$this->input->post('enroll');
			$hwid=$this->input->post('hwid');
			$marks=$this->input->post('marks');
			//print_r($marks);exit;
			$remarks=$this->input->post('remarks');
			$datas = $this->homeworkmodel->enter_marks($enroll,$hwid,$marks,$remarks);
			  if($datas['status']=="success")
			  {
				$this->session->set_flashdata('msg','Added Successfully');
                redirect('homework/home',$datas);  
			  }else{
			   $this->session->set_flashdata('msg','Falid To Added');
                redirect('homework/home',$datas);	  
			  }
			
			
			
		}
	 public function create()
		{
	 		$datas=$this->session->userdata();
	 		$user_id=$this->session->userdata('user_id');
			//echo $user_id;exit;
			$test_type=$this->input->post('test_type');
			
			$class_id=$this->input->post('class_id');
			$title=$this->input->post('title');
			$subject_name=$this->input->post('subject_name');
			//echo $subject_name;exit;
			$tet_date=$this->input->post('tet_date');
			
			$dateTime = new DateTime($tet_date);
			$formatted_date=date_format($dateTime,'Y-m-d' );

			$details=$this->input->post('details');
		    $datas=$this->homeworkmodel->create($class_id,$user_id,$test_type,$title,$subject_name,$formatted_date,$details);
			// echo'<pre>';
			// print_r($datas["res"]);
			// echo'</pre>'; 
			if($datas['status']=="success")
			{
				$this->session->set_flashdata('msg','Added Successfully');
                redirect('homework/home',$datas);
			   //redirect('add_test');		
			}else{
				$this->session->set_flashdata('msg','Falid To Added');
                redirect('homework/home',$datas);
			}
	 		 
	 	} 
		
		public function checker()
		{
			$classid=$this->input->post('id');
		    $data=$this->class_manage->get_subject($classid);
			echo json_encode($data);
		}
	
 
	
	
	
	
	
	
	
	
	
	
	
 }