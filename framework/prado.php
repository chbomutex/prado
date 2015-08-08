<?php
/**
 * Prado bootstrap file.
 *
 * This file is intended to be included in the entry script of Prado applications.
 * It defines Prado class by extending PradoBase, a static class providing globally
 * available functionalities that enable PRADO component model and error handling mechanism.
 *
 * By including this file, the PHP error and exception handlers are set as
 * PRADO handlers, and an __autoload function is provided that automatically
 * loads a class file if the class is not defined.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.pradosoft.com/
 * @copyright Copyright &copy; 2005-2014 PradoSoft
 * @license http://www.pradosoft.com/license/
 * @package Prado
 */

namespace Prado;

/**
 * Defines Prado class if not defined.
 */
if(!class_exists('Prado',false))
{
	require(__DIR__ . '/PradoBase.php');

	/**
	 * Prado class.
	 *
	 * @author Qiang Xue <qiang.xue@gmail.com>
	* @package Prado
	 * @since 3.0
	 */
	class Prado extends PradoBase
	{
	}
}

Prado::init();


/**
 * Defines basic class aliases used by not-PSR4 applications
 */

class_alias('\Prado\Prado', 'Prado', true);
Prado::using('Prado\TApplication');
Prado::using('Prado\TModule');
Prado::using('Prado\Web\Services\TPageService');
Prado::using('Prado\Web\UI\TPage');
