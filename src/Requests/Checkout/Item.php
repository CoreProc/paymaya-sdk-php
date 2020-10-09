<?php

namespace CoreProc\PayMaya\Requests\Checkout;

use CoreProc\PayMaya\Requests\PaymayaRequest;
use JsonSerializable;

class Item extends PaymayaRequest implements JsonSerializable
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $code;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var integer|null
     */
    protected $quantity;

    /**
     * @var ItemAmount|null
     */
    protected $amount;

    /**
     * @var TotalAmount
     */
    protected $totalAmount;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Item
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string|null $code
     * @return Item
     */
    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return Item
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int|null $quantity
     * @return Item
     */
    public function setQuantity(?int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return ItemAmount|null
     */
    public function getAmount(): ?ItemAmount
    {
        return $this->amount;
    }

    /**
     * @param ItemAmount|null $amount
     * @return Item
     */
    public function setAmount(?ItemAmount $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return TotalAmount
     */
    public function getTotalAmount(): TotalAmount
    {
        return $this->totalAmount;
    }

    /**
     * @param TotalAmount $totalAmount
     * @return Item
     */
    public function setTotalAmount(TotalAmount $totalAmount): self
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'name' => $this->getName(),
            'code' => $this->getCode(),
            'description' => $this->getDescription(),
            'quantity' => $this->getQuantity(),
            'amount' => $this->getAmount(),
            'totalAmount' => $this->getTotalAmount(),
        ];
    }
}
