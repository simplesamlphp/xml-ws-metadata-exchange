<?php

declare(strict_types=1);

namespace SimpleSAML\Test\WebServices\MetadataExchange\XML\wsx;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use SimpleSAML\Test\WebServices\MetadataExchange\Constants as C;
use SimpleSAML\WebServices\MetadataExchange\XML\wsx\AbstractWsxElement;
use SimpleSAML\WebServices\MetadataExchange\XML\wsx\Identifier;
use SimpleSAML\XML\DOMDocumentFactory;
use SimpleSAML\XML\TestUtils\SchemaValidationTestTrait;
use SimpleSAML\XML\TestUtils\SerializableElementTestTrait;
use SimpleSAML\XMLSchema\Type\AnyURIValue;

use function dirname;

/**
 * Class \SimpleSAML\WebServices\MetadataExchange\XML\wsx\IdentifierTest
 *
 * @package simplesamlphp/xml-ws-metadata-exchange
 */
#[Group('wsx')]
#[CoversClass(Identifier::class)]
#[CoversClass(AbstractWsxElement::class)]
final class IdentifierTest extends TestCase
{
    use SchemaValidationTestTrait;
    use SerializableElementTestTrait;


    /**
     */
    public static function setUpBeforeClass(): void
    {
        self::$testedClass = Identifier::class;

        self::$xmlRepresentation = DOMDocumentFactory::fromFile(
            dirname(__FILE__, 4) . '/resources/xml/wsx/Identifier.xml',
        );
    }


    // test marshalling


    /**
     * Test creating a Identifier object from scratch.
     */
    public function testMarshalling(): void
    {
        $identifier = new Identifier(AnyURIValue::fromString(C::NAMESPACE));

        $this->assertEquals(
            self::$xmlRepresentation->saveXML(self::$xmlRepresentation->documentElement),
            strval($identifier),
        );
    }
}
