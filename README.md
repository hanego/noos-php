
# Noos PHP bindings
You can sign up for a Noos account at https://www.noos.app.

## Disclaimer
This source code is largely inspired by the [Stripe PHP library](https://github.com/stripe/stripe-php)

## Requirements

PHP 5.4.0 and later.

## Composer

You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require noos/noos-php
```

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once('vendor/autoload.php');
```

## Manual Installation

If you do not wish to use Composer, you can download the [latest release](https://github.com/Noos/Noos-php/releases). Then, to use the bindings, include the `init.php` file.

```php
require_once('/path/to/noos-php/init.php');
```

## Dependencies

The bindings require the following extensions in order to work properly:

- [`curl`](https://secure.php.net/manual/en/book.curl.php), although you can use your own non-cURL client if you prefer
- [`json`](https://secure.php.net/manual/en/book.json.php)
- [`mbstring`](https://secure.php.net/manual/en/book.mbstring.php) (Multibyte String)

If you use Composer, these dependencies should be handled automatically. If you install manually, you'll want to make sure that these extensions are available.

## Getting Started

Simple usage looks like:

```php
\Noos\Noos::setApiKey('*******************');
$order= \Noos\Order::create(['provider' => 'manual', 'orderId' => '1', 'status' => 'complete', 'purchasedDate' => '', 'items' => ['sku' => 'MYSKU', 'name' => 'My sku', 'qtyOrdered' => 2]]);
echo $order;
```

## Documentation

Please see https://www.noos.app/docs/api for up-to-date documentation.

## Custom Request Timeouts

*NOTE:* We do not recommend decreasing the timeout for non-read-only calls (e.g. product/order creation), since even if you locally timeout, the request on Noos's side can still complete. If you are decreasing timeouts on these calls, make sure to use [idempotency tokens](https://Noos.com/docs/api/php#idempotent_requests) to avoid executing the same transaction twice as a result of timeout retry logic.

To modify request timeouts (connect or total, in seconds) you'll need to tell the API client to use a CurlClient other than its default. You'll set the timeouts in that CurlClient.

```php
// set up your tweaked Curl client
$curl = new \Noos\HttpClient\CurlClient();
$curl->setTimeout(10); // default is \Noos\HttpClient\CurlClient::DEFAULT_TIMEOUT
$curl->setConnectTimeout(5); // default is \Noos\HttpClient\CurlClient::DEFAULT_CONNECT_TIMEOUT

echo $curl->getTimeout(); // 10
echo $curl->getConnectTimeout(); // 5

// tell Noos to use the tweaked client
\Noos\ApiRequestor::setHttpClient($curl);

// use the Noos API client as you normally would
```

## Custom cURL Options (e.g. proxies)

Need to set a proxy for your requests? Pass in the requisite `CURLOPT_*` array to the CurlClient constructor, using the same syntax as `curl_stopt_array()`. This will set the default cURL options for each HTTP request made by the SDK, though many more common options (e.g. timeouts; see above on how to set those) will be overridden by the client even if set here.

```php
// set up your tweaked Curl client
$curl = new \Noos\HttpClient\CurlClient([CURLOPT_PROXY => 'proxy.local:80']);
// tell Noos to use the tweaked client
\Noos\ApiRequestor::setHttpClient($curl);
```

Alternately, a callable can be passed to the CurlClient constructor that returns the above array based on request inputs. See `testDefaultOptions()` in `tests/CurlClientTest.php` for an example of this behavior. Note that the callable is called at the beginning of every API request, before the request is sent.

### Configuring a Logger

The library does minimal logging, but it can be configured
with a [`PSR-3` compatible logger][psr3] so that messages
end up there instead of `error_log`:

```php
\Noos\Noos::setLogger($logger);
```

### Accessing response data

You can access the data from the last API response on any object via `getLastResponse()`.

```php
$order= \Noos\Order::create(['provider' => 'manual', 'orderId' => '1', 'status' => 'complete', 'purchasedDate' => '', 'items' => ['sku' => 'MYSKU', 'name' => 'My sku', 'qtyOrdered' => 2]]);
echo $order->getLastResponse();
```

### SSL / TLS compatibility issues

Noos's API now requires that all connections use TLS 1.2. Some systems (most notably some older CentOS and RHEL versions) are capable of using TLS 1.2 but will use TLS 1.0 or 1.1 by default. In this case, you'd get an `invalid_request_error` with the following error message: "Noos no longer supports API requests made with TLS 1.0. Please initiate HTTPS connections with TLS 1.2 or later.

The recommended course of action is to upgrade your cURL and OpenSSL packages so that TLS 1.2 is used by default, but if that is not possible, you might be able to solve the issue by setting the `CURLOPT_SSLVERSION` option to either `CURL_SSLVERSION_TLSv1` or `CURL_SSLVERSION_TLSv1_2`:

```php
$curl = new \Noos\HttpClient\CurlClient([CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1]);
\Noos\ApiRequestor::setHttpClient($curl);
```

### Configuring Automatic Retries

The library can be configured to automatically retry requests that fail due to
an intermittent network problem:

```php
\Noos\Noos::setMaxNetworkRetries(2);
```

Idempotency keys are added to requests to guarantee that
retries are safe.

### SSL / TLS configuration option

See the "SSL / TLS compatibility issues" paragraph above for full context. If you want to ensure that your plugin can be used on all systems, you should add a configuration option to let your users choose between different values for `CURLOPT_SSLVERSION`: none (default), `CURL_SSLVERSION_TLSv1` and `CURL_SSLVERSION_TLSv1_2`.

[composer]: https://getcomposer.org/
[curl]: http://curl.haxx.se/docs/caextract.html
[psr3]: http://www.php-fig.org/psr/psr-3/
