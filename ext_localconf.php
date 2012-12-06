<?php

if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

// hook into tstemplate->linkData
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tstemplate.php']['linkData-PostProc'][] = 'EXT:directexternallinks/Classes/Hooks.php:Tx_Directexternallinks_Hooks->linkDataPostProc';