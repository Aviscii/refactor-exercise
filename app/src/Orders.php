<?php

namespace App;

class Orders {

	/**
	 * @var Order[]
	 */
	protected array $orders;

	public function __construct(){
		$this->orders = [];
	}

	public function storeOrder(Order $order) {
		$this->orders[] = $order;
	}

	public function getFullfillableOrders(array $stock) : array {
		$fullfillableOrders = [];

		foreach($this->orders as $order) {
			if($stock[$order->getId()] >= $order->getQuantity()) {
				$fullfillableOrders[] = $order;
			}
		}

		return $fullfillableOrders;
	}

	public function sort() {
		usort($this->orders, function (Order $a, Order $b) {
			$pc = -1 * ($a->getPriority() <=> $b->getPriority());
			return $pc == 0 ? $a->getCreatedAt() <=> $b->getCreatedAt() : $pc;
		});
	}
}