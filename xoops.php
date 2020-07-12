<?php
// -----------------[ Hlavicka souboru, vlozeni systemovych prostredku ]--------------------------------------------------

require_once("../../mainfile.php");																							// vlozeni systemovych promenych
global $xoopsTpl;
$xoopsOption['template_main'] = 'cre_xoops.html'; 	     												// vlozeni hlavni sablony, toto MUSI byt vlozeno pred HEADERem!!!!
include(XOOPS_ROOT_PATH."/header.php");               													// vlozeni hlavicky stránky

$myts =& MyTextSanitizer::getInstance();    																		// Aktivace SANITIZERU, cili fungovani XoopsKodu a podobne

// -----------------[ Vlastni vykonny kod modulu ] -----------------------------------------------------------------------


$xoopsTpl->assign('header', $xoopsModuleConfig['pref_xoops_header'] );

  if ( $xoopsModuleConfig['pref_system_show'] == 1)
  {
  	$sql = "SELECT * FROM " . $xoopsDB -> prefix('modules') . " ORDER by name ASC ";
	}
  else
	{
		$sql = "SELECT * FROM " . $xoopsDB -> prefix('modules') . " WHERE weight>0 ORDER by name ASC ";
	}
	
	
  $result = $xoopsDB -> query($sql);
  $myrow = $xoopsDB->fetchArray($result);

 	while ($myrow=mysql_fetch_array($result))
	{

        $name = $myrow["name"];
        $version = round(($myrow["version"])/100 , 2) ;
        $dirname= $myrow["dirname"];
//        $license="Není uvedena";
        $path = XOOPS_ROOT_PATH."/modules/". $dirname. "/xoops_version.php";
        $author= _CRE_AUTHOR_UNKNOWN;
        $license = _CRE_LICENSE_UNKNOWN;
        $credits = _CRE_CREDITS_UNKNOWN;

        
        $handle = @fopen($path, "r");
          if ($handle)
          {
              while (!feof($handle))
              {
                    $buffer = ltrim(fgets($handle, 256));

                    if (substr($buffer,13,5) == "image")                    // Logo image
                    {
                       $iks = strstr($buffer, '=');
                       $iks = ltrim($iks);
                       $iks = str_replace("=", " ", $iks);
                       $iks = ltrim($iks);
                       $iks = str_replace("'", " ", $iks);
                       $iks = str_replace("\"", " ", $iks);
                       $iks = ltrim($iks);
                       $x = strpos($iks, " ");
                       $image = substr($iks,0,$x);
                    }
                    
                    if ( (substr($buffer,13,7) == "license") && ( (substr($buffer,20,1) == "\"") || (substr($buffer,20,1) == "'")) )                    // License
                    {
                       $iks = strstr($buffer, '=');
                       $iks = ltrim($iks);
                       $iks = str_replace("=", " ", $iks);
                       $iks = ltrim($iks);
                       $iks = substr($iks,1);
                       $x = (strpos($iks, ";")-1);
                       $license = substr($iks,0,$x);
                    }

                    if ( (substr($buffer,13,7) == "credits") && ( (substr($buffer,20,1) == "\"") || (substr($buffer,20,1) == "'")) )                    // Credits
                    {
                       $iks = strstr($buffer, '=');
                       $iks = ltrim($iks);
                       $iks = str_replace("=", " ", $iks);
                       $iks = ltrim($iks);
                       $iks = substr($iks,1);
                       $x = (strpos($iks, ";")-1);
                       $credits = substr($iks,0,$x);
                    }

                    if ( (substr($buffer,13,6) == "author") && ( (substr($buffer,19,1) == "\"") || (substr($buffer,19,1) == "'")) )                    // Credits
                    {
                       $iks = strstr($buffer, '=');
                       $iks = ltrim($iks);
                       $iks = str_replace("=", " ", $iks);
                       $iks = ltrim($iks);
                       $iks = substr($iks,1);
                       $x = (strpos($iks, ";")-1);
                       $author = substr($iks,0,$x);
                    }

                    
              }
              fclose($handle);
          }
          
        if ( strlen($author) == 0 ) $author= _CRE_AUTHOR_UNKNOWN;
        if ( strlen($license) == 0 ) $author= _CRE_LICENSE_UNKNOWN;
        if ( strlen($credits) == 0 ) $author= _CRE_CREDITS_UNKNOWN;

        $image_path = "../".$dirname."/".$image;

        if ( file_exists($image_path) )
        {
         $image = " <img src= '".$image_path."' width='92' height='52' border='1'> ";
        }
        else
        {
          $image = " <img src= 'images/logo_red.png' width='92' height='52' border='1'> ";
        }


        if ( $xoopsModuleConfig['pref_version_show'] == 1)
        {
          $xoopsTpl->append('vypis', array( 'name' => $name, 'version' => $version, 'author' => $author, 'license' => $license, 'credits' => $credits, 'image' => $image, 'count' => $count));
        }
        else
        {
				  $xoopsTpl->append('vypis', array( 'name' => $name, 'version' => "---", 'author' => $author, 'license' => $license, 'credits' => $credits, 'image' => $image, 'count' => $count));
				}

				$count++;

  }

	
	if ( is_object($xoopsUser) && $xoopsUser->isAdmin())
	{
	$xoopsTpl->assign('admin', "<a href='./admin/index.php'>"._CRE_ADMINISTRATION."</a>");
	}


include(XOOPS_ROOT_PATH."/footer.php");
?>