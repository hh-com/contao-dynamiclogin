<?php

    $GLOBALS['TL_DCA']['tl_module']['palettes']['login'] = str_replace(
        'redirectBack', 
        'redirectBack,iframepage',
        $GLOBALS['TL_DCA']['tl_module']['palettes']['login']);

    $GLOBALS['TL_DCA']['tl_module']['fields']['iframepage'] = array
    (
        'label'                   => ['This module is included on the (iFrame)-Page','Select the (iFrame)-Page used for the dynamic login.'],
        'inputType'               => 'pageTree',
        'foreignKey'              => 'tl_page.title',
        'eval'                    => array('fieldType'=>'radio', 'tl_class'=>'clr'),
        'sql'                     => "int(10) unsigned NOT NULL default 0",
        'relation'                => array('type'=>'hasOne', 'load'=>'lazy')
    );

?>