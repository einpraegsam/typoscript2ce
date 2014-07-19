<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 Alex Kellner <alexander.kellner@einpraegsam.net>
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
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */

require_once(PATH_tslib.'class.tslib_pibase.php');


/**
 * Plugin 'typoscript2ce' for the 'typoscript2ce' extension.
 *
 * @author	Alex Kellner <alexander.kellner@einpraegsam.net>
 * @package	TYPO3
 * @subpackage	tx_typoscript2ce
 */
class tx_typoscript2ce_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_typoscript2ce_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_typoscript2ce_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'typoscript2ce';	// The extension key.
	var $pi_checkCHash = true;
	
	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content, $conf) {
		$this->conf = $conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();
		$this->pi_initPIflexForm();
		$this->flex2conf();
		
		if ($this->conf['main.']['tsobject'] != '') { // only if object field was set
			// config
			$str = array(); $array = array(); // init
			$tsarray = t3lib_div::trimExplode('.', $this->conf['main.']['tsobject'], 1); // $tsarray[0] = lib // $tsarray[1] = object
				
			// let's go		
			for ($i=0; $i<count($tsarray); $i++) { // One loop for every level in typoscript object array
				$str[0] .= '[\''.str_replace(';','',$tsarray[$i]) . ($i==(count($tsarray)-1) ? '' : '.') . '\']'; // create php code for array like ['lib.']['object']
				$str[1] .= '[\''.str_replace(';','',$tsarray[$i]).'.\']'; // create php code for array like ['lib.']['object.']
			}
			eval("\$array[0] = \$GLOBALS['TSFE']->tmpl->setup$str[0];"); // $newarray = $array['lib.']['object']
			eval("\$array[1] = \$GLOBALS['TSFE']->tmpl->setup$str[1];"); // $newarray = $array['lib.']['object.']
			
			$localCObj = t3lib_div::makeInstance('tslib_cObj');
			/*
			$row = array ( // $row for using .field in typoscript
				'uid' => $this->uid, // make current field uid available
				'label' => $this->dontAllow($this->title), // make current label available
				'ttcontent_uid' => $this->cObj->data['_LOCALIZED_UID'] > 0 ? $this->cObj->data['_LOCALIZED_UID'] : $this->cObj->data['uid'] // make current tt_content uid available
			);
			$localCObj->start($row, 'tt_content'); // enable .field to use uid and label in typoscript
			*/
			$content = $localCObj->cObjGetSingle($array[0], $array[1]); // parse typoscript
		}
		if (!empty($content)) return $this->pi_wrapInBaseClass($content);
	}
	
	
	// Function flex2conf() adds values from flexform to $this->conf
	function flex2conf() {
		if (is_array($this->cObj->data['pi_flexform']['data'])) { // if there are flexform values
			foreach ($this->cObj->data['pi_flexform']['data'] as $key => $value) { // every flexform category
				if (count($this->cObj->data['pi_flexform']['data'][$key]['lDEF']) > 0) { // if there are flexform values
					foreach ($this->cObj->data['pi_flexform']['data'][$key]['lDEF'] as $key2 => $value2) { // every flexform option
						if ($this->pi_getFFvalue($this->cObj->data['pi_flexform'], $key2, $key)) { // if value exists in flexform
							$this->conf[$key.'.'][$key2] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], $key2, $key); // overwrite $this->conf
						}
					}
				}
			}
		}
	}
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/typoscript2ce/pi1/class.tx_typoscript2ce_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/typoscript2ce/pi1/class.tx_typoscript2ce_pi1.php']);
}

?>