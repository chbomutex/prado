<?php
/**
 * TWizard and the relevant class definitions.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.pradosoft.com/
 * @copyright Copyright &copy; 2005-2014 PradoSoft
 * @license http://www.pradosoft.com/license/
 * @package Prado\Web\UI\WebControls
 */

namespace Prado\Web\UI\WebControls;
use Prado\Web\UI\ITemplate;

/**
 * TWizardSideBarListItemTemplate class.
 * TWizardSideBarListItemTemplate is the default template for each item in the sidebar datalist.
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @package Prado\Web\UI\WebControls
 * @since 3.0
 */
class TWizardSideBarListItemTemplate extends \Prado\TComponent implements ITemplate
{
	/**
	 * Instantiates the template.
	 * It creates a {@link TLinkButton}.
	 * @param TControl parent to hold the content within the template
	 */
	public function instantiateIn($parent)
	{
		$button=new TLinkButton;
		$button->setID(TWizard::ID_SIDEBAR_BUTTON);
		$parent->getControls()->add($button);
	}
}