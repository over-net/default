<?php

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

include "functions.php";

/** @var Joomla\CMS\Document\HtmlDocument $this */

$app = Factory::getApplication();


// Add Favicon from images folder
$this->addHeadLink(HTMLHelper::_('image', 'favicon.ico', '', [], true, 1), 'icon', 'rel', ['type' => 'image/x-icon']);


// Detecting Active Variables
$user      = $app->getSession()->get('user');
$option    = $app->input->getCmd('option', '');
$view      = $app->input->getCmd('view', '');
$layout    = $app->input->getCmd('layout', '');
$task      = $app->input->getCmd('task', '');
$itemId    = $app->input->getCmd('Itemid', '') ? (int) $app->input->getCmd('Itemid') : null;
$siteName  = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');
$menu      = $app->getMenu()->getActive();
$pageClass = $menu !== null ? $menu->getParams()->get('pageclass_sfx', '') : null;

//Get params from template styling
$stickyHeader     = $this->params->get('stickyHeader');
$fullScreenLayout = $this->params->get('fullScreenLayout');
$showImageLogo    = $this->params->get('showImageLogo');
$dropDownFavorite = $this->params->get('dropDownFavorite');
$dropDownBasket   = $this->params->get('dropDownBasket');


// Get this template's path
$templatePath = 'templates/' . $this->template;
$mediaPath = 'media/templates/site/' . $this->template;


//$this->getWebAssetManager()->disableScript('jquery');
$this->getWebAssetManager()->disableScript('jquery-noconflict');
//$this->getWebAssetManager()->disableScript('jquery-migrate');
$this->getWebAssetManager()->disableScript('core');
$this->getWebAssetManager()->disableStyle('fontawesome');

// Disable bootstrap

//dd($this->getWebAssetManager());

//$this->getWebAssetManager()->disableScript('bootstrap.es5');
//$this->getWebAssetManager()->disableScript('bootstrap.alert');
//$this->getWebAssetManager()->disableScript('bootstrap.button');
//$this->getWebAssetManager()->disableScript('bootstrap.carousel');
//$this->getWebAssetManager()->disableScript('bootstrap.dropdown');
//$this->getWebAssetManager()->disableScript('bootstrap.modal');
//$this->getWebAssetManager()->disableScript('bootstrap.offcanvas');
//$this->getWebAssetManager()->disableScript('bootstrap.popover');
//$this->getWebAssetManager()->disableScript('bootstrap.scrollspy');
//$this->getWebAssetManager()->disableScript('bootstrap.tab');
//$this->getWebAssetManager()->disableScript('bootstrap.toast');
//$this->getWebAssetManager()->disableScript('bootstrap.collapse');


// Load our frameworks
$this->getWebAssetManager()->useAsset('script', 'jquery');
$this->getWebAssetManager()->useAsset('script', 'jquery-migrate');

$this->getWebAssetManager()->useStyle('bootstrap.css');
$this->getWebAssetManager()->useScript('bootstrap.es5');
$this->getWebAssetManager()->useScript('bootstrap.alert');
$this->getWebAssetManager()->useScript('bootstrap.button');
$this->getWebAssetManager()->useScript('bootstrap.carousel');
$this->getWebAssetManager()->useScript('bootstrap.dropdown');
$this->getWebAssetManager()->useScript('bootstrap.modal');
$this->getWebAssetManager()->useScript('bootstrap.offcanvas');
$this->getWebAssetManager()->useScript('bootstrap.popover');
$this->getWebAssetManager()->useScript('bootstrap.scrollspy');
$this->getWebAssetManager()->useScript('bootstrap.tab');
$this->getWebAssetManager()->useScript('bootstrap.toast');
$this->getWebAssetManager()->useScript('bootstrap.collapse');

$this->getWebAssetManager()->useStyle('template.default.theme.css');
$this->getWebAssetManager()->useStyle('template.default.fontawesome-6.css');

//$this->getWebAssetManager()->useStyle('template.default.bootstrap');
//$this->getWebAssetManager()->useScript('template.default.bootstrap.popper');



//$this->getWebAssetManager()->useScript('template.default.bootstrap.popper');

//$this->getWebAssetManager()->useStyle('bootstrap.css');
//$this->getWebAssetManager()->useStyle('template.default.bootstrap');
//$this->getWebAssetManager()->useScript('template.default.bootstrap.popper');
// Plugins

$this->getWebAssetManager()->useScript('template.default.scripts.js');
$this->getWebAssetManager()->useScript('template.default.scripts.es.js');

//Register our web assets (Css/JS)
$this->getWebAssetManager()->useStyle('template.default.font.montserrat.css');
$this->getWebAssetManager()->useStyle('template.default.font.amatic.css');




//Set viewport
$this->setHtml5(true);
$this->setGenerator(null);
$this->setMetaData('viewport', 'width=device-width, initial-scale=1');

// Set fonts preconnect
$this->addHeadLink( 'https://fonts.googleapis.com', 'preconnect');
$this->addHeadLink( 'https://fonts.gstatic.com', 'preconnect', 'rel', [
	'crossorigin' => 'anonymous'
]);
