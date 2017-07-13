<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath."/../lib/Database.php");
  include_once ($filepath."/../helpers/format.php");
?>
<?php
class Review 
{
	
	    private $db;
	  	private $fm;
	  	
	  	function __construct()
	  	{
	  		$this->db = new Database();
	  		$this->fm = new Format();
	  	}
	  	public function addReveiw($rname,$remail,$rbody,$pdetails){

	  		$rname  = $this->fm->validation($rname);
	  		$remail  = $this->fm->validation($remail);
	  		$rbody  = $this->fm->validation($rbody);

	  		$rname  = mysqli_real_escape_string($this->db->link, $rname);
	  		$remail  = mysqli_real_escape_string($this->db->link, $remail);
	  		$rbody  = mysqli_real_escape_string($this->db->link, $rbody);
	  		 $query="INSERT INTO forproductreviews 
            (reviewName,reviewEmail,reviewbody,reviewProId) VALUES 
            ('$rname','$remail','$rbody','$pdetails')";
            $result = $this->db->insert($query);
            if($result){
                $msg = "<script>alertify.alert('Thanks,for your reviews. Your Review is published soon')</script>";
  			     return $msg;
            }else{
               $msg = "<span style='color:crimson;'>Product Not Inserted</span>";
  			    return $msg;
            }
	  				
	  	}
	  	public function showAllReview($pdetails){
	  		$showquery = "select * from forproductreviews where reviewrole='0' AND reviewProId='$pdetails'";
        	$showres = $this->db->select($showquery);
        	if($showres)
        		return $showres;
	  	}
}
?>