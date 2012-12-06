<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 b:dreizehn, Germany <typo3@b13.de>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * The application logic for the hook to create direct links to external targets
 *
 * @package Tx_Directexternallinks
 */
class Tx_Directexternallinks_Hooks {
	
	
	/**
	 * main hook when creating a link to a page
	 *
	 *	$params = array(
	 *		'LD' => &$LD,
	 *		'args' => array('page' => $page, 'oTarget' => $oTarget, 'no_cache' => $no_cache, 'script' => $script, 'overrideArray' => $overrideArray, 'addParams' => $addParams, 'typeOverride' => $typeOverride, 'targetDomain' => $targetDomain),
	 *		'typeNum' => $typeNum
	 *	);
	 * @param t3lib_tstemplate $pObj
	 */
	public function linkDataPostProc(&$params, $pObj) {
		$pageData = $params['args']['page'];
		// check if the doktype is "external URL"
		if ($pageData['doktype'] == 3 && !empty($pageData['url'])) {
			$targetUrl = $pageData['url'];
			$urlParts = parse_url($targetUrl);
			if (!$urlParts['scheme']) {
				switch ($pageData['url_scheme']) {
					case 1:
						$urlScheme = 'http://';
						break;
					case 2:
						$urlScheme = 'https://';
						break;
					default:
						$urlScheme = 'http://';
						break;
				}
				$targetUrl = $urlScheme . $targetUrl;
			}
			$params['LD']['totalURL'] = $targetUrl;
		}
	}
}
