<?php

declare(strict_types=1);

namespace App\Payment\Processors;

interface Processor{

    public function getName():string;

    public function process_payment(float $amount, int $identifer);
}