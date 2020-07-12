<?php
// -----------------[ Hlavicka souboru, vlozeni systemovych prostredku ]--------------------------------------------------

require_once("../../mainfile.php");																							// vlozeni systemovych promenych
global $xoopsTpl;
$xoopsOption['template_main'] = 'cre_index.html'; 	     												// vlozeni hlavni sablony, toto MUSI byt vlozeno pred HEADERem!!!!
include(XOOPS_ROOT_PATH."/header.php");               													// vlozeni hlavicky stránky

$myts =& MyTextSanitizer::getInstance();    																		// Aktivace SANITIZERU, cili fungovani XoopsKodu a podobne

// -----------------[ Vlastni vykonny kod modulu ] -----------------------------------------------------------------------

	$sql = "SELECT * FROM " . $xoopsDB -> prefix('credits') . " WHERE id=2 ";
  $result = $xoopsDB -> query($sql);
  $myrow = $xoopsDB->fetchArray($result);
  $html = $myrow['html'];
  $smiley = $myrow['smiley'];
  $xcodes = $myrow['xcodes'];
  $breaks = $myrow['breaks'];
  $images = $myrow['images'];

  $text = $myts->displayTarea($myrow['text'], $html, $smiley, $xcodes, $images, $breaks);
  
  $xoopsTpl->assign('header', $myrow['header'] );
  $xoopsTpl->assign('text', $text);


	
	if ( is_object($xoopsUser) && $xoopsUser->isAdmin())
	{
	$xoopsTpl->assign('admin', "<a href='./admin/index.php'>"._CRE_ADMINISTRATION."</a>");
	}

// ----------------- [ Vlozeni paticky stranky ] ----------------------------------------------------------------------------
include(XOOPS_ROOT_PATH."/footer.php");             		// vlozeni paticky stranky
?>