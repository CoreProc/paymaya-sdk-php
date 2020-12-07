<?php

namespace CoreProc\PayMaya\Requests;

use JsonSerializable;

class Address extends PaymayaRequest implements JsonSerializable
{
    /**
     * @var string|null
     */
    protected $line1;

    /**
     * @var string|null
     */
    protected $line2;

    /**
     * @var string|null
     */
    protected $city;

    /**
     * @var string|null
     */
    protected $state;

    /**
     * @var string|null
     */
    protected $zipCode;

    /**
     * @var string|null
     */
    protected $countryCode;

    /**
     * @return string|null
     */
    public function getLine1(): ?string
    {
        return $this->line1;
    }

    /**
     * @param string|null $line1
     * @return Address
     */
    public function setLine1(?string $line1): self
    {
        $this->line1 = $line1;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLine2(): ?string
    {
        return $this->line2;
    }

    /**
     * @param string|null $line2
     * @return Address
     */
    public function setLine2(?string $line2): self
    {
        $this->line2 = $line2;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     * @return Address
     */
    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     * @return Address
     */
    public function setState(?string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    /**
     * @param string|null $zipCode
     * @return Address
     */
    public function setZipCode(?string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * @param string|null $countryCode
     * @return Address
     */
    public function setCountryCode(?string $countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return [
            'line1' => $this->getLine1(),
            'line2' => $this->getLine2(),
            'city' => $this->getCity(),
            'state' => $this->getState(),
            'zipCode' => $this->getZipCode(),
            'countryCode' => $this->getCountryCode(),
        ];
    }
}
