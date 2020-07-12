<?php
// -----------------[ Hlavicka souboru, vlozeni systemovych prostredku ]--------------------------------------------------

require_once("../../mainfile.php");																							// vlozeni systemovych promenych
global $xoopsTpl;
$xoopsOption['template_main'] = 'cre_index.html'; 	     												// vlozeni hlavni sablony, toto MUSI byt vlozeno pred HEADERem!!!!
include(XOOPS_ROOT_PATH."/header.php");               													// vlozeni hlavicky stránky

// -----------------[ Vlastni vykonny kod modulu ] -----------------------------------------------------------------------

	if ( is_object($xoopsUser) && $xoopsUser->isAdmin())
	{
     $GLOBALS['xoopsDB']->queryFromFile(XOOPS_ROOT_PATH . "/modules/" . $module->getVar("dirname") . "/sql/mysql.100.sql");
	}
	
	else
	
	{

  $xoopsTpl->assign('header', "Aktualizace modulu" );
  $xoopsTpl->assign('text', "Nemáte právo" );
	
	}

// ----------------- [ Vlozeni paticky stranky ] ----------------------------------------------------------------------------
include(XOOPS_ROOT_PATH."/footer.php");             		// vlozeni paticky stranky
?>