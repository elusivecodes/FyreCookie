# FyreCookie

**FyreCookie** is a free, open-source cookie library for *PHP*.


## Table Of Contents
- [Installation](#installation)
- [Basic Usage](#basic-usage)
- [Methods](#methods)



## Installation

**Using Composer**

```
composer require fyre/cookie
```

In PHP:

```php
use Fyre\Http\Cookie;
```


## Basic Usage

- `$name` is a string representing the cookie name.
- `$value` is a string representing the cookie value.
- `$options` is an array containing cookie options.
    - `expires` is a number representing the cookie lifetime, and will default to *null*.
    - `domain` is a string representing the cookie domain, and will default to "".
    - `path` is a string representing the cookie path, and will default to "*/*".
    - `secure` is a boolean indicating whether to set a secure cookie, and will default to *false*.
    - `httpOnly` is a boolean indicating whether to the cookie should be HTTP only, and will default to *false*.
    - `sameSite` is a string representing the cookie same site, and will default to "*Lax*".

```php
$cookie = new Cookie($name, $value, $options);
```


## Methods

**Get Domain**

Get the cookie domain.

```php
$domain = $cookie->getDomain();
```

**Get Expires**

Get the cookie expires timestamp.

```php
$expires = $cookie->getExpires();
```

**Get Name**

Get the cookie name.

```php
$name = $cookie->getName();
```

**Get Path**

Get the cookie path.

```php
$path = $cookie->getPath();
```

**Get Same Site**

Get the cookie same site attribute.

```php
$sameSite = $cookie->getSameSite();
```

**Get Value**

Get the cookie value.

```php
$value = $cookie->getValue();
```

**Is Expired**

Determine whether the cookie has expired.

```php
$expired = $cookie->isExpired();
```

**Is Http Only**

Determine whether the cookie is HTTP only.

```php
$httpOnly = $cookie->isHttpOnly();
```

**Is Secure**

Determine whether the cookie is secure.

```php
$secure = $cookie->isSecure();
```