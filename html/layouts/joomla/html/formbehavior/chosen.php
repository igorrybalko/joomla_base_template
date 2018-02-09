<?php
/**
 * @package joomla_base_template
 * @author Rybalko Igor
 * @version 0.9.1
 * @copyright (C) 2018 http://wolfweb.com.ua
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
*/

defined('JPATH_BASE') or die;

/**
 * Layout variables
 * ---------------------
 *
 * @var  string   $selector       The id of the field
 * @var  array    $options        The options array
 * @var  boolean  $debug          Are we in debug mode?
 */

//extract($displayData);
//
////Include jQuery
//JHtml::_('jquery.framework');
//JHtml::_('script', 'jui/chosen.jquery.min.js', false, true, false, false, $debug);
//JHtml::_('stylesheet', 'jui/chosen.css', false, true);
//
// //Options array to json options string
//$options_str = json_encode($options, ($debug && defined('JSON_PRETTY_PRINT') ? JSON_PRETTY_PRINT : false));
//
//
//JFactory::getDocument()->addScriptDeclaration(
//    "
//
//		jQuery(document).ready(function (){
//			jQuery('" . $selector . "').chosen(" . $options_str . ");
//		});
//	"
//);