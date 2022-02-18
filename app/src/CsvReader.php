<?php

namespace App;

class CsvReader {

	protected string $fileName;
	protected array $data;

	public function __construct(string $csvFileName) {
		$this->fileName = $csvFileName;
		$this->data = [];
	}

	public function read() {
		$headers = [];

		$row = 1;
		if (($handle = fopen($this->fileName, 'r')) !== false) {
			while (($data = fgetcsv($handle)) !== false) {
				if ($row == 1) {
					$headers = $data;
				} else {
					$o = [];
					for ($i = 0; $i < count($headers); $i++) {
						$o[$headers[$i]] = $data[$i];
					}
					$this->data[] = $o;
				}
				$row++;
			}
			fclose($handle);
		}
	}

	public function getData() : array {
		return $this->data;
	}
}