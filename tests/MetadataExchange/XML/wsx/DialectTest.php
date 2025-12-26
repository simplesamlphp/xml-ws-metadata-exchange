<?php

declare(strict_types=1);

namespace SimpleSAML\Test\WebServices\MetadataExchange\XML\wsx;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use SimpleSAML\Test\WebServices\MetadataExchange\Constants as C;
use SimpleSAML\WebServices\MetadataExchange\XML\wsx\AbstractWsxElement;
use SimpleSAML\WebServices\MetadataExchange\XML\wsx\Dialect;
use SimpleSAML\XML\DOMDocumentFactory;
use SimpleSAML\XML\TestUtils\SchemaValidationTestTrait;
use SimpleSAML\XML\TestUtils\SerializableElementTestTrait;
use SimpleSAML\XMLSchema\Type\AnyURIValue;

use function dirname;

/**
 * Class \SimpleSAML\WebServices\MetadataExchange\XML\wsx\DialectTest
 *
 * @package simplesamlphp/xml-ws-metadata-exchange
 */
#[Group('wsx')]
#[CoversClass(Dialect::class)]
#[CoversClass(AbstractWsxElement::class)]
final class DialectTest extends TestCase
{
    use SchemaValidationTestTrait;
    use SerializableElementTestTrait;


    /**
     */
    public static function setUpBeforeClass(): void
    {
        self::$testedClass = Dialect::class;

        self::$xmlRepresentation = DOMDocumentFactory::fromFile(
            dirname(__FILE__, 4) . '/resources/xml/wsx/Dialect.xml',
        );
    }


    // test marshalling


    /**
     * Test creating a Dialect object from scratch.
     */
    public function testMarshalling(): void
    {
        $dialect = new Dialect(AnyURIValue::fromString(C::NAMESPACE));

        $this->assertEquals(
            self::$xmlRepresentation->saveXML(self::$xmlRepresentation->documentElement),
            strval($dialect),
        );
    }
}
