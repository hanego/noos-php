<?php

namespace Noos;

/**
 * Class Noos
 *
 * @package Noos
 */
class Noos
{
    // @var string The Noos API key to be used for requests.
    public static $apiKey;

    // @var string The Noos client_id to be used for Connect requests.
    public static $clientId;

    // @var string The base URL for the Noos API.
    public static $apiBase = 'https://api.noos.app';

    // @var string|null The version of the Noos API to use for requests.
    public static $apiVersion = null;

    // @var boolean Defaults to true.
    public static $verifySslCerts = true;

    // @var array The application's information (name, version, URL)
    public static $appInfo = null;

    // @var Util\LoggerInterface|null The logger to which the library will
    //   produce messages.
    public static $logger = null;

    // @var int Maximum number of request retries
    public static $maxNetworkRetries = 0;

    // @var float Maximum delay between retries, in seconds
    private static $maxNetworkRetryDelay = 2.0;

    // @var float Initial delay between retries, in seconds
    private static $initialNetworkRetryDelay = 0.5;

    const VERSION = '1.0.0';

    /**
     * @return string The API key used for requests.
     */
    public static function getApiKey()
    {
        return self::$apiKey;
    }

    /**
     * @return string The client_id used for Connect requests.
     */
    public static function getClientId()
    {
        return self::$clientId;
    }

    /**
     * @return Util\LoggerInterface The logger to which the library will
     *   produce messages.
     */
    public static function getLogger()
    {
        if (self::$logger == null) {
            return new Util\DefaultLogger();
        }
        return self::$logger;
    }

    /**
     * @param Util\LoggerInterface $logger The logger to which the library
     *   will produce messages.
     */
    public static function setLogger($logger)
    {
        self::$logger = $logger;
    }

    /**
     * Sets the API key to be used for requests.
     *
     * @param string $apiKey
     */
    public static function setApiKey($apiKey)
    {
        self::$apiKey = $apiKey;
    }

    /**
     * Sets the client_id to be used for Connect requests.
     *
     * @param string $clientId
     */
    public static function setClientId($clientId)
    {
        self::$clientId = $clientId;
    }

    /**
     * @return string The API version used for requests. null if we're using the
     *    latest version.
     */
    public static function getApiVersion()
    {
        return self::$apiVersion;
    }

    /**
     * @param string $apiVersion The API version to use for requests.
     */
    public static function setApiVersion($apiVersion)
    {
        self::$apiVersion = $apiVersion;
    }

    /**
     * @return boolean
     */
    public static function getVerifySslCerts()
    {
        return self::$verifySslCerts;
    }

    /**
     * @param boolean $verify
     */
    public static function setVerifySslCerts($verify)
    {
        self::$verifySslCerts = $verify;
    }

    /**
     * @return array | null The application's information
     */
    public static function getAppInfo()
    {
        return self::$appInfo;
    }

    /**
     * @param string $appName The application's name
     * @param string $appVersion The application's version
     * @param string $appUrl The application's URL
     */
    public static function setAppInfo($appName, $appVersion = null, $appUrl = null)
    {
        self::$appInfo = self::$appInfo ?: [];
        self::$appInfo['name'] = $appName;
        self::$appInfo['url'] = $appUrl;
        self::$appInfo['version'] = $appVersion;
    }

    /**
     * @return int Maximum number of request retries
     */
    public static function getMaxNetworkRetries()
    {
        return self::$maxNetworkRetries;
    }

    /**
     * @param int $maxNetworkRetries Maximum number of request retries
     */
    public static function setMaxNetworkRetries($maxNetworkRetries)
    {
        self::$maxNetworkRetries = $maxNetworkRetries;
    }

    /**
     * @return float Maximum delay between retries, in seconds
     */
    public static function getMaxNetworkRetryDelay()
    {
        return self::$maxNetworkRetryDelay;
    }

    /**
     * @return float Initial delay between retries, in seconds
     */
    public static function getInitialNetworkRetryDelay()
    {
        return self::$initialNetworkRetryDelay;
    }
}
