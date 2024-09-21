<?php

    $GLOBALS['TL_DCA']['tl_page']['palettes']['root'] = str_replace(
        'alias', 
        'alias,loginModule',
        $GLOBALS['TL_DCA']['tl_page']['palettes']['root']);

    $GLOBALS['TL_DCA']['tl_page']['palettes']['rootfallback'] = str_replace(
            'alias', 
            'alias;loginModule',
            $GLOBALS['TL_DCA']['tl_page']['palettes']['rootfallback']);

    $GLOBALS['TL_DCA']['tl_page']['fields']['loginModule'] = array
    (
        'label'           => ['This page includes the login iframe','Select the Login-Module used for this page.'],
        'exclude'         => true,
        'inputType'       => 'select', 
        'foreignKey'      => 'tl_module.name',
        'relation'        => array('type'=>'hasOne', 'load'=>'lazy'),
        'sql'             => "int(10) unsigned NOT NULL default 0",
        'eval'            => array('tl_class'=>'m12 w50', 'includeBlankOption' => true, 'chosen' => true),
    );

?>