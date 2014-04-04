<?php
/*
  _  ____     ______    _    
 | |/ /\ \   / / ___|  / \   
 | ' /  \ \ / /\___ \ / _ \  
 | . \   \ V /  ___) / ___ \ 
 |_|\_\   \_/  |____/_/   \_\
 
 PERSATUAN HEJES HEJES MAlAYSIA
 #PHHM | Mohon Gerun
 Espek da unasspekted
                             
*/
//Made by Mohamad Zulfahmy
//Filename : tetapan.php 

//WARNING! WARNING!
//No editing in this line
//Know what you editing

include('konfig.php');
error_reporting(0);
$connect = mysql_connect($host, $user, $pass) or die("<center><h1>Unable to connect to MySQL server</h1></center>");
$selected = mysql_select_db($db) or die("<center><h1>Database not found</h1></center>");
//Globaling Variables
global $appname;
global $appversion;

class indeX {
	function check_no_kp($ic){
	global $tblpengundi;
		//To prevent SQLi
		$ic = trim($ic);
		$ic = mysql_real_escape_string($ic);
	
		//Start checking ic
		if(empty($ic)){
			return "<label class='label label-important' style='background-color:#b94a48;'>Sila isi kad pengenalan anda!</label>";
			exit;
		}
		
		//Checking double vote
		$query1 = mysql_query("SELECT * FROM $tblpengundi WHERE no_kp='$ic' AND telah_undi='1'");
		if(mysql_num_rows($query1) == 1){
			return "<label class='label label-important' style='background-color:#b94a48;'>Harap maaf. Mengundi hanya dibenarkan 1 kali sahaja!</label>";
			exit;
		}
		
		//Last possible check
		$query2 = mysql_query("SELECT * FROM $tblpengundi WHERE no_kp='$ic' AND telah_undi='0'");
		if(mysql_num_rows($query2) == 1){
			return false;
		}else{
			return "<label class='label label-important' style='background-color:#b94a48;'>Harap maaf. Kad pengenalan tidak ditemui!</label>";
		}
	}
}

//Session for undian.php
class Undian {
	function security($s){
		if(empty($s)){
			return header("Location: index.php");
		}
	}
	
	function undi_budak($ni, $abc){
		global $tblcalon;
		$q = "UPDATE $tblcalon SET kUndian=kUndian+1 WHERE candidate_id='$ni'";
		$wsd = mysql_query($q);
		$exc = mysql_query("UPDATE $tblcalon SET telah_undi=1 WHERE nokp='$abc'");
		
		
		session_destroy();
		return header("Location: index.php");
	}
}
?>