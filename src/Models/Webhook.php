<?php

namespace CoreProc\PayMaya\Models;

use JsonSerializable;

class Webhook implements JsonSerializable
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
            'callbackUrl' => $this->getCallbackUrl(),
        ];
    }
}
