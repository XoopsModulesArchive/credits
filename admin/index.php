<?php

// -----------------[ Hlavicka souboru, vlozeni systemovych prostredku ]--------

include 'header.php';                                                           // Vlozeni hlavicky, v te jsou systemove prostredky

// -[ Prichod na stranku bez parametru nebo se spatnym parametrem]--------------

if ( (!isset($_GET["op"]))  || (isset($_GET["op"])) && ($_GET["op"]!="credits")  && ($_GET["op"]!="tech") && ($_GET["op"]!="info") )
{
 global $xoopsModule;

   if (isset($_POST['form_op']))    																						// Provedeni zapisu do databaze
   {

      if (isset($_POST['form_html'])) { $html = 1; }
      else { $html = 0;}
      if (isset($_POST['form_smiley'])) { $smiley = 1; }
      else { $smiley = 0;}
      if (isset($_POST['form_xcodes'])) { $xcodes = 1; }
      else { $xcodes = 0;}
      if (isset($_POST['form_breaks'])) { $breaks = 1; }
      else { $breaks = 0;}
      if (isset($_POST['form_images'])) { $images = 1; }
      else { $images = 0;}


			if ($_POST["form_op"]=="change_credits")
			{
//    	 	 $sql = "UPDATE " . $xoopsDB -> prefix('credits') . " SET text=\"".$_POST['form_text']."\", header=\"".$_POST['form_header']."\", date=\"".time()."\", html=\"".$html."\", smiley=\"".$smiley."\", xcodes=\"".$xcodes."\", breaks=\"".$breaks."\", images=\"".$images."\" WHERE id=1 ";
    	 	 $sql = "REPLACE INTO " . $xoopsDB -> prefix('credits') . " (id, text,header,date,html,smiley,xcodes,breaks,images) VALUES (\"1\", \"".$_POST['form_text']."\", \"".$_POST['form_header']."\", \"".time()."\", \"".$html."\",\"".$smiley."\",\"".$xcodes."\",\"".$breaks."\",\"".$images."\")";
				 $result = $xoopsDB -> query($sql);
			}
			
			if ($_POST["form_op"]=="change_tech")
			{
    	 	 $sql = "REPLACE INTO " . $xoopsDB -> prefix('credits') . " (id, text,header,date,html,smiley,xcodes,breaks,images) VALUES (\"2\", \"".$_POST['form_text']."\", \"".$_POST['form_header']."\", \"".time()."\", \"".$html."\",\"".$smiley."\",\"".$xcodes."\",\"".$breaks."\",\"".$images."\")";
				 $result = $xoopsDB -> query($sql);
			}

			if ($_POST["form_op"]=="change_info")
			{
    	 	 $sql = "REPLACE INTO " . $xoopsDB -> prefix('credits') . " (id, text,header,date,html,smiley,xcodes,breaks,images) VALUES (\"3\", \"".$_POST['form_text']."\", \"".$_POST['form_header']."\", \"".time()."\", \"".$html."\",\"".$smiley."\",\"".$xcodes."\",\"".$breaks."\",\"".$images."\")";
				 $result = $xoopsDB -> query($sql);
			}

    if ( isset($result) && ($result==1))
      {
         redirect_header('index.php', 3, _CRE_ADMIN_AKTUAL_OK);                 // Aktualizace DB dopadla dobre
      } else
      {
         redirect_header('index.php', 3, _CRE_ADMIN_AKTUAL_KO);                 // nedopadla dobre
      }
      
	}
	
xoops_cp_header(); 																														// Hlavicka stranky administrace. Opakuje se pro kazde zobrazeni
cre_adminmenu(0);

   echo "<fieldset>";
   echo "<legend style=\"color: #990000; font-weight: bold;\">"._CRE_ADMIN_INFO."</legend>";

   echo "<p>"._CRE_ADMIN_INDEX_SHOW_XOOPS." : ";
   if ( $xoopsModuleConfig['pref_show_xoops'] == 1)
   {
            echo "<b><font color='green'>". _CRE_ADMIN_ENABLE."</font></b>";
            echo "<br>"._CRE_ADMIN_INDEX_SHOW_MENU.": <b>". $xoopsModuleConfig['pref_menu_xoops']."</b>";
            echo "<br>"._CRE_ADMIN_INDEX_SHOW_SYSTEM." : ";
            if ( $xoopsModuleConfig['pref_show_system'] == 1)
            {
                 echo "<b><font color='green'>". _CRE_ADMIN_ENABLE."</font></b>";
            }
            else
            {
                 echo "<b><font color='red'>". _CRE_ADMIN_DISABLE."</font></b>";
            }
                 echo "<br>"._CRE_ADMIN_INDEX_SHOW_VERSION." : ";
            if ( $xoopsModuleConfig['pref_show_version'] == 1)
            {
                 echo "<b><font color='green'>". _CRE_ADMIN_ENABLE."</font></b>";
            }
            else
            {
                 echo "<b><font color='red'>". _CRE_ADMIN_DISABLE."</font></b>";
            }

    
    }
    else
    {
            echo "<b><font color='red'>". _CRE_ADMIN_DISABLE."</font></b>";
    }


   echo "<p>"._CRE_ADMIN_INDEX_SHOW_TECH." : ";
   if ( $xoopsModuleConfig['pref_show_tech'] == 1)
   {
            echo "<b><font color='green'>". _CRE_ADMIN_ENABLE."</font></b>";
            echo "<br>"._CRE_ADMIN_INDEX_SHOW_MENU.": <b>". $xoopsModuleConfig['pref_menu_tech']."</b>";
   }
   else
   {
            echo "<b><font color='red'>". _CRE_ADMIN_DISABLE."</font></b>";
   }

   echo "<p>"._CRE_ADMIN_INDEX_SHOW_INFO." : ";
   if ( $xoopsModuleConfig['pref_show_info'] == 1)
   {
            echo "<b><font color='green'>". _CRE_ADMIN_ENABLE."</font></b>";
            echo "<br>"._CRE_ADMIN_INDEX_SHOW_MENU.": <b>". $xoopsModuleConfig['pref_menu_info']."</b>";
   }
   else
   {
            echo "<b><font color='red'>". _CRE_ADMIN_DISABLE."</font></b>";
   }

   echo "</p>";
   
   echo "</fieldset>";
   
   echo "<fieldset>";
   echo "<legend style=\"color: #990000; font-weight: bold;\">"._CRE_ADMIN_HELP."</legend>";
   
   echo "<p><b>"._CRE_ADMIN_MENU_CREDITS."</b> - "._CRE_ADMIN_MENU_CREDITS_DESC." </p>";
   echo "<p><b>"._CRE_ADMIN_MENU_XOOPS."</b> - "._CRE_ADMIN_MENU_XOOPS_DESC." </p>";
   echo "<p><b>"._CRE_ADMIN_MENU_TECH."</b> - "._CRE_ADMIN_MENU_TECH_DESC." </p>";
   echo "<p><b>"._CRE_ADMIN_MENU_INFO."</b> - "._CRE_ADMIN_MENU_INFO_DESC." </p>";

   echo "</fieldset>";

   cre_adminfooter();                                                           // Moje paticka stranek
   xoops_cp_footer();   																												// Paticka stranky administrace. Opakuje se pro kazde zobrazeni

}
// -----------------------------------------------------------------------------------------------------------------------

