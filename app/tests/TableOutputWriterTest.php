<?php

namespace Tests;

use App\TableOutputWriter;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class TableOutputWriterTest extends TestCase {

	public function testAddItemWithValidData() {

		$tableOutputWriter = new TableOutputWriter(["product_id", "quantity", "priority", "creted_at"]);

		$this->assertNull($tableOutputWriter->addItem(["1", "2", "low", "2022-02-18 9:38:22"]));
	}

	public function testAddItemWithInvalidData() {
		
		$tableOutputWriter = new TableOutputWriter(["product_id", "quantity", "priority", "creted_at"]);

		$this->expectException(InvalidArgumentException::class);

		$tableOutputWriter->addItem(["1", "2"]);
	}
}