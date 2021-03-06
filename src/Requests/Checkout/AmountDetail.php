<?php

namespace CoreProc\PayMaya\Requests\Checkout;

use CoreProc\PayMaya\Requests\PaymayaRequest;
use JsonSerializable;

class AmountDetail extends PaymayaRequest implements JsonSerializable
{
    /**
     * @var float|null
     */
    protected $discount;

    /**
     * @var float|null
     */
    protected $serviceCharge;

    /**
     * @var float|null
     */
    protected $shippingFee;

    /**
     * @var float|null
     */
    protected $tax;

    /**
     * @var float|null
     */
    protected $subtotal;

    /**
     * @return float|null
     */
    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    /**
     * @param float|null $discount
     * @return AmountDetail
     */
    public function setDiscount(?float $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getServiceCharge(): ?float
    {
        return $this->serviceCharge;
    }

    /**
     * @param float|null $serviceCharge
     * @return AmountDetail
     */
    public function setServiceCharge(?float $serviceCharge): self
    {
        $this->serviceCharge = $serviceCharge;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getShippingFee(): ?float
    {
        return $this->shippingFee;
    }

    /**
     * @param float|null $shippingFee
     * @return AmountDetail
     */
    public function setShippingFee(?float $shippingFee): self
    {
        $this->shippingFee = $shippingFee;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getTax(): ?float
    {
        return $this->tax;
    }

    /**
     * @param float|null $tax
     * @return AmountDetail
     */
    public function setTax(?float $tax): self
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getSubtotal(): ?float
    {
        return $this->subtotal;
    }

    /**
     * @param float|null $subtotal
     * @return AmountDetail
     */
    public function setSubtotal(?float $subtotal): self
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    /**
     * @inheritDoc
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
