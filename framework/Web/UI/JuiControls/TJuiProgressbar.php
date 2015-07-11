<?php
/**
 * TJuiProgressbar class file.
 *
 * @author Fabio Bas <ctrlaltca[at]gmail[dot]com>
 * @link http://www.pradosoft.com/
 * @copyright Copyright &copy; 2013-2014 PradoSoft
 * @license http://www.pradosoft.com/license/
 * @package Prado\Web\UI\JuiControls
 */

namespace Prado\Web\UI\JuiControls;

use Prado\Prado;
use Prado\Web\Javascripts\TJavaScript;
use Prado\Web\UI\ActiveControls\ICallbackEventHandler;
use Prado\Web\UI\ActiveControls\TActivePanel;

Prado::using('System.Web.UI.JuiControls.TJuiControlAdapter');
Prado::using('System.Web.UI.ActiveControls.TActivePanel');

/**
 * TJuiProgressbar class.
 *
 * TJuiProgressbar is an extension to {@link TActivePanel} based on jQuery-UI's
 * {@link http://jqueryui.com/progressbar/ Progressbar} widget.
 *
 * <code>
 * <com:TJuiProgressbar
 *	ID="pbar1"
 *	Options.Max="100"
 *	Options.Value="75"
 *  OnChange="pbar1_changed"
 * />
 * </code>
 *
 * @author Fabio Bas <ctrlaltca[at]gmail[dot]com>
 * @package Prado\Web\UI\JuiControls
 * @since 3.3
 */
class TJuiProgressbar extends TActivePanel implements IJuiOptions, ICallbackEventHandler
{
	protected $_options;

	/**
	 * Creates a new callback control, sets the adapter to
	 * TActiveControlAdapter. If you override this class, be sure to set the
	 * adapter appropriately by, for example, by calling this constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		$this->setAdapter(new TJuiControlAdapter($this));
	}

	/**
	 * Object containing defined javascript options
	 * @return TJuiControlOptions
	 */
	public function getOptions()
	{
		if($this->_options===null)
			$this->_options=new TJuiControlOptions($this);
		return $this->_options;
	}

	/**
	 * Array containing valid javascript options
	 * @return array()
	 */
	public function getValidOptions()
	{
		return array('disabled', 'max', 'value');
	}

	/**
	 * Array containing valid javascript events
	 * @return array()
	 */
	public function getValidEvents()
	{
		return array('change', 'complete', 'create');
	}

	/**
	 * @return array list of callback options.
	 */
	protected function getPostBackOptions()
	{
		return $this->getOptions()->toArray();
	}

	/**
	 * Ensure that the ID attribute is rendered and registers the javascript code
	 * for initializing the active control.
	 */
	protected function addAttributesToRender($writer)
	{
		parent::addAttributesToRender($writer);

		$writer->addAttribute('id',$this->getClientID());
		$options=TJavascript::encode($this->getPostBackOptions());
		$cs=$this->getPage()->getClientScript();
		$code="jQuery('#".$this->getClientId()."').progressbar(".$options.");";
		$cs->registerEndScript(sprintf('%08X', crc32($code)), $code);
	}

	/**
	 * Raises callback event. This method is required by the {@link ICallbackEventHandler}
	 * interface.
	 * @param TCallbackEventParameter the parameter associated with the callback event
	 */
	public function raiseCallbackEvent($param)
	{
		$this->getOptions()->raiseCallbackEvent($param);
	}

	/**
	 * Raises the OnChange event
	 * @param object $params event parameters
	 */
	public function onChange($params)
	{
		$this->raiseEvent('OnChange', $this, $params);
	}

	/**
	 * Raises the OnComplete event
	 * @param object $params event parameters
	 */
	public function onComplete($params)
	{
		$this->raiseEvent('OnComplete', $this, $params);
	}

	/**
	 * Raises the OnCreate event
	 * @param object $params event parameters
	 */
	public function onCreate($params)
	{
		$this->raiseEvent('OnCreate', $this, $params);
	}
}
