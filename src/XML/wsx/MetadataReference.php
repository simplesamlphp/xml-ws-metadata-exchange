<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\MetadataExchange\XML\wsx;

use DOMElement;
use SimpleSAML\WebServices\MetadataExchange\Assert\Assert;
use SimpleSAML\XML\ExtendableElementTrait;
use SimpleSAML\XML\SchemaValidatableElementInterface;
use SimpleSAML\XML\SchemaValidatableElementTrait;
use SimpleSAML\XMLSchema\Exception\InvalidDOMElementException;
use SimpleSAML\XMLSchema\Exception\MissingElementException;
use SimpleSAML\XMLSchema\XML\Constants\NS;

/**
 * Class defining the MetadataReference element
 *
 * @package simplesamlphp/xml-ws-metadata-exchange
 */
final class MetadataReference extends AbstractWsxElement implements SchemaValidatableElementInterface
{
    use ExtendableElementTrait;
    use SchemaValidatableElementTrait;


    /** The namespace-attribute for the xs:any element */
    public const string XS_ANY_ELT_NAMESPACE = NS::OTHER;


    /**
     * MetadataReference constructor
     *
     * @param \SimpleSAML\XML\SerializableElementInterface[] $children
     */
    final public function __construct(
        array $children = [],
    ) {
        Assert::minCount($children, 1, MissingElementException::class);
        $this->setElements($children);
    }


    /**
     * Create an instance of this object from its XML representation.
     *
     * @throws \SimpleSAML\XMLSchema\Exception\InvalidDOMElementException
     *   if the qualified name of the supplied element is wrong
     */
    public static function fromXML(DOMElement $xml): static
    {
        Assert::same($xml->localName, static::getLocalName(), InvalidDOMElementException::class);
        Assert::same($xml->namespaceURI, static::NS, InvalidDOMElementException::class);

        return new static(
            self::getChildElementsFromXML($xml),
        );
    }


    /**
     * Add this MetadataReference to an XML element.
     */
    public function toXML(?DOMElement $parent = null): DOMElement
    {
        $e = parent::instantiateParentElement($parent);

        foreach ($this->getElements() as $child) {
            if (!$child->isEmptyElement()) {
                $child->toXML($e);
            }
        }

        return $e;
    }
}
