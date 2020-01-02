<?php

namespace CoreProc\PayMaya\Requests\Checkout;

use JsonSerializable;

class Item implements JsonSerializable
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var integer
     */
    protected $quantity;

    /**
     * @var ItemAmount
     */
    protected $amount;

    /**
     * @var TotalAmount
     */
    protected $totalAmount;

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Item
     */
    public function setName(string $name): Item
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Item
     */
    public function setCode(string $code): Item
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Item
     */
    public function setDescription(string $description): Item
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return Item
     */
    public function setQuantity(int $quantity): Item
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return ItemAmount
     */
    public function getAmount(): ?ItemAmount
    {
        return $this->amount;
    }

    /**
     * @param ItemAmount $amount
     * @return Item
     */
    public function setAmount(ItemAmount $amount): Item
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return TotalAmount
     */
    public function getTotalAmount(): ?TotalAmount
    {
        return $this->totalAmount;
    }

    /**
     * @param TotalAmount $totalAmount
     * @return Item
     */
    public function setTotalAmount(TotalAmount $totalAmount): Item
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