// -----------------[ About site / o strance ]----------------------------------------------------------------------------
if (isset($_GET["op"]) && ($_GET["op"]=="credits" ))
{
   global $xoopsModule;
   xoops_cp_header();
   cre_adminmenu(1);

   $sql = "SELECT * FROM " . $xoopsDB -> prefix('credits') . " WHERE id=1";       			// Z DB vyctu nadpis
   $result = $xoopsDB -> query($sql);
   $myrow = $xoopsDB->fetchArray($result);

   $html = $myrow['html'];
   $smiley = $myrow['smiley'];
   $xcodes = $myrow['xcodes'];
   $breaks = $myrow['breaks'];
   $images = $myrow['images'];


		$formular = new XoopsThemeForm(_CRE_ADMIN_CHANGE_CREDITS, 'formular_c', 'index.php'); // Vytvoreni formulare. Nadpis, jmeno, Kam prejit po odelsani
		$formular->setExtra('enctype="multipart/form-data"');      // Typ formulare

    $options['editor'] = 'dhtmltextarea';   // typ pouziteho editoru a jeho predvolby
    $options['name'] = 'form_text';   			// jmeno promenne, kterou formular preda ke zpracovani
    $options['value'] =  $myrow['text'];    // Vychozi text v editoru
    $options['rows'] = 50; 									// default value = 5
    $options['cols'] = 50; 									// default value = 50
    $options['width'] = '100%'; 						// default value = 100%
    $options['height'] = '400px';						// default value = 400px   --- AZ SEMKA

    $formular->addElement(new XoopsFormText(_CRE_ADMIN_FORM_HEADER_CRED, 'form_header', 50, 255, $myrow['header']), true); // Vlozeni textoveho prvku
    $formular->addElement(new XoopsFormEditor(_CRE_ADMIN_FORM_TEXT_CRED, $options['name'], $options, $nohtml = false, $onfailure = 'textarea'), true); // Vlozeni TEXTAREA s editorem

   $options_tray = new XoopsFormElementTray(_CRE_ADMIN_VARIOUS,'<br />');// Blok predvoleb vlastnosti textu

   $html_checkbox = new XoopsFormCheckBox( '', 'form_html', $html );            // Povolit zpracovani HTML?
   $html_checkbox -> addOption( 1, _CRE_ADMIN_DOHTML );
   $options_tray -> addElement( $html_checkbox );

   $smiley_checkbox = new XoopsFormCheckBox( '', 'form_smiley', $smiley );      // Povolit zpracovani smajliku? (zobrazi se obrazkove)
   $smiley_checkbox -> addOption( 1, _CRE_ADMIN_DOSMILEY );
   $options_tray -> addElement( $smiley_checkbox );

   $xcodes_checkbox = new XoopsFormCheckBox( '', 'form_xcodes', $xcodes );      // Povolit XoopsCode?
   $xcodes_checkbox -> addOption( 1, _CRE_ADMIN_DOXCODE );
   $options_tray -> addElement( $xcodes_checkbox );

   $breaks_checkbox = new XoopsFormCheckBox( '', 'form_breaks', $breaks );      // POvolit zalamovani radek (funkce nl2br)
   $breaks_checkbox -> addOption( 1, _CRE_ADMIN_BREAKS );
   $options_tray -> addElement( $breaks_checkbox );

   $images_checkbox = new XoopsFormCheckBox( '', 'form_images', $images );      // Povolit zobrazeni obrazku vlozenych pres formular?
   $images_checkbox -> addOption( 1, _CRE_ADMIN_IMAGES );
   $options_tray -> addElement( $images_checkbox );

   $formular -> addElement( $options_tray );                                    // Predani bloku systemu a jeho zobrazeni

		$formular->addElement(new XoopsFormHidden('form_op', 'change_credits'), false); // Vlozeni skryteho prvku
    $formular->addElement(new XoopsFormButton('', 'save', _CRE_ADMIN_SAVE, 'submit')); // Zobrazeni tlacitka popis v řádku, jméno, popis tlačítka, typ (stejné jako HTML)

    $formular->display();  // Zobrazeni formulare

   xoops_cp_footer();
}
// -----------------------------------------------------------------------------------------------------------------------

