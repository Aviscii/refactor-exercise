<?php

namespace App;

class InputValidator {

	protected int $argumentCount;

	protected array $arguments;

	protected string $errorMessage;

	protected array $data;

	protected bool $valid;

	public function __construct(int $argumentCount, array $arguments){
		$this->argumentCount = $argumentCount;
		$this->arguments = $arguments;
		$this->errorMessage = "";
		$this->data = [];
		$this->valid = false;
	}

	public function validate() : bool {
		if ($this->argumentCount == 2) {
			if (($data = json_decode($this->arguments[1], true)) !== null) {
				$this->data = $data;
				$this->valid = true;
			} else {
				$this->errorMessage = "Invalid json!";
				$this->valid = false;
			}
		} else {
			$this->errorMessage = "Ambiguous number of parameters!";
			$this->valid = false;
		}

		return $this->valid;
	}

	public function getErrorMessage() : string {
		return $this->errorMessage;
	}

	/**
	 * @throws ValidationException if the input was not valid or has not been validated yet
	 */
	public function getValidatedData() : array {
		if($this->valid) {
			return $this->data;
		} else {
			throw new ValidationException("The input was not valid or has not been validated yet.");
		}
	}
}