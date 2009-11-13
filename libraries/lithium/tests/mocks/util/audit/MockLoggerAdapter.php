<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2009, Union of RAD (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace lithium\tests\mocks\util\audit;

class MockLoggerAdapter extends \lithium\core\Object {

	public function write($name, $value) {
		return function($self, $params, $chain) {
			return true;
		};
	}
}

?>