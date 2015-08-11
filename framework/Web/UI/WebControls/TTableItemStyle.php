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
 * TTableItemStyle class.
 * TTableItemStyle represents the CSS style specific for HTML table item.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @package Prado\Web\UI\WebControls
 * @since 3.0
 */
class TTableItemStyle extends TStyle
{
	/**
	 * @var THorizontalAlign horizontal alignment of the contents within the table item
	 */
	private $_horizontalAlign=null;
	/**
	 * @var TVerticalAlign vertical alignment of the contents within the table item
	 */
	private $_verticalAlign=null;
	/**
	 * @var boolean whether the content wraps within the table item
	 */
	private $_wrap=null;

	/**
	 * Sets the style attributes to default values.
	 * This method overrides the parent implementation by
	 * resetting additional TTableItemStyle specific attributes.
	 */
	public function reset()
	{
		parent::reset();
		$this->_verticalAlign=null;
		$this->_horizontalAlign=null;
		$this->_wrap=null;
	}

	/**
	 * Copies the fields in a new style to this style.
	 * If a style field is set in the new style, the corresponding field
	 * in this style will be overwritten.
	 * @param TStyle the new style
	 */
	public function copyFrom($style)
	{
		parent::copyFrom($style);
		if($style instanceof TTableItemStyle)
		{
			if($this->_verticalAlign===null && $style->_verticalAlign!==null)
				$this->_verticalAlign=$style->_verticalAlign;
			if($this->_horizontalAlign===null && $style->_horizontalAlign!==null)
				$this->_horizontalAlign=$style->_horizontalAlign;
			if($this->_wrap===null && $style->_wrap!==null)
				$this->_wrap=$style->_wrap;
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
		parent::mergeWith($style);
		if($style instanceof TTableItemStyle)
		{
			if($style->_verticalAlign!==null)
				$this->_verticalAlign=$style->_verticalAlign;
			if($style->_horizontalAlign!==null)
				$this->_horizontalAlign=$style->_horizontalAlign;
			if($style->_wrap!==null)
				$this->_wrap=$style->_wrap;
		}
	}

	/**
	 * Adds attributes related to CSS styles to renderer.
	 * This method overrides the parent implementation.
	 * @param THtmlWriter the writer used for the rendering purpose
	 */
	public function addAttributesToRender($writer)
	{
		if(!$this->getWrap())
			$writer->addStyleAttribute('white-space','nowrap');

		if(($horizontalAlign=$this->getHorizontalAlign())!==THorizontalAlign::NotSet)
			$writer->addAttribute('align',strtolower($horizontalAlign));

		if(($verticalAlign=$this->getVerticalAlign())!==TVerticalAlign::NotSet)
			$writer->addAttribute('valign',strtolower($verticalAlign));

		parent::addAttributesToRender($writer);
	}

	/**
	 * @return THorizontalAlign the horizontal alignment of the contents within the table item, defaults to THorizontalAlign::NotSet.
	 */
	public function getHorizontalAlign()
	{
		return $this->_horizontalAlign===null?THorizontalAlign::NotSet:$this->_horizontalAlign;
	}

	/**
	 * Sets the horizontal alignment of the contents within the table item.
	 * @param THorizontalAlign the horizontal alignment
	 */
	public function setHorizontalAlign($value)
	{
		$this->_horizontalAlign=TPropertyValue::ensureEnum($value,'Prado\\Web\\UI\\WebControls\\THorizontalAlign');
	}

	/**
	 * @return TVerticalAlign the vertical alignment of the contents within the table item, defaults to TVerticalAlign::NotSet.
	 */
	public function getVerticalAlign()
	{
		return $this->_verticalAlign===null?TVerticalAlign::NotSet:$this->_verticalAlign;
	}

	/**
	 * Sets the vertical alignment of the contents within the table item.
	 * @param TVerticalAlign the horizontal alignment
	 */
	public function setVerticalAlign($value)
	{
		$this->_verticalAlign=TPropertyValue::ensureEnum($value,'Prado\\Web\\UI\\WebControls\\TVerticalAlign');
	}

	/**
	 * @return boolean whether the content wraps within the table item. Defaults to true.
	 */
	public function getWrap()
	{
		return $this->_wrap===null?true:$this->_wrap;
	}

	/**
	 * Sets the value indicating whether the content wraps within the table item.
	 * @param boolean whether the content wraps within the panel.
	 */
	public function setWrap($value)
	{
		$this->_wrap=TPropertyValue::ensureBoolean($value);
	}
}