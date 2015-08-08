<?php
/**
 * TComponent, TPropertyValue classes
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 *
 * Global Events, intra-object events, Class behaviors, expanded behaviors
 * @author Brad Anderson <javalizard@mac.com>
 *
 * @link http://www.pradosoft.com/
 * @copyright Copyright &copy; 2005-2014 PradoSoft
 * @license http://www.pradosoft.com/license/
 * @package Prado
 */

namespace Prado;

class TEventResults extends \Prado\TEnumerable {
	const EVENT_RESULT_FEED_FORWARD=1;
	const EVENT_RESULT_FILTER=2;
	const EVENT_RESULT_ALL=4;
}