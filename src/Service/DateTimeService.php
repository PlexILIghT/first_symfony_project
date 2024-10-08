<?php

namespace App\Service;

use http\Env\Response;

class DateTimeService
{
    public function getCurrentDateTime(): string
    {
        return (new \DateTime())->format('Y-m-d H:i:s');
    }
}