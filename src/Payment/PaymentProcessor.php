<?php

declare(strict_types=1);

namespace App\Payment;

use App\Payment\Processors\Airtel;
use App\Payment\Processors\Equity;
use App\Payment\Processors\Mtn;
use App\Payment\Processors\Processor;

class PaymentProcessor
{

    private const PAYMENT_PROCESSORS = [
        Mtn::NAME,
        Airtel::NAME,
        Equity::NAME,
    ];

    public float $amount;
    public int $identifier;
    public int $processor;
    private Processor $paymentProcessor;


    public function __construct(float $amount, int $identifier, int $processor)
    {
        $this->amount = $amount;
        $this->processor = $processor;
        $this->identifier = $identifier;
    }

    /** @return string[] */
    static public function getPaymentProcessors(): array
    {
        return self::PAYMENT_PROCESSORS;
    }

    public function process()
    {

        switch ($this->processor) {
            case 1:
                $this->paymentProcessor = new Mtn();
                break;
            case 2:
                $this->paymentProcessor = new Airtel();
                break;
            case 3:
                $this->paymentProcessor = new Equity();
                break;

            default:
                throw new \Exception("Invalid payment processor");
        }
        $this->paymentProcessor->process_payment($this->amount, $this->identifier);
    }
}
