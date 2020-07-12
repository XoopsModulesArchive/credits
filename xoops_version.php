<?php
$modversion['name']                           = _CRE_MODULE_NAME;
$modversion['version']                        = "1.1";
$modversion['description']                    = _CRE_MODULE_DESC;
$modversion['author']                         = "Sasa Svobodova (Zirafka)";
$modversion['credits']                        = "www.zirafoviny.cz";
$modversion['help']                           = "no";
$modversion['license']                        = "GNU GPL";
$modversion['official']                       = "no";
$modversion['image']                          = "images/logo.gif";
$modversion['dirname']                        = "credits";

// Main menu / Uzivatelska nabidka
$modversion['hasMain']                        = 1;

global  $xoopsModuleConfig, $xoopsUser;

if ( $xoopsModuleConfig['pref_show_xoops'] == 1 ) {                             // Xoops info
$i=1;
$modversion['sub'][$i]['name']  = $xoopsModuleConfig['pref_menu_xoops'];
$modversion['sub'][$i]['url']   = "xoops.php";
}

if ( $xoopsModuleConfig['pref_show_tech'] == 1 ){                               // Tech info
$i++;
$modversion['sub'][$i]['name']  = $xoopsModuleConfig['pref_menu_tech'];
$modversion['sub'][$i]['url']   = "tech.php";
}

if ( $xoopsModuleConfig['pref_show_info'] == 1 ){                               // Info info :-)
$i++;
$modversion['sub'][$i]['name']  = $xoopsModuleConfig['pref_menu_info'];
$modversion['sub'][$i]['url']   = "info.php";
}

// Administration / Administrace
$modversion['hasAdmin']                       = 1;
$modversion['adminindex']                     = "admin/index.php";
$modversion['adminmenu']                      = "admin/menu.php";

// Database
$modversion['sqlfile']['mysql']               = "sql/mysql.sql";
$modversion['tables'][0]                      = "credits";

// Xoops Templates / Sablony
$modversion['templates'][1]['file']           = 'cre_index.html';
$modversion['templates'][1]['description']    = '';
$modversion['templates'][2]['file']           = 'cre_xoops.html';
$modversion['templates'][2]['description']    = '';
$modversion['templates'][3]['file']           = 'cre_tech.html';
$modversion['templates'][3]['description']    = '';

// XOOPS Search / hledani
$modversion['hasSearch']                      = 0;

// Xoops Notification / Upozorneni
$modversion['hasNotification']                = 0;

// Preferences / Predvolby

$i=1;                                                                           // Show XOOPS?
$modversion['config'][$i]['name']             = 'pref_show_xoops';
$modversion['config'][$i]['title']            = '_CRE_PREF_SHOW_XOOPS';
$modversion['config'][$i]['description']      = '_CRE_PREF_SHOW_XOOPS_DESC';
$modversion['config'][$i]['formtype']         = 'yesno';
$modversion['config'][$i]['valuetype']        = 'int';
$modversion['config'][$i]['default']          = 0;

$i++;                                                                           // Menu text
$modversion['config'][$i]['name']            = 'pref_menu_xoops';
$modversion['config'][$i]['title']           = '_CRE_PREF_MENU_XOOPS';
$modversion['config'][$i]['description']     = '_CRE_PREF_MENU_XOOPS_DESC';
$modversion['config'][$i]['formtype']        = 'textbox';
$modversion['config'][$i]['valuetype']       = 'text';
$modversion['config'][$i]['default']         = 'Xoops';

$i++;                                                                           // Xoops header
$modversion['config'][$i]['name']            = 'pref_xoops_header';
$modversion['config'][$i]['title']           = '_CRE_PREF_XOOPS_HEADER';
$modversion['config'][$i]['description']     = '_CRE_PREF_XOOPS_HEADER_DESC';
$modversion['config'][$i]['formtype']        = 'textbox';
$modversion['config'][$i]['valuetype']       = 'text';
$modversion['config'][$i]['default']         = 'Xoops';

$i++;                                                                           // Show system module?
$modversion['config'][$i]['name']             = 'pref_show_system';
$modversion['config'][$i]['title']            = '_CRE_PREF_SHOW_SYSTEM';
$modversion['config'][$i]['description']      = '_CRE_PREF_SHOW_SYSTEM_DESC';
$modversion['config'][$i]['formtype']         = 'yesno';
$modversion['config'][$i]['valuetype']        = 'int';
$modversion['config'][$i]['default']          = 0;

$i++;                                                                           // Version
$modversion['config'][$i]['name']             = 'pref_show_version';
$modversion['config'][$i]['title']            = '_CRE_PREF_SHOW_VERSION';
$modversion['config'][$i]['description']      = '_CRE_PREF_SHOW_VERSION_DESC';
$modversion['config'][$i]['formtype']         = 'yesno';
$modversion['config'][$i]['valuetype']        = 'int';
$modversion['config'][$i]['default']          = 0;

$i++;                                                                           // Technologies?
$modversion['config'][$i]['name']             = 'pref_show_tech';
$modversion['config'][$i]['title']            = '_CRE_PREF_SHOW_TECH';
$modversion['config'][$i]['description']      = '_CRE_PREF_SHOW_TECH_DESC';
$modversion['config'][$i]['formtype']         = 'yesno';
$modversion['config'][$i]['valuetype']        = 'int';
$modversion['config'][$i]['default']          = 0;

$i++;                                                                           // Menu text
$modversion['config'][$i]['name']            = 'pref_menu_tech';
$modversion['config'][$i]['title']           = '_CRE_PREF_MENU_TECH';
$modversion['config'][$i]['description']     = '_CRE_PREF_MENU_TECH_DESC';
$modversion['config'][$i]['formtype']        = 'textbox';
$modversion['config'][$i]['valuetype']       = 'text';
$modversion['config'][$i]['default']         = 'Xoops';

$i++;                                                                           // Information
$modversion['config'][$i]['name']             = 'pref_show_info';
$modversion['config'][$i]['title']            = '_CRE_PREF_SHOW_INFO';
$modversion['config'][$i]['description']      = '_CRE_PREF_SHOW_INFO_DESC';
$modversion['config'][$i]['formtype']         = 'yesno';
$modversion['config'][$i]['valuetype']        = 'int';
$modversion['config'][$i]['default']          = 0;

$i++;                                                                           // Menu text
$modversion['config'][$i]['name']            = 'pref_menu_info';
$modversion['config'][$i]['title']           = '_CRE_PREF_MENU_INFO';
$modversion['config'][$i]['description']     = '_CRE_PREF_MENU_INFO_DESC';
$modversion['config'][$i]['formtype']        = 'textbox';
$modversion['config'][$i]['valuetype']       = 'text';
$modversion['config'][$i]['default']         = 'Xoops';

?>