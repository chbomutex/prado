<?php
/**
 * TStyle class file.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.pradosoft.com/
 * @copyright Copyright &copy; 2005-2014 PradoSoft
 * @license http://www.pradosoft.com/license/
 * @package Prado\Web\UI\WebControls
 */

namespace Prado\Web\UI\WebControls;
use Prado\TPropertyValue;

/**
 * TStyle class
 *
 * TStyle encapsulates the CSS style applied to a control.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @package Prado\Web\UI\WebControls
 * @since 3.0
 */
class TStyle extends \Prado\TComponent
{
	/**
	 * @var array storage of CSS fields
	 */
	private $_fields=array();
	/**
	 * @var TFont font object
	 */
	private $_font=null;
	/**
	 * @var string CSS class name
	 */
	private $_class=null;
	/**
	 * @var string CSS style string (those not represented by specific fields of TStyle)
	 */
	private $_customStyle=null;
	/**
	 * @var string display style
	 */
	private $_displayStyle='Fixed';

	/**
	 * Constructor.
	 * @param TStyle style to copy from
	 */
	public function __construct($style=null)
	{
		if($style!==null)
			$this->copyFrom($style);
	}

	/**
	 * Need to clone the font object.
	 */
	public function __clone()
	{
		if($this->_font!==null)
			$this->_font = clone($this->_font);
	}

	/**
	 * @return string the background color of the control
	 */
	public function getBackColor()
	{
		return isset($this->_fields['background-color'])?$this->_fields['background-color']:'';
	}

	/**
	 * @param string the background color of the control
	 */
	public function setBackColor($value)
	{
		if(trim($value)==='')
			unset($this->_fields['background-color']);
		else
			$this->_fields['background-color']=$value;
	}

	/**
	 * @return string the border color of the control
	 */
	public function getBorderColor()
	{
		return isset($this->_fields['border-color'])?$this->_fields['border-color']:'';
	}

	/**
	 * @param string the border color of the control
	 */
	public function setBorderColor($value)
	{
		if(trim($value)==='')
			unset($this->_fields['border-color']);
		else
			$this->_fields['border-color']=$value;
	}

	/**
	 * @return string the border style of the control
	 */
	public function getBorderStyle()
	{
		return isset($this->_fields['border-style'])?$this->_fields['border-style']:'';
	}

	/**
	 * Sets the border style of the control.
	 * @param string the border style of the control
	 */
	public function setBorderStyle($value)
	{
		if(trim($value)==='')
			unset($this->_fields['border-style']);
		else
			$this->_fields['border-style']=$value;
	}

	/**
	 * @return string the border width of the control
	 */
	public function getBorderWidth()
	{
		return isset($this->_fields['border-width'])?$this->_fields['border-width']:'';
	}

	/**
	 * @param string the border width of the control
	 */
	public function setBorderWidth($value)
	{
		if(trim($value)==='')
			unset($this->_fields['border-width']);
		else
			$this->_fields['border-width']=$value;
	}

	/**
	 * @return string the CSS class of the control
	 */
	public function getCssClass()
	{
		return $this->_class===null?'':$this->_class;
	}

	/**
	 * @return boolean true if CSS is set or empty.
	 */
	public function hasCssClass()
	{
		return ($this->_class!==null);
	}

	/**
	 * @param string the name of the CSS class of the control
	 */
	public function setCssClass($value)
	{
		$this->_class=$value;
	}

	/**
	 * @return TFont the font of the control
	 */
	public function getFont()
	{
		if($this->_font===null)
			$this->_font=new TFont;
		return $this->_font;
	}

	/**
	 * @return boolean true if font is set.
	 */
	public function hasFont()
	{
		return $this->_font !== null;
	}

	/**
	 * @param TDisplayStyle control display style, default is TDisplayStyle::Fixed
	 */
	public function setDisplayStyle($value)
	{
		$this->_displayStyle = TPropertyValue::ensureEnum($value, 'Prado\\Web\\UI\\WebControls\\TDisplayStyle');
		switch($this->_displayStyle)
		{
			case TDisplayStyle::None:
				$this->_fields['display'] = 'none';
				break;
			case TDisplayStyle::Dynamic:
				$this->_fields['display'] = ''; //remove the display property
				break;
			case TDisplayStyle::Fixed:
				$this->_fields['visibility'] = 'visible';
				break;
			case TDisplayStyle::Hidden:
				$this->_fields['visibility'] = 'hidden';
				break;
		}
	}

	/**
	 * @return TDisplayStyle display style
	 */
	public function getDisplayStyle()
	{
		return $this->_displayStyle;
	}

