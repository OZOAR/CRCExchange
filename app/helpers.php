<?php
/**
 * Generate the URL to a named route.
 *
 * @param  array|string $name
 * @param  array        $parameters
 * @param  bool          $saveRef
 * @param  bool         $absolute
 *
 * @return string
 */
function _route($name, array $parameters = [], $saveRef = true, $absolute = true)
{
    if (Request::has('ref') && $saveRef) {
        $parameters['ref'] = Request::query('ref');
    }

    return app('url')->route($name, $parameters, $absolute);
}