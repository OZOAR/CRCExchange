<?php

namespace App\Builders\Contracts;

use App\Builders\CPEndpointBuilder;

interface EndpointBuilderContract
{
    /**
     * Make root endpoint.
     */
    public function root();

    /**
     * Make initial point with root endpoint.
     *
     * @return CPEndpointBuilder
     */
    public static function point();

    /**
     * Set URI of the request
     *
     * @param string $to
     *
     * @return CPEndpointBuilder
     */
    public function to(string $to);

    /**
     * Get actual endpoint.
     *
     * @return string|null
     */
    public function make();
}