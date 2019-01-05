<?php

namespace App\Builders;

use App\Builders\Contracts\EndpointBuilderContract;

abstract class AbstractEndpointBuilder implements EndpointBuilderContract
{
    /**
     * @var string|null
     */
    protected $endpoint;

    public function build()
    {
        return $this->endpoint;
    }

    public function to(string $to)
    {
        $this->endpoint .= $to;
        return $this;
    }

    public function make()
    {
        return $this->endpoint;
    }
}