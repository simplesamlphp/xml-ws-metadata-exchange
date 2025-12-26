<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\MetadataExchange\XML\wsx;

use SimpleSAML\XML\SchemaValidatableElementInterface;
use SimpleSAML\XML\SchemaValidatableElementTrait;
use SimpleSAML\XML\TypedTextContentTrait;
use SimpleSAML\XMLSchema\Type\AnyURIValue;

/**
 * An Dialect element
 *
 * @package simplesamlphp/xml-ws-metadata-exchange
 */
final class Dialect extends AbstractWsxElement implements SchemaValidatableElementInterface
{
    use SchemaValidatableElementTrait;
    use TypedTextContentTrait;


    public const string TEXTCONTENT_TYPE = AnyURIValue::class;
}
