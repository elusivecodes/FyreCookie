# FyreCookie

**FyreCookie** is a free, cookie library for *PHP*.


## Table Of Contents
- [Installation](#installation)
- [Methods](#methods)
- [Cookies](#cookies)



## Installation

**Using Composer**

```
composer require fyre/cookie
```

In PHP:

```php
use Fyre\Cookie\Cookie;
use Fyre\Cookie\CookieStore;
```


## Methods

**All**

Get all the cookies.

```php
$cookies = CookieStore::all();
```

**Clear**

Clear all cookies.

```php
CookieStore::clear();
```

**Count**

Get the number of cookies.

```php
$cookieCount = CookieStore::count();
```

**Delete**

Delete a cookie.

- `$name` is a string representing the cookie name.
- `$options` is an array containing cookie options.
    - `domain` is a string representing the cookie domain, and will default to "".
    - `path` is a string representing the cookie path, and will default to "*/*".
    - `secure` is a boolean indicating whether to set a secure cookie, and will default to *false*.
    - `httpOnly` is a boolean indicating whether to the cookie should be HTTP only, and will default to *false*.
    - `sameSite` is a string representing the cookie same site, and will default to "*Lax*".

```php
CookieStore::delete($name, $options);
```

**Dispatch**

Dispatch all cookies.

```php
CookieStore::dispatch();
```

**Get**

Get a cookie.

- `$name` is a string representing the cookie name.

```php
$cookie = CookieStore::get($name);
```

**Has**

Determine if a cookie exists.

- `$name` is a string representing the cookie name.

```php
$hasCookie = CookieStore::has($name);
```

**Set**

Set a cookie.

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
CookieStore::set($name, $value, $options);
```


## Cookies

**Set Defaults**

Set cookie default options.

- `$options` is an array containing cookie options.

```php
Cookie::setDefaults($options);
```

**Dispatch**

Dispatch the cookie.

```php
$cookie->dispatch();
```

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

Determine if the cookie has expired.

```php
$expired = $cookie->isExpired();
```

**Is Http Only**

Determine if the cookie is HTTP only.

```php
$httpOnly = $cookie->isHttpOnly();
```

**Is Secure**

Determine if the cookie is secure.

```php
$secure = $cookie->isSecure();
```