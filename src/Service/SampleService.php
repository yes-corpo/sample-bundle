<?php

namespace YesCorpo\Bundle\SampleBundle\Service;

class SampleService
{
    public function isValid(?bool $value = null)
    {
        if ($value === false) {
            return false;
        }

        return true;
    }
}