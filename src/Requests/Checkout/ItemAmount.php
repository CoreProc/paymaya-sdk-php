<?php

namespace CoreProc\PayMaya\Requests\Checkout;

use CoreProc\PayMaya\Requests\PaymayaRequest;
use JsonSerializable;

class ItemAmount extends PaymayaRequest implements JsonSerializable
{
    /**
     * @var float
     */
    protected $value;

    /**
     * @var AmountDetail|null
     */
    protected $details;

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     * @return ItemAmount
     */
    public function setValue(float $value): self
    {
        $this->value = $value;

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
     * @return ItemAmount
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
            'detail' => $this->getDetails(),
        ];
    }
}
