<?php

namespace CoreProc\PayMaya\Requests;

use JsonSerializable;

class AmountDetail implements JsonSerializable
{
    /**
     * @var float
     */
    protected $discount;

    /**
     * @var float
     */
    protected $serviceCharge;

    /**
     * @var float
     */
    protected $shippingFee;

    /**
     * @var float
     */
    protected $tax;

    /**
     * @var float
     */
    protected $subtotal;

    /**
     * @return float
     */
    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    /**
     * @param float $discount
     * @return AmountDetail
     */
    public function setDiscount(float $discount): AmountDetail
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * @return float
     */
    public function getServiceCharge(): ?float
    {
        return $this->serviceCharge;
    }

    /**
     * @param float $serviceCharge
     * @return AmountDetail
     */
    public function setServiceCharge(float $serviceCharge): AmountDetail
    {
        $this->serviceCharge = $serviceCharge;

        return $this;
    }

    /**
     * @return float
     */
    public function getShippingFee(): ?float
    {
        return $this->shippingFee;
    }

    /**
     * @param float $shippingFee
     * @return AmountDetail
     */
    public function setShippingFee(float $shippingFee): AmountDetail
    {
        $this->shippingFee = $shippingFee;

        return $this;
    }

    /**
     * @return float
     */
    public function getTax(): ?float
    {
        return $this->tax;
    }

    /**
     * @param float $tax
     * @return AmountDetail
     */
    public function setTax(float $tax): AmountDetail
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * @return float
     */
    public function getSubtotal(): ?float
    {
        return $this->subtotal;
    }

    /**
     * @param float $subtotal
     * @return AmountDetail
     */
    public function setSubtotal(float $subtotal): AmountDetail
    {
        $this->subtotal = $subtotal;

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
            'discount' => $this->getDiscount(),
            'serviceCharge' => $this->getServiceCharge(),
            'shippingFee' => $this->getShippingFee(),
            'tax' => $this->getTax(),
            'subtotal' => $this->getSubtotal(),
        ];
    }
}
