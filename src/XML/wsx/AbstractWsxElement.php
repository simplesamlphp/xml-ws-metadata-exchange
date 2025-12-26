<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\MetadataExchange\XML\wsx;

use SimpleSAML\WebServices\MetadataExchange\Constants as C;
use SimpleSAML\XML\AbstractElement;

/**
 * Abstract class to be implemented by all the classes in this namespace
 *
 * @package simplesamlphp/xml-ws-metadata-exchange
 */
abstract class AbstractWsxElement extends AbstractElement
{
    public const string NS = C::NS_WSX;

    public const string NS_PREFIX = 'wsx';

    public const string SCHEMA = 'resources/schemas/MetadataExchange.xsd';
}
