<?php
/**
 * @package     joomla.template
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */


use Joomla\CMS\Factory;


if (!function_exists('homeUrl'))
{
	/**
	 *
	 * @return string
	 *
	 * @since 1.0
	 */
	function homeUrl(): string
	{
		try
		{
			$app           = Factory::getApplication();
			$lang          = $app->getLanguage();
			$shortCodeLang = null;

			/** @var string $siteLang */
			$siteLang             = JComponentHelper::getParams('com_languages')->get('site');
			$languagefilterPlugin = JPluginHelper::getPlugin('system', 'languagefilter');


			if (is_object($languagefilterPlugin))
			{
				$params = new JRegistry($languagefilterPlugin->params);
				if ($params->get('remove_default_prefix') === 1 && $lang->getTag() === $siteLang)
				{
					return JUri::base();
				}

				// Lang Code
				$langTag = explode('-', $lang->getTag());
				if (isset($langTag[0]))
				{
					$shortCodeLang = $langTag[0] . DIRECTORY_SEPARATOR;
				}
			}

			return JUri::base() . $shortCodeLang;
		}
		catch (Exception $exception)
		{
			return JUri::base();
		}
	}
}

