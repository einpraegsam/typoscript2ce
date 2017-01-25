<?php

########################################################################
# Extension Manager/Repository config file for ext "typoscript2ce".
#
# Auto generated 02-10-2011 04:40
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = [
	'title' => 'typoscript2contentelement',
	'description' => 'typoscript2contentelement allows you to show the result
		of typoscript (e.g. HMENU) as a contentelement - a simple thing...',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '1.1.1',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'TYPO3_version' => '',
	'PHP_version' => '',
	'module' => '',
	'state' => 'stable',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 0,
	'lockType' => '',
	'author' => 'Alex Kellner',
	'author_email' => 'alexander.kellner@in2code.de',
	'author_company' => 'in2code.de',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => [
		'depends' => [
			'typo3' => '6.0.0-8.99.99',
			'extbase' => '6.0.0-8.99.99',
			'fluid' => '6.0.0-8.99.99',
			'cms' => '',
			'php' => '5.5.0-0.0.0'
		],
		'conflicts' => [],
		'suggests' => [],
	],
];
