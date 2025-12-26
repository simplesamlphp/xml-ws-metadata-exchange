<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\MetadataExchange\XML\wsx;

use SimpleSAML\XML\SchemaValidatableElementInterface;
use SimpleSAML\XML\SchemaValidatableElementTrait;
use SimpleSAML\XML\TypedTextContentTrait;
use SimpleSAML\XMLSchema\Type\AnyURIValue;

/**
 * An Location element
 *
 * @package simplesamlphp/xml-ws-metadata-exchange
 */
final class Location extends AbstractWsxElement implements SchemaValidatableElementInterface
{
    use SchemaValidatableElementTrait;
    use TypedTextContentTrait;


    public const string TEXTCONTENT_TYPE = AnyURIValue::class;
}
