<?php

namespace App;

class InputValidator {

	public function __construct(int $argumentCount, array $arguments)
	{
		
	}

	public function validate() : bool {
		return true;
	}

	public function getErrorMessage() : string {
		return "Error message";
	}

	/**
	 * @throws ValidationException if the input was not valid or has not been validated yet
	 */
	public function getValidatedData() : array {
		return [];
	}
}