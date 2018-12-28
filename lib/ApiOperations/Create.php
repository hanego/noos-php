<?php

namespace Noos\ApiOperations;

/**
 * Trait for creatable resources. Adds a `create()` static method to the class.
 *
 * This trait should only be applied to classes that derive from NoosObject.
 */
trait Create
{
    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return \Noos\ApiResource The created resource.
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Noos\Util\Util::convertToNoosObject($response->json, $opts);
        $obj->setLastResponse($response);
        return $obj;
    }
}
