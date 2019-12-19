<?php

namespace CoreProc\PayMaya\Models\Checkout;

class CheckoutResponse
{
    protected $checkoutId;

    protected $redirectUrl;

    /**
     * @return string
     */
    public function getCheckoutId(): ?string
    {
        return $this->checkoutId;
    }

    /**
     * @return string
     */
    public function getRedirectUrl(): ?string
    {
        return $this->redirectUrl;
    }
}