	/**
	 * @return string the foreground color of the control
	 */
	public function getForeColor()
	{
		return isset($this->_fields['color'])?$this->_fields['color']:'';
	}

	/**
	 * @param string the foreground color of the control
	 */
	public function setForeColor($value)
	{
		if(trim($value)==='')
			unset($this->_fields['color']);
		else
			$this->_fields['color']=$value;
	}

	/**
	 * @return string the height of the control
	 */
	public function getHeight()
	{
		return isset($this->_fields['height'])?$this->_fields['height']:'';
	}

	/**
	 * @param string the height of the control
	 */
	public function setHeight($value)
	{
		if(trim($value)==='')
			unset($this->_fields['height']);
		else
			$this->_fields['height']=$value;
	}

	/**
	 * @return string the custom style of the control
	 */
	public function getCustomStyle()
	{
		return $this->_customStyle===null?'':$this->_customStyle;
	}

	/**
	 * Sets custom style fields from a string.
	 * Custom style fields will be overwritten by style fields explicitly defined.
	 * @param string the custom style of the control
	 */
	public function setCustomStyle($value)
	{
		$this->_customStyle=$value;
	}

	/**
	 * @return string a single style field value set via {@link setStyleField}. Defaults to empty string.
	 */
	public function getStyleField($name)
	{
		return isset($this->_fields[$name])?$this->_fields[$name]:'';
	}

	/**
	 * Sets a single style field value.
	 * Style fields set by this method will overwrite those set by {@link setCustomStyle}.
	 * @param string style field name
	 * @param string style field value
	 */
	public function setStyleField($name,$value)
	{
		$this->_fields[$name]=$value;
	}

	/**
	 * Clears a single style field value;
	 * @param string style field name
	 */
	public function clearStyleField($name)
	{
		unset($this->_fields[$name]);
	}

	/**
	 * @return boolean whether a style field has been defined by {@link setStyleField}
	 */
	public function hasStyleField($name)
	{
		return isset($this->_fields[$name]);
	}

	/**
	 * @return string the width of the control
	 */
	public function getWidth()
	{
		return isset($this->_fields['width'])?$this->_fields['width']:'';
	}

	/**
	 * @param string the width of the control
	 */
	public function setWidth($value)
	{
		$this->_fields['width']=$value;
	}

	/**
	 * Resets the style to the original empty state.
	 */
	public function reset()
	{
		$this->_fields=array();
		$this->_font=null;
		$this->_class=null;
		$this->_customStyle=null;
	}

	/**
	 * Copies the fields in a new style to this style.
	 * If a style field is set in the new style, the corresponding field
	 * in this style will be overwritten.
	 * @param TStyle the new style
	 */
	public function copyFrom($style)
	{
		if($style instanceof TStyle)
		{
			$this->_fields=array_merge($this->_fields,$style->_fields);
			if($style->_class!==null)
				$this->_class=$style->_class;
			if($style->_customStyle!==null)
				$this->_customStyle=$style->_customStyle;
			if($style->_font!==null)
				$this->getFont()->copyFrom($style->_font);
		}
	}

	/**
	 * Merges the style with a new one.
	 * If a style field is not set in this style, it will be overwritten by
	 * the new one.
	 * @param TStyle the new style
	 */
	public function mergeWith($style)
	{
		if($style instanceof TStyle)
		{
			$this->_fields=array_merge($style->_fields,$this->_fields);
			if($this->_class===null)
				$this->_class=$style->_class;
			if($this->_customStyle===null)
				$this->_customStyle=$style->_customStyle;
			if($style->_font!==null)
				$this->getFont()->mergeWith($style->_font);
		}
	}

	/**
	 * Adds attributes related to CSS styles to renderer.
	 * @param THtmlWriter the writer used for the rendering purpose
	 */
	public function addAttributesToRender($writer)
	{
		if($this->_customStyle!==null)
		{
			foreach(explode(';',$this->_customStyle) as $style)
			{
				$arr=explode(':',$style,2);
				if(isset($arr[1]) && trim($arr[0])!=='')
					$writer->addStyleAttribute(trim($arr[0]),trim($arr[1]));
			}
		}
		$writer->addStyleAttributes($this->_fields);
		if($this->_font!==null)
			$this->_font->addAttributesToRender($writer);
		if($this->_class!==null)
			$writer->addAttribute('class',$this->_class);
	}

	/**
	 * @return array list of style fields.
	 */
	public function getStyleFields()
	{
		return $this->_fields;
	}
}