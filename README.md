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
use Fyre\Cookie\CookieStore;
```


## Methods

**Clear**

Clear all cookies.

```php
CookieStore::clear();
```

**Delete**

Delete a cookie.

- `$name` is a string representing the cookie name.
- `$options` is an array containing cookie options.

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
CookieStore::get($name);
```

**Has**

Determine if a cookie exists.

- `$name` is a string representing the cookie name.

```php
$has = CookieStore::has($name);
```

**Set**

Set a cookie.

- `$name` is a string representing the cookie name.
- `$value` is a string representing the cookie value.
- `$options` is an array containing cookie options.

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