// -----------------[ Technologie ]----------------------------------------------------------------------------
if (isset($_GET["op"]) && ($_GET["op"]=="tech" ))
{
   global $xoopsModule;
   xoops_cp_header();
   cre_adminmenu(2);

   $sql = "SELECT * FROM " . $xoopsDB -> prefix('credits') . " WHERE id=2";
   $result = $xoopsDB -> query($sql);
   $myrow = $xoopsDB->fetchArray($result);

   $html = $myrow['html'];
   $smiley = $myrow['smiley'];
   $xcodes = $myrow['xcodes'];
   $breaks = $myrow['breaks'];
   $images = $myrow['images'];


		$formular = new XoopsThemeForm(_CRE_ADMIN_CHANGE_TECH, 'formular_c', 'index.php'); // Vytvoreni formulare. Nadpis, jmeno, Kam prejit po odelsani
		$formular->setExtra('enctype="multipart/form-data"');      // Typ formulare

    $options['editor'] = 'dhtmltextarea';   // typ pouziteho editoru a jeho predvolby
    $options['name'] = 'form_text';   			// jmeno promenne, kterou formular preda ke zpracovani
    $options['value'] =  $myrow['text'];    // Vychozi text v editoru
    $options['rows'] = 50; 									// default value = 5
    $options['cols'] = 50; 									// default value = 50
    $options['width'] = '100%'; 						// default value = 100%
    $options['height'] = '400px';						// default value = 400px   --- AZ SEMKA

    $formular->addElement(new XoopsFormText(_CRE_ADMIN_FORM_HEADER_TECH, 'form_header', 50, 255, $myrow['header']), true); // Vlozeni textoveho prvku
    $formular->addElement(new XoopsFormEditor(_CRE_ADMIN_FORM_TEXT_TECH, $options['name'], $options, $nohtml = false, $onfailure = 'textarea'), true); // Vlozeni TEXTAREA s editorem

   $options_tray = new XoopsFormElementTray(_CRE_ADMIN_VARIOUS,'<br />');// Blok predvoleb vlastnosti textu

   $html_checkbox = new XoopsFormCheckBox( '', 'form_html', $html );            // Povolit zpracovani HTML?
   $html_checkbox -> addOption( 1, _CRE_ADMIN_DOHTML );
   $options_tray -> addElement( $html_checkbox );

   $smiley_checkbox = new XoopsFormCheckBox( '', 'form_smiley', $smiley );      // Povolit zpracovani smajliku? (zobrazi se obrazkove)
   $smiley_checkbox -> addOption( 1, _CRE_ADMIN_DOSMILEY );
   $options_tray -> addElement( $smiley_checkbox );

   $xcodes_checkbox = new XoopsFormCheckBox( '', 'form_xcodes', $xcodes );      // Povolit XoopsCode?
   $xcodes_checkbox -> addOption( 1, _CRE_ADMIN_DOXCODE );
   $options_tray -> addElement( $xcodes_checkbox );

   $breaks_checkbox = new XoopsFormCheckBox( '', 'form_breaks', $breaks );      // POvolit zalamovani radek (funkce nl2br)
   $breaks_checkbox -> addOption( 1, _CRE_ADMIN_BREAKS );
   $options_tray -> addElement( $breaks_checkbox );

   $images_checkbox = new XoopsFormCheckBox( '', 'form_images', $images );      // Povolit zobrazeni obrazku vlozenych pres formular?
   $images_checkbox -> addOption( 1, _CRE_ADMIN_IMAGES );
   $options_tray -> addElement( $images_checkbox );

   $formular -> addElement( $options_tray );                                    // Predani bloku systemu a jeho zobrazeni

		$formular->addElement(new XoopsFormHidden('form_op', 'change_tech'), false); // Vlozeni skryteho prvku
    $formular->addElement(new XoopsFormButton('', 'save', _CRE_ADMIN_SAVE, 'submit')); // Zobrazeni tlacitka popis v řádku, jméno, popis tlačítka, typ (stejné jako HTML)

    $formular->display();  // Zobrazeni formulare

   xoops_cp_footer();
}
// -----------------------------------------------------------------------------------------------------------------------

