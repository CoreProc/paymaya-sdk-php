<?php

namespace CoreProc\PayMaya\Models\Checkout;

use JsonSerializable;

class Checkout implements JsonSerializable
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var Buyer
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
     * @var RedirectUrl
     */
    protected $redirectUrl;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $paymentStatus;

    /**
     * @var object
     */
    protected $metadata;

    /**
     * @return string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return Buyer
     */
    public function getBuyer(): ?Buyer
    {
        return $this->buyer;
    }

    /**
     * @param Buyer $buyer
     * @return Checkout
     */
    public function setBuyer(Buyer $buyer): Checkout
    {
        $this->buyer = $buyer;

        return $this;
    }

    /**
     * @return array
     */
    public function getItems(): ?array
    {
        return $this->items;
    }

    /**
     * @param array $items
     * @return Checkout
     */
    public function setItems(array $items): Checkout
    {
        $this->items = $items;

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
     * @return Checkout
     */
    public function setTotalAmount(TotalAmount $totalAmount): Checkout
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    /**
     * @return string
     */
    public function getRequestReferenceNumber(): ?string
    {
        return $this->requestReferenceNumber;
    }

    /**
     * @param string $requestReferenceNumber
     * @return Checkout
     */
    public function setRequestReferenceNumber(string $requestReferenceNumber): Checkout
    {
        $this->requestReferenceNumber = $requestReferenceNumber;

        return $this;
    }

    /**
     * @return RedirectUrl
     */
    public function getRedirectUrl(): ?RedirectUrl
    {
        return $this->redirectUrl;
    }

    /**
     * @param RedirectUrl $redirectUrl
     * @return Checkout
     */
    public function setRedirectUrl(RedirectUrl $redirectUrl): Checkout
    {
        $this->redirectUrl = $redirectUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getPaymentStatus(): ?string
    {
        return $this->paymentStatus;
    }

    /**
     * @return object
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param object $metadata
     * @return Checkout
     */
    public function setMetadata($metadata): Checkout
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
