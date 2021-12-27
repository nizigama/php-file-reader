<?php

declare(strict_types=1);

namespace App\Payment\Processors;


class Airtel implements Processor{

    public const NAME = "airtel";

    public function getName(): string
    {
        return self::NAME;
    }

    public function process_payment(float $amount, int $identifer)
    {
        $status = mt_rand(0, 1);

        if ($status === 1) {
            echo "Congratulations, " . self::NAME . " successfully processed your " . $amount. " payment" . PHP_EOL;
        } else {
            echo "Payment of " . $amount . " through " . self::NAME . " has failed!" . PHP_EOL;
        }
    }
    
}