<?php
/**
*  Format Class
*/
class Format
{
	
	public function DateFormat($date)
	{
         return date("F j,Y  g:i a",strtotime($date));
	}
	public function DateFormat1($date)
	{
         return date("M j , Y",strtotime($date));
	}
	public function DateFormat2($date)
	{
         return date("g:i a",strtotime($date));
	}
	public function AdminDateFormat($date)
	{
         return date("M,Y",strtotime($date));
	}
	public function textExerpt($text,$limit=400)
	{
        $text = $text." ";
        $text = substr($text,0,$limit);
        $text = substr($text,0,strrpos($text," "));
        $text = $text."....";
        return $text;
	}
	public function validation($data)
	{
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		$data = htmlentities($data);
		$data = strip_tags($data);
		return $data;

	}
	public function RemoveTags($data){
       $data = strip_tags(html_entity_decode($data));
       return $data;
	}

	public function fortitle(){
		$path = $_SERVER['SCRIPT_NAME'];
		$title = basename($path,'.php');
		if($title=="index"){
			$title = 'home';
		}elseif($title=="contact"){
			$title ="contact";
		}
		$title = ucwords($title);
		return $title;
	}
}









?>