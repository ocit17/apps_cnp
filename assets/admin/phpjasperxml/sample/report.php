<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("../PHPJasperXML.inc.php");
include_once ('setting.php');


$server = "localhost";
$user	= "root";
$pass	= "mysql";
$db		= "erapot";


$value = $_POST['siswa'];
$PHPJasperXML = new PHPJasperXML();
// $PHPJasperXML->debugsql=true;
$PHPJasperXML->arrayParameter=array("parameter1"=>$value);
$PHPJasperXML->load_xml_file("report3.jrxml");

$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file


?>
