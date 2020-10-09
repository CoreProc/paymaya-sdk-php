<?php

namespace CoreProc\PayMaya\Requests;

use JsonSerializable;

class RedirectUrl extends PaymayaRequest implements JsonSerializable
{
    /**
     * @var string|null
     */
    protected $success;

    /**
     * @var string|null
     */
    protected $failure;

    /**
     * @var string|null
     */
    protected $cancel;

    /**
     * @return string|null
     */
    public function getSuccess(): ?string
    {
        return $this->success;
    }

    /**
     * @param string|null $success
     * @return RedirectUrl
     */
    public function setSuccess(?string $success): self
    {
        $this->success = $success;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFailure(): ?string
    {
        return $this->failure;
    }

    /**
     * @param string|null $failure
     * @return RedirectUrl
     */
    public function setFailure(?string $failure): self
    {
        $this->failure = $failure;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCancel(): ?string
    {
        return $this->cancel;
    }

    /**
     * @param string|null $cancel
     * @return RedirectUrl
     */
    public function setCancel(?string $cancel): self
    {
        $this->cancel = $cancel;

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
            'success' => $this->getSuccess(),
            'failure' => $this->getFailure(),
            'cancel' => $this->getCancel(),
        ];
    }
}
