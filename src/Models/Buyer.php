<?php

namespace CoreProc\PayMaya\Models;

use JsonSerializable;

class Buyer implements JsonSerializable
{
    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $middleName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var Contact
     */
    protected $contact;

    /**
     * @var Address
     */
    protected $shippingAddress;

    /**
     * @var Address
     */
    protected $billingAddress;

    /**
     * @var string
     */
    protected $ipAddress;

    /**
     * @return string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Buyer
     */
    public function setFirstName(string $firstName): Buyer
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getMiddleName(): ?string
    {
        return $this->middleName;
    }

    /**
     * @param string $middleName
     * @return Buyer
     */
    public function setMiddleName(string $middleName): Buyer
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Buyer
     */
    public function setLastName(string $lastName): Buyer
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     * @return Buyer
     */
    public function setContact(Contact $contact): Buyer
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return Address
     */
    public function getShippingAddress(): ?Address
    {
        return $this->shippingAddress;
    }

    /**
     * @param Address $shippingAddress
     * @return Buyer
     */
    public function setShippingAddress(Address $shippingAddress): Buyer
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    /**
     * @return Address
     */
    public function getBillingAddress(): ?Address
    {
        return $this->billingAddress;
    }

    /**
     * @param Address $billingAddress
     * @return Buyer
     */
    public function setBillingAddress(Address $billingAddress): Buyer
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     * @return Buyer
     */
    public function setIpAddress(string $ipAddress): Buyer
    {
        $this->ipAddress = $ipAddress;

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
            'first_name' => $this->getFirstName(),
            'middle_name' => $this->getMiddleName(),
            'last_name' => $this->getLastName(),
            'contact' => $this->getContact(),
            'shippingAddress' => $this->getShippingAddress(),
            'billingAddress' => $this->getBillingAddress(),
            'ipAddress' => $this->getIpAddress(),
        ];
    }
}
