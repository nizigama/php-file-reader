<?php

declare(strict_types=1);

require_once "./vendor/autoload.php";

use App\Payment\PaymentProcessor;

set_exception_handler(function(\Throwable $exception){
    echo "Exception thrown: " . $exception->getMessage() . PHP_EOL;
});

run();



function run(): void
{
    echo "Welcome to this payment gateway" . PHP_EOL;

    $processors = PaymentProcessor::getPaymentProcessors();

    foreach ($processors as $key => $processor) {
        echo $key + 1 . ". " . $processor . PHP_EOL;
    }

    echo "0. Exit" . PHP_EOL;

    $choice = readline("Choose gateway [default is 0]:");

    if (!is_numeric($choice)) {
        echo "Invalid choice exiting app" . PHP_EOL;
        exit;
    }

    $choice = intval($choice);

    if($choice === 0){
        echo "Bye." . PHP_EOL;
        exit;
    }

    $amount = 0;
    $identifier = 0;

    do {
        $identifier = readline("Account identifier [0 to quit app]:");

        if (is_numeric($identifier)) {
            $identifier = intval($identifier);
        }

        
    } while (!is_numeric($identifier) && $identifier !== 0);

    if($identifier === 0){
        echo "Bye." . PHP_EOL;
        exit;
    }

    do {
        $amount = readline("Amount [0 to quit app]:");

        if (is_numeric($amount)) {
            $amount = intval($amount);
        }
    } while (!is_numeric($amount) && $amount !== 0);

    if($amount === 0){
        echo "Bye." . PHP_EOL;
        exit;
    }

    $tx = new PaymentProcessor((float) $amount,$identifier,$choice);

    $tx->process();

}