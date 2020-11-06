<?php 
class RaviKoQr
{
  public $server = "localhost";
  public $user = "root";
  public $pass = "1234";
  public $dbname = "projectrmuti";
	public $conn;
  public function __construct()
  {
  	$this->conn= new mysqli($this->server,$this->user,$this->pass,$this->dbname);
  	if($this->conn->connect_error)
  	{
  		die("connection failed");
  	}
  }
 	public function insertQr($final,$qrimage,$qrlink,$activities_id)
 	{
 			$sql = "INSERT INTO qrcodes(qrContent,qrImg,qrlink,activities_id) VALUES('$final','$qrimage','$qrlink','$activities_id')";
 			$query = $this->conn->query($sql);
 			return $query;

 	
 	}
 	public function displayImg()
 	{
 		$sql = "SELECT qrimg,qrlink from qrcodes where qrimg='$qrimage'";

 	}
}
$meravi = new RaviKoQr();