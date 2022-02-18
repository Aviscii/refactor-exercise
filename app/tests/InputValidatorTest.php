<?php

namespace Tests;

use App\InputValidator;
use App\ValidationException;
use PHPUnit\Framework\TestCase;

final class InputValidatorTest extends TestCase {

	public function testValidateWithValidData() {

		$inputValidator = new InputValidator(2, ["refactor-exercise", '{"1":8,"2":4,"3":5}']);

		$this->assertTrue($inputValidator->validate());
	}

	public function testErrorMessageWithValidData() {
		
		$inputValidator = new InputValidator(2, ["refactor-exercise", '{"1":8,"2":4,"3":5}']);

		$this->assertSame("", $inputValidator->getErrorMessage());
	}

	public function testValidatedDataWithValidData() {
		
		$inputValidator = new InputValidator(2, ["refactor-exercise", '{"1":8,"2":4,"3":5}']);

		$inputValidator->validate();

		$this->assertSame([
			"1" => 8,
			"2" => 4,
			"3" => 5 
		], $inputValidator->getValidatedData());
	}

	public function testValidateWithInvalidData() {

		$inputValidator = new InputValidator(2, ["refactor-exercise", 'non-json-string']);

		$this->assertFalse($inputValidator->validate());
	}

	public function testErrorMessageWithInvalidData() {
		
		$inputValidator = new InputValidator(2, ["refactor-exercise", 'non-json-string']);

		$inputValidator->validate();
	
		$this->assertSame("Argument is not a valid json string.", $inputValidator->getErrorMessage());
	}

	public function testValidatedDataWithInvalidData() {
		
		$inputValidator = new InputValidator(2, ["refactor-exercise", 'non-json-string']);

		$inputValidator->validate();

		$this->expectException(ValidationException::class);

		$inputValidator->getValidatedData();
	}
}