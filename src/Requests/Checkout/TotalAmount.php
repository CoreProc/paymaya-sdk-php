<?php

namespace CoreProc\PayMaya\Requests\Checkout;

use CoreProc\PayMaya\Requests\PaymayaRequest;
use JsonSerializable;

class TotalAmount extends PaymayaRequest implements JsonSerializable
{
    /**
     * @var float
     */
    protected $amount;

    /**
     * @var float|null
     */
    protected $value;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var AmountDetail|null
     */
    protected $details;

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return TotalAmount
     */
    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getValue(): ?float
    {
        return $this->value;
    }

    /**
     * @param float|null $value
     * @return TotalAmount
     */
    public function setValue(?float $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return TotalAmount
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return AmountDetail|null
     */
    public function getDetails(): ?AmountDetail
    {
        return $this->details;
    }

    /**
     * @param AmountDetail|null $details
     * @return TotalAmount
     */
    public function setDetails(?AmountDetail $details): self
    {
        $this->details = $details;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return [
            'value' => $this->getValue(),
            'currency' => $this->getCurrency(),
            'details' => $this->getDetails(),
        ];
    }
}
