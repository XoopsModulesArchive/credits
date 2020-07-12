<?php
// -----------------[ Hlavicka souboru, vlozeni systemovych prostredku ]--------------------------------------------------

require_once("../../mainfile.php");																							// vlozeni systemovych promenych
global $xoopsTpl;
$xoopsOption['template_main'] = 'cre_server.html'; 	     												// vlozeni hlavni sablony, toto MUSI byt vlozeno pred HEADERem!!!!
include(XOOPS_ROOT_PATH."/header.php");               													// vlozeni hlavicky stránky

$myts =& MyTextSanitizer::getInstance();    																		// Aktivace SANITIZERU, cili fungovani XoopsKodu a podobne

// -----------------[ Vlastni vykonny kod modulu ] -----------------------------------------------------------------------


/*	$sql = "SELECT * FROM " . $xoopsDB -> prefix('credits') . " WHERE id=2 ";
  $result = $xoopsDB -> query($sql);
  $myrow = $xoopsDB->fetchArray($result);

  $xoopsTpl->assign('header', $myrow['header'] );
  $xoopsTpl->assign('intro', $myrow['text'] );
*/


$text = "Server addr: ".$_SERVER['SERVER_ADDR'];
$text.= "<br>Server name: ". $_SERVER['SERVER_NAME'];
$text.= "<br>Software: ". $_SERVER['SERVER_SOFTWARE'];
$text.= "<br>Protokol: ". $_SERVER['SERVER_PROTOCOL'];
$text.= "<br>Server admin: ". $_SERVER['SERVER_ADMIN'];
$text.= "<br>Server port: ". $_SERVER['SERVER_PORT'];
$text.= "<br>Server signature: ". $_SERVER['SERVER_SIGNATURE'];
$text.="<br><hr>";
$text.= "<br>Host: ". $_SERVER['HTTP_HOST'];
$text.= "<br>Agent: ". $_SERVER['HTTP_USER_AGENT'];
$text.= "<br>Remote addr: ". $_SERVER['REMOTE_ADDR'];
$text.= "<br>Remote host: ". $_SERVER['REMOTE_HOST'];
$text.= "<br>Remote port: ". $_SERVER['REMOTE_PORT'];


  $xoopsTpl->assign('header', "O serveru" );
  
  $xoopsTpl->assign('text', $text );

	
	if ( is_object($xoopsUser) && $xoopsUser->isAdmin())
	{
	$xoopsTpl->assign('admin', "<a href='./admin/index.php'>"._CRE_ADMINISTRATION."</a>");
	}

// ----------------- [ Vlozeni paticky stranky ] ----------------------------------------------------------------------------
include(XOOPS_ROOT_PATH."/footer.php");             		// vlozeni paticky stranky
?>