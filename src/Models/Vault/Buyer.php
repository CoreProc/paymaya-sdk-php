<?php

namespace CoreProc\PayMaya\Models\Vault;

use Carbon\Carbon;
use CoreProc\PayMaya\Models\Address;
use CoreProc\PayMaya\Models\Contact;
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
     * @var string
     */
    protected $sex;

    /**
     * @var Carbon
     */
    protected $birthday;

    /**
     * @var Contact
     */
    protected $contact;

    /**
     * @var Address
     */
    protected $billingAddress;

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Buyer
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getMiddleName(): string
    {
        return $this->middleName;
    }

    /**
     * @param string $middleName
     * @return Buyer
     */
    public function setMiddleName(string $middleName): self
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Buyer
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getSex(): string
    {
        return $this->sex;
    }

    /**
     * @param string $sex
     * @return Buyer
     */
    public function setSex(string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * @return Carbon
     */
    public function getBirthday(): Carbon
    {
        return $this->birthday;
    }

    /**
     * @param string $birthday
     * @return Buyer
     */
    public function setBirthday(string $birthday): self
    {
        $this->birthday = Carbon::createFromTimeString($birthday)->format('Y-m-d');

        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     * @return Buyer
     */
    public function setContact(Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return Address
     */
    public function getBillingAddress(): Address
    {
        return $this->billingAddress;
    }

    /**
     * @param Address $billingAddress
     * @return Buyer
     */
    public function setBillingAddress(Address $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return [
            'first_name' => $this->getFirstName(),
            'middle_name' => $this->getMiddleName(),
            'last_name' => $this->getLastName(),
            'sex' => $this->getSex(),
            'birthday' => $this->getBirthday(),
            'contact' => $this->getContact(),
            'billingAddress' => $this->getBillingAddress(),
        ];
    }
}
