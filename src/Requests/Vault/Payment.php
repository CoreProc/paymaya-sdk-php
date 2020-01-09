<?php

namespace CoreProc\PayMaya\Requests\Vault;

class Payment implements \JsonSerializable
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

    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }

    public function getAmount(): string
    {
        return (string)$this->amount;
    }

    /**
     * @param string|float|int $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    public function getCustomerId(): string
    {
        return $this->customerId;
    }

    /**
     * @param string $customerId
     */
    public function setCustomerId($customerId): void
    {
        $this->customerId = $customerId;
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
     */
    public function setCardTokenId(string $cardTokenId): void
    {
        $this->cardTokenId = $cardTokenId;
    }

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
