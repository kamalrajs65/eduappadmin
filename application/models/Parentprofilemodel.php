<?php

Class Parentprofilemodel extends CI_Model
{

  public function __construct()
  {
      parent::__construct();

  }
  
  function getuser($user_id)
   {
	    $query="SELECT parent_id FROM edu_users WHERE user_id='$user_id'";
		$resultset=$this->db->query($query);
		$row=$resultset->result();
		foreach($row as $rows){}
		$parent_id=$rows->parent_id;
		//echo $parent_id;exit;
         $query="SELECT * FROM edu_parents WHERE parent_id='$parent_id'";
         $resultset=$this->db->query($query);
         return $resultset->result();
   }
  
   function get_teacheruser($user_id)
      {
         $query="SELECT * FROM edu_users WHERE user_id='$user_id'";
         $resultset=$this->db->query($query);
         return $resultset->result();
       }
	   
	   function update_parents($user_id,$parent_id,$single,$admission_id,$father_name,$mother_name,$guardn_name,$occupation,$income,$address,$email,$email1,$home_phone,$office_phone,$mobile,$mobile1,$userFileName,$userFileName1,$userFileName2)
	  {
		     $query="SELECT parent_id FROM edu_users WHERE user_id='$user_id'";
             $resultset=$this->db->query($query); 
			 $row=$resultset->result();
			 foreach($row as $rows){}
			 $parent_id=$rows->parent_id;
			
            $query5="UPDATE edu_parents SET admission_id='$admission_id',father_name='$father_name',mother_name='$mother_name',guardn_name='$guardn_name',occupation='$occupation',income='$income',address='$address',email='$email',email1='$email1',home_phone='$home_phone',office_phone='$office_phone',mobile='$mobile',mobile1='$mobile1',father_pic='$userFileName',mother_pic='$userFileName1',guardn_pic='$userFileName2',update_at=NOW() WHERE  parent_id='$parent_id'";
            $res=$this->db->query($query5);
			 
			if(empty($father_name && $userFileName)) 
			  {
				$father_name=$guardn_name;
				$userFileName=$userFileName2;
			  } 
			  
	        $query6="UPDATE edu_users SET name='$father_name',user_pic='$userFileName',updated_date=NOW() WHERE parent_id='$parent_id' ";
	        $res=$this->db->query($query6);
		 
		    //$query2="UPDATE edu_admission SET parents_status='1',parnt_guardn_id='$parent_id' WHERE admission_id='$single'";
			//$resultset=$this->db->query($query2);
			
         if($res){
         $data= array("status" => "success");
         return $data;
       }else{
         $data= array("status" => "Failed to Update");
         return $data;
       }

       }
  function updateprofile($user_id,$oldpassword,$newpassword)
  {
         $checkpassword="SELECT user_id FROM edu_users WHERE user_password='$oldpassword' AND user_id='$user_id'";
         $res=$this->db->query($checkpassword);
         if($res->num_rows()==1)
		 {
           $query="UPDATE edu_users SET user_password='$newpassword',updated_date=NOW() WHERE user_id='$user_id'";
           $ex=$this->db->query($query);
            $data= array("status" => "success");
           return $data;
         }else{
           $data= array("status" => "failure");
          return $data;
         }
       }

 
  function teacherprofileupdate($user_id,$teachername,$email,$sex,$dob,$age,$nationality,$religion,$mobile,$community_class,$community,$address,$userFileName)
    {
	 $query="UPDATE edu_teachers SET name='$teachername',email='$email',sex='$sex',dob='$dob',age='$age',nationality='$nationality',religion='$religion',community_class='$community_class',community='$community',phone='$mobile',address='$address',profile_pic='$userFileName',update_at=NOW() WHERE teacher_id='$user_id'";
     $query1="UPDATE edu_users SET name='$teachername',user_pic='$userFileName',updated_date=NOW() WHERE teacher_id='$user_id' ";
	  $res1=$this->db->query($query1);
	  
    	 $res=$this->db->query($query);
         if($res)
		 {
         $data= array("status" => "success");
         return $data;
        }else{
         $data= array("status" => "Failed to Update");
         return $data;
       }
 }
 
}