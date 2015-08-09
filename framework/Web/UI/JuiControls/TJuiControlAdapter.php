<?php
/**
 * TJuiControlAdapter class file.
 *
 * @author Fabio Bas <ctrlaltca@gmail.com>
 * @link http://www.pradosoft.com/
 * @copyright Copyright &copy; 2013-2014 PradoSoft
 * @license http://www.pradosoft.com/license/
 * @package Prado\Web\UI\JuiControls
 */

namespace Prado\Web\UI\JuiControls;

use Prado\Prado;
use Prado\Web\UI\ActiveControls\TActiveControlAdapter;


/**
 * TJuiControlAdapter class
 *
 * TJuiControlAdapter is the base adapter class for controls that are
 * derived from a jQuery-ui widget. It exposes convenience methods to
 * publish jQuery-UI javascript and css assets.
 *
 * @author Fabio Bas <ctrlaltca@gmail.com>
 * @package Prado\Web\UI\JuiControls
 * @since 3.3
 */
class TJuiControlAdapter extends TActiveControlAdapter
{
	const SCRIPT_PATH = 'jquery';
	const CSS_PATH = 'css';
	const BASE_CSS_FILENAME ='jquery-ui.css';

	/**
	 * @param string set the jquery-ui style
	 */
	public function setJuiBaseStyle($value)
	{
	   $this->getControl()->setViewState('JuiBaseStyle', $value, 'base');
	}

	/**
	 * @return string current jquery-ui style
	 */
	public function getJuiBaseStyle()
	{
	   return $this->getControl()->getViewState('JuiBaseStyle', 'base');
	}

	/**
	 * Inject jquery script and styles before render
	 */
	public function onPreRender($param)
	{
		parent::onPreRender($param);
		$this->getPage()->getClientScript()->registerPradoScript('jqueryui');
		$this->publishJuiStyle(self::BASE_CSS_FILENAME);
	}

	/**
	 * @param string jQuery asset file in the self::SCRIPT_PATH directory.
	 * @return string jQuery asset url.
	 */
	protected function getAssetUrl($file='')
	{
		$base = $this->getPage()->getClientScript()->getPradoScriptAssetUrl();
		return $base.'/'.self::SCRIPT_PATH.'/'.$file;
	}

	/**
	 * Publish the jQuery-ui style Css asset file.
	 * @param file name
	 * @return string Css file url.
	 */
	public function publishJuiStyle($file)
	{
		$url = $this->getAssetUrl(self::CSS_PATH.'/'.$this->getJuiBaseStyle().'/'.$file);
		$cs = $this->getPage()->getClientScript();
		if(!$cs->isStyleSheetFileRegistered($url))
			$cs->registerStyleSheetFile($url, $url);
		return $url;
	}

}