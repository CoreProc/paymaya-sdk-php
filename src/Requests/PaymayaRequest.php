<?php

namespace CoreProc\PayMaya\Requests;

abstract class PaymayaRequest
{
    public static function make()
    {
        return new static();
    }
}
