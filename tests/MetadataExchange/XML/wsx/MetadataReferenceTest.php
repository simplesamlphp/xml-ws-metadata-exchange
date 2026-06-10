<?php

declare(strict_types=1);

namespace SimpleSAML\Test\WebServices\MetadataExchange\XML\wsx;

use Dom;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use SimpleSAML\WebServices\Addressing\XML\wsa_200508\Address;
use SimpleSAML\WebServices\Addressing\XML\wsa_200508\EndpointReference;
use SimpleSAML\WebServices\MetadataExchange\XML\wsx\AbstractWsxElement;
use SimpleSAML\WebServices\MetadataExchange\XML\wsx\MetadataReference;
use SimpleSAML\XML\Attribute;
use SimpleSAML\XML\Chunk;
use SimpleSAML\XML\DOMDocumentFactory;
use SimpleSAML\XML\TestUtils\SchemaValidationTestTrait;
use SimpleSAML\XML\TestUtils\SerializableElementTestTrait;
use SimpleSAML\XMLSchema\Type\AnyURIValue;
use SimpleSAML\XMLSchema\Type\StringValue;

use function dirname;
use function strval;

/**
 * Tests for wsx:MetadataReference.
 *
 * @package simplesamlphp/xml-ws-metadata-exchange
 */
#[Group('wsx')]
#[CoversClass(MetadataReference::class)]
#[CoversClass(AbstractWsxElement::class)]
final class MetadataReferenceTest extends TestCase
{
    use SchemaValidationTestTrait;
    use SerializableElementTestTrait;


    /** @var \Dom\Element $referenceParametersContent */
    protected static Dom\Element $referenceParametersContent;

    /** @var \Dom\Element $metadataContent */
    protected static Dom\Element $metadataContent;

    /** @var \Dom\Element $customContent */
    protected static Dom\Element $customContent;


    /**
     */
    public static function setUpBeforeClass(): void
    {
        self::$testedClass = MetadataReference::class;

        self::$xmlRepresentation = DOMDocumentFactory::FromFile(
            dirname(__FILE__, 4) . '/resources/xml/wsx/MetadataReference.xml',
        );

        self::$customContent = DOMDocumentFactory::fromString(
            '<ssp:Chunk xmlns:ssp="urn:x-simplesamlphp:namespace">SomeChunk</ssp:Chunk>',
        )->documentElement;
    }


    // test marshalling


    /**
     * Test creating an MetadataReference object from scratch.
     */
    public function testMarshalling(): void
    {
        $attr1 = new Attribute('urn:x-simplesamlphp:namespace', 'ssp', 'test1', StringValue::fromString('value1'));
        $attr2 = new Attribute('urn:x-simplesamlphp:namespace', 'ssp', 'test2', StringValue::fromString('value2'));

        $chunk = new Chunk(self::$customContent);

        $endpointReference = new EndpointReference(
            new Address(AnyURIValue::fromString('https://login.microsoftonline.com/login.srf'), [$attr2]),
            null,
            null,
            [$chunk],
            [$attr1],
        );

        $metadataReference = new MetadataReference([$endpointReference]);

        $expectedXml = self::$xmlRepresentation->saveXml(self::$xmlRepresentation->documentElement);
        $this->assertNotFalse($expectedXml);
        $actualXml = strval($metadataReference);

        $this->assertXmlStringEqualsXmlString($expectedXml, $actualXml);
    }
}
