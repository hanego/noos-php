<?php

namespace Noos\Error;

class InvalidRequest extends Base
{
    public function __construct(
        $message,
        $NoosParam,
        $httpStatus = null,
        $httpBody = null,
        $jsonBody = null,
        $httpHeaders = null
    ) {
        parent::__construct($message, $httpStatus, $httpBody, $jsonBody, $httpHeaders);
        $this->NoosParam = $NoosParam;
    }

    public function getNoosParam()
    {
        return $this->NoosParam;
    }
}
