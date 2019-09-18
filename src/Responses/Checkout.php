<?php

namespace CoreProc\PayMaya\Responses;

use Psr\Http\Message\ResponseInterface;

class Checkout
{
    protected $checkoutId;

    protected $redirectUrl;

    public static function createFromResponse(ResponseInterface $response)
    {
        $result = json_decode($response->getBody()->getContents());

        $instance = new self;

        $instance->checkoutId = $result->checkoutId;
        $instance->redirectUrl = $result->redirectUrl;

        return $instance;
    }

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
