<?php

namespace App;

use InvalidArgumentException;

class TableOutputWriter {

	protected array $headers;

	protected array $items;

	public function __construct(array $headers) {
		$this->headers = $headers;
		$this->items = [];
	}

	/**
	 * @throws InvalidArgumentException if the number of elements in the given array not matches the number of headers
	 */
	public function addItem(array $item) {
		if(count($item) == count($this->headers)) {
			$this->items[] = $item;
		} else {
			throw new InvalidArgumentException();
		}
	}

	public function write() {
		foreach ($this->headers as $header) {
			echo str_pad($header, 20);
		}
		echo "\n";
		foreach ($this->headers as $header) {
			echo str_repeat('=', 20);
		}
		echo "\n";
		foreach ($this->items as $item) {
			foreach ($item as $part) {
				echo str_pad($part, 20);
			}
			echo "\n";
		}
	}
}