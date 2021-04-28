<?php

declare(strict_types=1);

namespace EdmondsCommerce\NtlmSoapClient;

use WsdlToPhp\PackageBase\AbstractSoapClientBase;

class NTLMSoapBase extends AbstractSoapClientBase
{
    public const DEFAULT_SOAP_CLIENT_CLASS = NTLMSoapClient::class;

    public function getSoapClientClassName(?string $soapClientClassName = null): string
    {
        return parent::getSoapClientClassName(static::DEFAULT_SOAP_CLIENT_CLASS);
    }

    public function initSoapClient(array $options): void
    {
        parent::initSoapClient($options);
        $client = $this->getSoapClient();
        $client->setUser($options[AbstractSoapClientBase::WSDL_LOGIN]);
        $client->setPassword($options[AbstractSoapClientBase::WSDL_PASSWORD]);
    }
}
