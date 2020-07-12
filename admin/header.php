<?php

// -----------------[ Hlavicka souboru, vlozeni systemovych prostredku ]--------

include '../../../include/cp_header.php';

if ( file_exists("../language/".$xoopsConfig['language']."/admin.php") )        // Kontrola existence jazykovych souboru
{
   include_once ("../language/".$xoopsConfig['language']."/admin.php");         // Pokud existuje, pouzije se
   include_once("../language/".$xoopsConfig['language']."/modinfo.php");
}
else
{
    include_once("../language/czech/admin.php");                                // Pokud neexistuje, pouziju svuj, tady cestinu
    include_once("../language/czech/modinfo.php");
}

include_once("../include/functions.inc.php");
include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";                      // Zavadec formularu

//----------------------------------------------------------------------------//

?>