// -----------------[ Info ]----------------------------------------------------------------------------
if (isset($_GET["op"]) && ($_GET["op"]=="info" ))
{
   global $xoopsModule;
   xoops_cp_header();
   cre_adminmenu(3);

   $sql = "SELECT * FROM " . $xoopsDB -> prefix('credits') . " WHERE id=3";
   $result = $xoopsDB -> query($sql);
   $myrow = $xoopsDB->fetchArray($result);

   $html = $myrow['html'];
   $smiley = $myrow['smiley'];
   $xcodes = $myrow['xcodes'];
   $breaks = $myrow['breaks'];
   $images = $myrow['images'];


		$formular = new XoopsThemeForm(_CRE_ADMIN_CHANGE_INFO, 'formular_c', 'index.php');
		$formular->setExtra('enctype="multipart/form-data"');

    $options['editor'] = 'dhtmltextarea';   // typ pouziteho editoru a jeho predvolby
    $options['name'] = 'form_text';   			// jmeno promenne, kterou formular preda ke zpracovani
    $options['value'] =  $myrow['text'];    // Vychozi text v editoru
    $options['rows'] = 50; 									// default value = 5
    $options['cols'] = 50; 									// default value = 50
    $options['width'] = '100%'; 						// default value = 100%
    $options['height'] = '400px';						// default value = 400px   --- AZ SEMKA

    $formular->addElement(new XoopsFormText(_CRE_ADMIN_FORM_HEADER_INFO, 'form_header', 50, 255, $myrow['header']), true); // Vlozeni textoveho prvku
    $formular->addElement(new XoopsFormEditor(_CRE_ADMIN_FORM_TEXT_INFO, $options['name'], $options, $nohtml = false, $onfailure = 'textarea'), true); // Vlozeni TEXTAREA s editorem

   $options_tray = new XoopsFormElementTray(_CRE_ADMIN_VARIOUS,'<br />');// Blok predvoleb vlastnosti textu

   $html_checkbox = new XoopsFormCheckBox( '', 'form_html', $html );            // Povolit zpracovani HTML?
   $html_checkbox -> addOption( 1, _CRE_ADMIN_DOHTML );
   $options_tray -> addElement( $html_checkbox );

   $smiley_checkbox = new XoopsFormCheckBox( '', 'form_smiley', $smiley );      // Povolit zpracovani smajliku? (zobrazi se obrazkove)
   $smiley_checkbox -> addOption( 1, _CRE_ADMIN_DOSMILEY );
   $options_tray -> addElement( $smiley_checkbox );

   $xcodes_checkbox = new XoopsFormCheckBox( '', 'form_xcodes', $xcodes );      // Povolit XoopsCode?
   $xcodes_checkbox -> addOption( 1, _CRE_ADMIN_DOXCODE );
   $options_tray -> addElement( $xcodes_checkbox );

   $breaks_checkbox = new XoopsFormCheckBox( '', 'form_breaks', $breaks );      // POvolit zalamovani radek (funkce nl2br)
   $breaks_checkbox -> addOption( 1, _CRE_ADMIN_BREAKS );
   $options_tray -> addElement( $breaks_checkbox );

   $images_checkbox = new XoopsFormCheckBox( '', 'form_images', $images );      // Povolit zobrazeni obrazku vlozenych pres formular?
   $images_checkbox -> addOption( 1, _CRE_ADMIN_IMAGES );
   $options_tray -> addElement( $images_checkbox );

   $formular -> addElement( $options_tray );                                    // Predani bloku systemu a jeho zobrazeni

		$formular->addElement(new XoopsFormHidden('form_op', 'change_info'), false); // Vlozeni skryteho prvku
    $formular->addElement(new XoopsFormButton('', 'save', _CRE_ADMIN_SAVE, 'submit')); // Zobrazeni tlacitka popis v řádku, jméno, popis tlačítka, typ (stejné jako HTML)

    $formular->display();  // Zobrazeni formulare

   xoops_cp_footer();
}

//----------------------------------------------------------------


?>