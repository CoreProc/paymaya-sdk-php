<?php

namespace CoreProc\PayMaya\Requests\Checkout;

use CoreProc\PayMaya\Requests\RedirectUrl;
use JsonSerializable;

class Checkout implements JsonSerializable
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var Buyer|null
     */
    protected $buyer;

    /**
     * @var array
     */
    protected $items;

    /**
     * @var TotalAmount
     */
    protected $totalAmount;

    /**
     * @var string
     */
    protected $requestReferenceNumber;

    /**
     * @var RedirectUrl|null
     */
    protected $redirectUrl;

    /**
     * @var string|null
     */
    protected $status;

    /**
     * @var string|null
     */
    protected $paymentStatus;

    /**
     * @var object|null
     */
    protected $metadata;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Checkout
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Buyer|null
     */
    public function getBuyer(): ?Buyer
    {
        return $this->buyer;
    }

    /**
     * @param Buyer|null $buyer
     * @return Checkout
     */
    public function setBuyer(?Buyer $buyer): self
    {
        $this->buyer = $buyer;

        return $this;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     * @return Checkout
     */
    public function setItems(array $items): self
    {
        $this->items = $items;

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
     * @return Checkout
     */
    public function setTotalAmount(TotalAmount $totalAmount): self
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    /**
     * @return string
     */
    public function getRequestReferenceNumber(): string
    {
        return $this->requestReferenceNumber;
    }

    /**
     * @param string $requestReferenceNumber
     * @return Checkout
     */
    public function setRequestReferenceNumber(string $requestReferenceNumber): self
    {
        $this->requestReferenceNumber = $requestReferenceNumber;

        return $this;
    }

    /**
     * @return RedirectUrl|null
     */
    public function getRedirectUrl(): ?RedirectUrl
    {
        return $this->redirectUrl;
    }

    /**
     * @param RedirectUrl|null $redirectUrl
     * @return Checkout
     */
    public function setRedirectUrl(?RedirectUrl $redirectUrl): self
    {
        $this->redirectUrl = $redirectUrl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     * @return Checkout
     */
    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaymentStatus(): ?string
    {
        return $this->paymentStatus;
    }

    /**
     * @param string|null $paymentStatus
     * @return Checkout
     */
    public function setPaymentStatus(?string $paymentStatus): self
    {
        $this->paymentStatus = $paymentStatus;

        return $this;
    }

    /**
     * @return object|null
     */
    public function getMetadata(): ?object
    {
        return $this->metadata;
    }

    /**
     * @param object|null $metadata
     * @return Checkout
     */
    public function setMetadata(?object $metadata): self
    {
        $this->metadata = $metadata;

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
            'buyer' => $this->getBuyer(),
            'items' => $this->getItems(),
            'totalAmount' => $this->getTotalAmount(),
            'requestReferenceNumber' => $this->getRequestReferenceNumber(),
            'redirectUrl' => $this->getRedirectUrl(),
            'metadata' => $this->getMetadata(),
        ];
    }
}
