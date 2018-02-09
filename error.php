<?php
/**
 * @package joomla_base_template
 * @author Rybalko Igor
 * @version 0.9.1
 * @copyright (C) 2018 http://wolfweb.com.ua
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
*/

defined('_JEXEC') or die;

// Get language and direction
$doc             = JFactory::getDocument();
$app             = JFactory::getApplication();
$this->language  = $doc->language;
$this->direction = $doc->direction;
$lang = substr(JFactory::getLanguage()->getTag(), 0, 2);
switch($lang){
	case 'ru': $langcorr = 'ru/';break;
	case 'en': $langcorr = 'en/';break;
	default: $langcorr = '';
}


if ($this->_error->getCode() == '404') {
	header("HTTP/1.0 404 Not Found");
	echo file_get_contents(JURI::root().$langcorr . '404');
	exit;
}