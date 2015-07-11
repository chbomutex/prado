<?php
/**
 * @author Robin J. Rogge <rrogge@bigpoint.net>
 * @link http://www.pradosoft.com/
 * @copyright 2010 Bigpoint GmbH
 * @license http://www.pradosoft.com/license/
 * @since 3.2
 * @package Prado\Web\Services
 */

namespace Prado\Web\Services;
use Prado\Exceptions\TException;

/**
 * TRpcException class
 *
 * A TRpcException represents a RPC fault i.e. an error that is caused by the input data
 * sent from the client.
 *
 * @author Robin J. Rogge <rrogge@bigpoint.net>
 * @package Prado\Web\Services
 * @since 3.2
 */
class TRpcException extends TException
{
	public function __construct($message, $errorCode = -1)
	{
		$this->setErrorCode($errorCode);

		parent::__construct($message);
	}
}