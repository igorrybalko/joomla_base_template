<?php
/**
 * @package joomla_base_template
 * @author Rybalko Igor
 * @version 0.9.1
 * @copyright (C) 2018 http://wolfweb.com.ua
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

//convert url to lowercase
$url_get = urldecode($_SERVER['REQUEST_URI']);
if (strpos($url_get,'?') !== false) {
    $a = explode("?", $url_get);
    $a[0] = mb_strtolower($a[0]);
    $newurl = $a[0]."?".$a[1];
} else {
    $newurl = mb_strtolower($url_get);
}
if(urldecode($_SERVER['REQUEST_URI']) != $newurl) {
    header('Location: '.$newurl, true, 301) ;
}

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

JHtml::_('formbehavior.chosen', 'select', false);

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$lang     = $app->input->getCmd('language', '');
$sitename = $app->get('sitename');
$controller = $app->input->getCmd('controller', '');

//getting active menu page class parameter
$menu = $app->getMenu();
$activeMenu = $menu->getActive();
if ($activeMenu) {
    $activeMenuClass = trim($activeMenu->params->get('pageclass_sfx'));
}

//check Zoo component
if(class_exists('App')){
    $zoo = App::getInstance('zoo');
    $obzoo = $zoo->path->app->zoo->getApplication();
    if($obzoo){
        $zooAppAlias = $obzoo->alias;
    }
}

$bodyclass = $option
    . ' view-' . $view
    . ($layout ? ' layout-' . $layout : ' no-layout')
    . ($lang ? ' lang-' . $lang : ' no-lang')
    . ($task ? ' task-' . $task : ' no-task')
    . ($itemid ? ' itemid-' . $itemid : '')
    . ($params->get('fluidContainer') ? ' fluid' : '')
    . ($controller ? ' controller-' . $controller : ' no-controller')
    . (isset($zooAppAlias) ? ' zooalias-' .  $zooAppAlias : ' no-zoo')
    . ((isset($activeMenuClass) && $activeMenuClass) ?  ' menuclass-' . $activeMenuClass : '');

$this->setGenerator('wolfweb');

foreach ($doc->_links as $k => $array) {
    if ($array['relation'] == 'canonical') {
        unset($doc->_links[$k]);
    }
}

JHtml::_('jquery.framework');

//remove needless scripts
unset($doc->_scripts['/media/jui/js/jquery-migrate.min.js'],
$doc->_scripts['/media/system/js/mootools-core.js'],
$doc->_scripts['/media/system/js/core.js']);

$this->countModules('sidebar') ? $sidebar = "column" : $sidebar = "wide";

require_once 'view.php';