<?php

declare(strict_types=1);

namespace SimpleSAML\Test\WebServices\MetadataExchange\XML\wsx;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use SimpleSAML\WebServices\MetadataExchange\XML\wsx\AbstractWsxElement;
use SimpleSAML\WebServices\MetadataExchange\XML\wsx\Dialect;
use SimpleSAML\WebServices\MetadataExchange\XML\wsx\GetMetadata;
use SimpleSAML\WebServices\MetadataExchange\XML\wsx\Identifier;
use SimpleSAML\XML\Attribute;
use SimpleSAML\XML\DOMDocumentFactory;
use SimpleSAML\XML\TestUtils\SchemaValidationTestTrait;
use SimpleSAML\XML\TestUtils\SerializableElementTestTrait;
use SimpleSAML\XMLSchema\Type\AnyURIValue;
use SimpleSAML\XMLSchema\Type\StringValue;

use function dirname;
use function strval;

/**
 * Tests for wsx:GetMetadata.
 *
 * @package simplesamlphp/xml-ws-metadata-exchange
 */
#[Group('wsx')]
#[CoversClass(GetMetadata::class)]
#[CoversClass(AbstractWsxElement::class)]
final class GetMetadataTest extends TestCase
{
    use SchemaValidationTestTrait;
    use SerializableElementTestTrait;


    /**
     */
    public static function setUpBeforeClass(): void
    {
        self::$testedClass = GetMetadata::class;

        self::$xmlRepresentation = DOMDocumentFactory::FromFile(
            dirname(__FILE__, 4) . '/resources/xml/wsx/GetMetadata.xml',
        );
    }


    // test marshalling


    /**
     * Test creating an GetMetadata object from scratch.
     */
    public function testMarshalling(): void
    {
        $attr1 = new Attribute('urn:x-simplesamlphp:namespace', 'ssp', 'attr1', StringValue::fromString('testval1'));

        $getMetadata = new GetMetadata(
            new Dialect(AnyURIValue::fromString('urn:x-simplesamlphp:namespace')),
            new Identifier(AnyURIValue::fromString('urn:x-simplesamlphp:namespace')),
            [$attr1],
        );

        $this->assertFalse($getMetadata->isEmptyElement());
        $this->assertEquals(
            self::$xmlRepresentation->saveXML(self::$xmlRepresentation->documentElement),
            strval($getMetadata),
        );
    }
}
