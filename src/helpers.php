<?php

if (!function_exists('data')) {
    /**
     * Get / set the specified data value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param  array|string|null  $key
     * @param  mixed  $default
     * @return mixed|\Illuminate\Config\Repository
     */
    function data($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('data-loader');
        }

        if (is_array($key)) {
            return app('data-loader')->repository->set($key);
        }

        return app('data-loader')->repository->get($key, $default);
    }
}
