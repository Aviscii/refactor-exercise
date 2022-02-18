<?php

require __DIR__ . '/../vendor/autoload.php';

use App\CsvReader;
use App\InputValidator;
use App\Order;
use App\Orders;
use App\TableOutputWriter;

$inputValidator = new InputValidator($argc, $argv);

if($inputValidator->validate()) {

	$stock = $inputValidator->getValidatedData();

	$csvReader = new CsvReader(__DIR__ . '/orders.csv');

	$csvReader->read();

	$orderList = $csvReader->getData();

	$orders = new Orders();

	foreach($orderList as $order) {
		$orders->storeOrder(new Order($order["product_id"], $order["quantity"], $order["priority"], $order["created_at"]));
	}

	$orders->sort();

	$fullfillableOrders = $orders->getFullfillableOrders($stock);

	$tableOutputWriter = new TableOutputWriter(["product_id", "quantity", "priority", "creted_at"]);

	foreach($fullfillableOrders as $order) {
		$tableOutputWriter->addItem($order->toArray());
	}

	$tableOutputWriter->write();
} else {
	echo $inputValidator->getErrorMessage();
	exit(1);
}
