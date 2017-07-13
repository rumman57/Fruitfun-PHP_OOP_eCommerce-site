<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
  include_once ($filepath."/../helpers/format.php");

class Adminprofile
{
	
	    private $db;
	  	private $fm;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
	  		$this->fm = new Format();
	  	}
	  	public function getAdminProfileDetails($id){
	  		$query = "select * from foradmin where AdminId = '$id'";
        	$result = $this->db->select($query);
        	if($result){
        		return $result;
        	}
	  	}
	  	public function showAdminValue($aid){
	  		$query = "select * from foradmin where AdminId = $aid";
        	$result = $this->db->select($query);
        	if($result){
        		return $result;
        	}
	  	}
	  	public function updateAdminProfile($post,$file,$aid){

	  		$aid         = $this->fm->validation($aid);
	  		$AdminName   = $this->fm->validation($post['AdminName']);
	  		$AdminUser   = $this->fm->validation($post['AdminUser']);
	  		$AdminPass   = $post['AdminPass'];
	  		$AdminEmail  = $this->fm->validation($post['AdminEmail']);

	  		$aid           = mysqli_real_escape_string($this->db->link, $aid);
	  		$AdminName     = mysqli_real_escape_string($this->db->link, $AdminName);
	  		$AdminUser     = mysqli_real_escape_string($this->db->link, $AdminUser);
	  		$AdminEmail    = mysqli_real_escape_string($this->db->link, $AdminEmail);
            
             $fileformat = array('jpg','jpeg','png');
	         $file_name = $file['AdminImage']['name'];
	         $file_size = $file['AdminImage']['size'];
	         $file_temp = $file['AdminImage']['tmp_name'];

	        $div = explode('.', $file_name);
	        $file_extension = strtolower(end($div));
	        $unique_name_image = substr(md5(time()),0,10).'.'.$file_extension;
	        $uploaded_directory_Imagename = "dist/img/".$unique_name_image;


	  		if(empty($AdminUser) || empty($AdminPass) || empty($AdminEmail)){
	  			 $msg = "<span style='color:crimson;'>Username,Password & Email Must Not Be Empty...</span>";
	  			 return $msg;
	  		}
	  		elseif(!empty($file_name)){
		  			if($file_size>1048576){
		             $msg = "<span style='color:crimson;'>File Size Not More Than 1MB</span>";
		  			 return $msg;
		        }elseif(in_array($file_extension, $fileformat)===false){
		            $msg = "<span style='color:crimson;'>You Can Upload Only : ".implode(' , ', $fileformat)."</span>";
		  			 return $msg;
		        }else{
	                move_uploaded_file($file_temp, $uploaded_directory_Imagename);
	                $query="UPDATE foradmin SET
	                AdminName   = '$AdminName',
	                AdminUser   = '$AdminUser',
	                AdminPass   = '$AdminPass',
	                AdminEmail  = '$AdminEmail',
	                AdminImage  = '$uploaded_directory_Imagename'
	                 WHERE AdminId = '$aid'";
	                $result = $this->db->update($query);
	                if($result){
	                    $msg = "<span style='color:#83912B;font-size:18px;'>Profile Updated Successfully...</span>";
		  			     return $msg."<script>setTimeout(\"location.href ='adminprofile.php';\",2000);</script>";
	                }else{
	                   $msg = "<span style='color:crimson;'>Product Not Updated</span>";
		  			    return $msg;
	                }
	           }
	  	   }else{

	  	   	    $query="UPDATE foradmin SET
	                AdminName   = '$AdminName',
	                AdminUser   = '$AdminUser',
	                AdminPass   = '$AdminPass',
	                AdminEmail  = '$AdminEmail'
	                WHERE AdminId = '$aid'";
                $result = $this->db->update($query);
                if($result){
                    $msg = "<span style='color:#83912B;font-size:18px;'>Profile Updated Successfully...</span>";
	  			     return $msg."<script>setTimeout(\"location.href ='adminprofile.php';\",2000);</script>";
                }else{
                   $msg = "<span style='color:crimson;'>Product Not Updated</span>";
	  			    return $msg;
                }
	  	   }
	  	}
	  	public function addAdminUser($post){
            $AdminUser   = $this->fm->validation($post['AdminUser']);
	  		$AdminPass   = $this->fm->validation($post['AdminPass']);
	  		$AdminEmail  = $this->fm->validation($post['AdminEmail']);
	  		$userRole  = $this->fm->validation($post['userRole']);

	  		$AdminUser   = mysqli_real_escape_string($this->db->link, $AdminUser);
	  		$AdminPass   = mysqli_real_escape_string($this->db->link, $AdminPass);
	  		$AdminEmail   = mysqli_real_escape_string($this->db->link, $AdminEmail);
	  		$userRole   = mysqli_real_escape_string($this->db->link, $userRole);
	  		if(empty($AdminUser) || empty($AdminPass) || empty($AdminEmail)){
	  			 $msg = "<span style='color:crimson;'>Field Should Not Be Empty</span>";
	  			 return $msg;
	  		}else {
		  		$query ="insert into foradmin (AdminUser,AdminPass,AdminEmail,level) values ('$AdminUser','$AdminPass','$AdminEmail','$userRole')";
		  		$result = $this->db->insert($query);
		  		if($result){
	               $msg = "<span style='color:#83912B;font-size:18px;'>User Inserted Successfully...</span>";
		  			 return $msg."<script>setTimeout(\"location.href ='userlist.php';\",2000);</script>";
		  		}else{
	               $msg = "<span style='color:crimson;'>User Not Inserted</span>";
		  			  return $msg;
		  		}
	  	    }
	  	}
	  	public function showUserList(){
           $query = "select * from foradmin order by AdminId DESC";
        	$result = $this->db->select($query);
        	if($result){
        		return $result;
        	}
	  	}
	  	public function delUserById($audel){
	  		$query = "delete from foradmin where AdminId='$audel'";
        	$result =  $this->db->delete($query);
        	if($result){
        		return "<script>confirm('User Deleted Successfully...')</script>";
        	}else{
        		return "<script>alarm('Sry,,,User Not Deleted')</script>";
        	}
	  	}
}

?>