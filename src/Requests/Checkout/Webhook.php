<?php

namespace CoreProc\PayMaya\Requests\Checkout;

use CoreProc\PayMaya\Requests\PaymayaRequest;
use JsonSerializable;

class Webhook extends PaymayaRequest implements JsonSerializable
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $callbackUrl;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Webhook
     */
    public function setId(string $id): Webhook
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name Possible values are: CHECKOUT_SUCCESS, CHECKOUT_FAILURE, and CHECKOUT_DROPOUT
     * @return Webhook
     */
    public function setName(string $name): Webhook
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }

    /**
     * @param string $callbackUrl
     * @return Webhook
     */
    public function setCallbackUrl(string $callbackUrl): Webhook
    {
        $this->callbackUrl = $callbackUrl;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return [
            'name' => $this->getName(),
            'callbackUrl' => $this->getCallbackUrl(),
        ];
    }
}
