<?php

declare(strict_types=1);

namespace SimpleSAML\Test\WebServices\MetadataExchange\XML\wsx;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use SimpleSAML\Test\WebServices\MetadataExchange\Constants as C;
use SimpleSAML\WebServices\MetadataExchange\XML\wsx\AbstractWsxElement;
use SimpleSAML\WebServices\MetadataExchange\XML\wsx\Location;
use SimpleSAML\XML\DOMDocumentFactory;
use SimpleSAML\XML\TestUtils\SchemaValidationTestTrait;
use SimpleSAML\XML\TestUtils\SerializableElementTestTrait;
use SimpleSAML\XMLSchema\Type\AnyURIValue;

use function dirname;

/**
 * Class \SimpleSAML\WebServices\MetadataExchange\XML\wsx\LocationTest
 *
 * @package simplesamlphp/xml-ws-metadata-exchange
 */
#[Group('wsx')]
#[CoversClass(Location::class)]
#[CoversClass(AbstractWsxElement::class)]
final class LocationTest extends TestCase
{
    use SchemaValidationTestTrait;
    use SerializableElementTestTrait;


    /**
     */
    public static function setUpBeforeClass(): void
    {
        self::$testedClass = Location::class;

        self::$xmlRepresentation = DOMDocumentFactory::fromFile(
            dirname(__FILE__, 4) . '/resources/xml/wsx/Location.xml',
        );
    }


    // test marshalling


    /**
     * Test creating a Location object from scratch.
     */
    public function testMarshalling(): void
    {
        $location = new Location(AnyURIValue::fromString(C::NAMESPACE));

        $this->assertEquals(
            self::$xmlRepresentation->saveXML(self::$xmlRepresentation->documentElement),
            strval($location),
        );
    }
}
