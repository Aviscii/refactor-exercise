<?php

namespace App;

class Order {

	protected string $id;
	protected int $quantity;
	protected string $priority;
	protected string $created_at;

	public function __construct(string $id, int $quantity, string $priority, string $created_at) {
		$this->id = $id;
		$this->quantity = $quantity;
		$this->priority = $priority;
		$this->created_at = $created_at;
	}

	
	/**
	 * Get the value of id
	 */ 
	public function getId() : string
	{
		return $this->id;
	}

	/**
	 * Get the value of quantity
	 */ 
	public function getQuantity() : int
	{
		return $this->quantity;
	}
	
	/**
	 * Get the value of priority
	 */ 
	public function getPriority() : string
	{
		return $this->priority;
	}
	
	/**
	 * Get the value of created_at
	 */ 
	public function getCreatedAt() : string
	{
		return $this->created_at;
	}

	public function toArray() : array{
		return [
			$this->id,
			$this->quantity,
			$this->priority,
			$this->created_at
		];
	}
}