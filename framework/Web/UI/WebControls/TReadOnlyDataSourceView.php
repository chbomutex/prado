<?php
/**
 * TDataSourceSelectParameters, TDataSourceView, TReadOnlyDataSourceView class file
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.pradosoft.com/
 * @copyright Copyright &copy; 2005-2014 PradoSoft
 * @license http://www.pradosoft.com/license/
 * @package Prado\Web\UI\WebControls
 */

namespace Prado\Web\UI\WebControls;
use Prado\Exceptions\TInvalidDataTypeException;
use Prado\Collections\TMap;

/**
 * TReadOnlyDataSourceView class
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @package Prado\Web\UI\WebControls
 * @since 3.0
 */
class TReadOnlyDataSourceView extends TDataSourceView
{
	private $_dataSource=null;

	public function __construct(IDataSource $owner,$viewName,$dataSource)
	{
		parent::__construct($owner,$viewName);
		if($dataSource===null || is_array($dataSource))
			$this->_dataSource=new TMap($dataSource);
		else if($dataSource instanceof \Traversable)
			$this->_dataSource=$dataSource;
		else
			throw new TInvalidDataTypeException('readonlydatasourceview_datasource_invalid');
	}

	public function select($parameters)
	{
		return $this->_dataSource;
	}
}