<?php
/**
 * Lithium: the most rad php framework
 *
 * @copyright     Copyright 2009, Union of Rad, Inc. (http://union-of-rad.org)
 * @license       http://opensource.org/licenses/bsd-license.php The BSD License
 */

namespace lithium\tests\cases\data\model;

use \lithium\data\model\Record;

class RecordTest extends \lithium\test\Unit {

	public function setUp() {
		$this->record = new Record();
	}

	/**
	 * Tests that a record's fields are accessible as object properties.
	 *
	 * @return void
	 */
	public function testDataPropertyAccess() {
		$data = array(
			'title' => 'Test record',
			'body' => 'Some test record data'
		);

		$this->record = new Record(compact('data'));

		$expected = 'Test record';
		$result = $this->record->title;
		$this->assertEqual($expected, $result);
		$this->assertTrue(isset($this->record->title));

		$expected = 'Some test record data';
		$result = $this->record->body;
		$this->assertEqual($expected, $result);
		$this->assertTrue(isset($this->record->body));

		$this->assertNull($this->record->foo);
		$this->assertFalse(isset($this->record->foo));
	}

	/**
	 * Tests that a record can be exported to a given series of formats.
	 *
	 * @return void
	 */
	public function testRecordFormatExport() {
		$data = array('foo' => 'bar');
		$this->record = new Record(compact('data'));

		$result = $this->record->to('array');
		$expected = $data;
		$this->assertEqual($expected, $result);

		$result = $this->record->to('foo');
		$this->assertEqual($this->record, $result);
	}
}

?>