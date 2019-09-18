<?php

namespace CoreProc\PayMaya\Requests;

use JsonSerializable;

class RedirectUrl implements JsonSerializable
{
    /**
     * @var string
     */
    protected $success;

    /**
     * @var string
     */
    protected $failure;

    /**
     * @var string
     */
    protected $cancel;

    /**
     * @return string
     */
    public function getSuccess(): ?string
    {
        return $this->success;
    }

    /**
     * @param string $success
     * @return RedirectUrl
     */
    public function setSuccess(string $success): RedirectUrl
    {
        $this->success = $success;

        return $this;
    }

    /**
     * @return string
     */
    public function getFailure(): ?string
    {
        return $this->failure;
    }

    /**
     * @param string $failure
     * @return RedirectUrl
     */
    public function setFailure(string $failure): RedirectUrl
    {
        $this->failure = $failure;

        return $this;
    }

    /**
     * @return string
     */
    public function getCancel(): ?string
    {
        return $this->cancel;
    }

    /**
     * @param string $cancel
     * @return RedirectUrl
     */
    public function setCancel(string $cancel): RedirectUrl
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
