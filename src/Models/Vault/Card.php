<?php

namespace CoreProc\PayMaya\Models\Vault;

use JsonSerializable;

class Card implements JsonSerializable
{
    /**
     * Valid card number of Visa or MasterCard
     *
     * @var string
     */
    protected $number;

    /**
     * Expiry month of card
     *
     * @var int
     */
    protected $expMonth;

    /**
     * Expiry year of card
     *
     * @var int
     */
    protected $expYear;

    /**
     * CVC/CVV of card
     *
     * @var int
     */
    protected $cvc;

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return Card
     */
    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return int
     */
    public function getExpMonth(): int
    {
        return $this->expMonth;
    }

    /**
     * @param int $expMonth
     * @return Card
     */
    public function setExpMonth(int $expMonth): self
    {
        $this->expMonth = $expMonth;

        return $this;
    }

    /**
     * @return int
     */
    public function getExpYear(): int
    {
        return $this->expYear;
    }

    /**
     * @param int $expYear
     * @return Card
     */
    public function setExpYear(int $expYear): self
    {
        $this->expYear = $expYear;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCvc(): int
    {
        return $this->cvc;
    }

    /**
     * @param mixed $cvc
     * @return Card
     */
    public function setCvc($cvc): self
    {
        $this->cvc = $cvc;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return [
            'number' => $this->getNumber(),
            'expMonth' => (string)$this->getExpMonth(),
            'expYear' => (string)$this->getExpYear(),
            'cvc' => $this->getCvc(),
        ];
    }
}
