NTLM SOAP Client
================

This is a very simple SOAP client that supports NTLM authentication for use with [WSDL To PHP](https://github.com/WsdlToPhp/PackageBase)

It has two classes, the [Client](./src/NTLMSoapClient.php) that allows the username and password to be set, and tells CURL to use NTLM, and the
[Base](./src/NTLMSoapBase.php) which extends the Abstract client from WsdlToPhp and sets the options.

Usage
-----

When generating the client you need to use the `setSoapClientClass` option and pass in the Base class. A simplified example is shown below

```php
<?php

declare(strict_types=1);

use EdmondsCommerce\NtlmSoapClient\NTLMSoapBase;
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\Generator\Generator;

$options = GeneratorOptions::instance();
$options
    ->setSoapClientClass(NTLMSoapBase::class)
    /* Other options as required */
    ;
// Generator instantiation
$generator = new Generator($options);
// Package generation
$generator->generatePackage();

```

When using the generated classes, pass in the `WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_LOGIN` and
`WsdlToPhp\PackageBase\AbstractSoapClientBase::WSDL_PASSWORD` options with the username and password.

Inspiration
-----------

The code for the Client came from the [following ticket](https://github.com/WsdlToPhp/PackageGenerator/issues/57) in the main project. I've just wrapped
it in a library as I needed to use it in several different projects

