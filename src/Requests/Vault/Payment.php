<?php

namespace CoreProc\PayMaya\Requests\Vault;

use CoreProc\PayMaya\Requests\PaymayaRequest;
use JsonSerializable;

class Payment extends PaymayaRequest implements JsonSerializable
{
    /**
     * @var string
     */
    private $currency;

    /**
     * @var string|float|int
     */
    private $amount;

    /**
     * @var string
     */
    private $customerId;

    /**
     * @var string
     */
    private $cardTokenId;

    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return self
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getAmount(): string
    {
        return (string)$this->amount;
    }

    /**
     * @param float|int|string $amount
     * @return self
     */
    public function setAmount($amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getCustomerId(): string
    {
        return $this->customerId;
    }

    /**
     * @param string $customerId
     * @return self
     */
    public function setCustomerId(string $customerId): self
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * @return string
     */
    public function getCardTokenId(): string
    {
        return $this->cardTokenId;
    }

    /**
     * @param string $cardTokenId
     * @return self
     */
    public function setCardTokenId(string $cardTokenId): self
    {
        $this->cardTokenId = $cardTokenId;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return [
            'totalAmount' => [
                'amount' => $this->getAmount(),
                'currency' => $this->getCurrency(),
            ],
        ];
    }
}
