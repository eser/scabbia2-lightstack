# Scabbia2 LightStack Component

[This component](https://github.com/eserozvataf/scabbia2-lightstack) is a simple abstraction layer which constructs `Middleware`, `Request` and `Response` concepts will be shared with other components or codes. It's lighter alternative for [smyfony](http://symfony.com/)'s [HttpKernel](https://github.com/symfony/HttpKernel) and [HttpFoundation](https://github.com/symfony/HttpFoundation).

[![Build Status](https://travis-ci.org/eserozvataf/scabbia2-lightstack.png?branch=master)](https://travis-ci.org/eserozvataf/scabbia2-lightstack)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/eserozvataf/scabbia2-lightstack/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/eserozvataf/scabbia2-lightstack/?branch=master)
[![Total Downloads](https://poser.pugx.org/eserozvataf/scabbia2-lightstack/downloads.png)](https://packagist.org/packages/eserozvataf/scabbia2-lightstack)
[![Latest Stable Version](https://poser.pugx.org/eserozvataf/scabbia2-lightstack/v/stable)](https://packagist.org/packages/eserozvataf/scabbia2-lightstack)
[![Latest Unstable Version](https://poser.pugx.org/eserozvataf/scabbia2-lightstack/v/unstable)](https://packagist.org/packages/eserozvataf/scabbia2-lightstack)
[![Documentation Status](https://readthedocs.org/projects/scabbia2-documentation/badge/?version=latest)](https://readthedocs.org/projects/scabbia2-documentation)

## Usage

### Request Object

```php
use Scabbia\LightStack\Request;

$request = Request::generateFromGlobals();

// full url in scheme://host:port/directory/ format
echo $request->getEndpoint();

// http method
echo $request->getFormat();

// path info
echo $request->getPathInfo();

// remote ip
echo $request->getRemoteIp();

// is ajax request?
var_dump($request->isAsynchronous());

// instead of $_GET['p']
echo $request->get('p');

// or $_POST['p']
echo $request->post('p');

// or $_FILES['p']
var_dump($request->file('p'));

// or $_GET['p'] || $_POST['p'] || $_FILES['p']
echo $request->data('p');

// or $_SERVER['REQUEST_METHOD'];
echo $request->server('REQUEST_METHOD');

// or $_SESSION['p']
echo $request->session('p');

// or $_COOKIE['p']
echo $request->cookie('p');

// from http headers
echo $request->header('Accept-Language');

// check if a value with key 'p' is posted
var_dump($request->has('post', 'p'));

// check if a file with key 'p' is uploaded
var_dump($request->has('file', 'p'));

// retrieve all posted values
print_r($request->all('post'));

// retrieve all values in request
print_r($request->all());
```

## Links
- [List of All Scabbia2 Components](https://github.com/eserozvataf/scabbia2)
- [Documentation](https://readthedocs.org/projects/scabbia2-documentation)
- [Twitter](https://twitter.com/eserozvataf)
- [Contributor List](contributors.md)
- [License Information](LICENSE)


## Contributing
It is publicly open for any contribution. Bugfixes, new features and extra modules are welcome. All contributions should be filed on the [eserozvataf/scabbia2-lightstack](https://github.com/eserozvataf/scabbia2-lightstack) repository.

* To contribute to code: Fork the repo, push your changes to your fork, and submit a pull request.
* To report a bug: If something does not work, please report it using GitHub issues.
* To support: [![Donate](https://img.shields.io/gratipay/eserozvataf.svg)](https://gratipay.com/eserozvataf/)
