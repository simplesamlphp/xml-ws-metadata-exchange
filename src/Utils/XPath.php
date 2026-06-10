<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\MetadataExchange\Utils;

use Dom;
use SimpleSAML\WebServices\MetadataExchange\Constants as C;

/**
 * Compilation of utilities for XPath.
 *
 * @package simplesamlphp/xml-ws-metadata-exchange
 */
class XPath extends \SimpleSAML\XPath\XPath
{
    /*
     * Get a Dom\XPath object that can be used to search for WS Metadata Exchange elements.
     *
     * @param \Dom\Node $node The document to associate to the Dom\XPath object.
     * @param bool $autoregister Whether to auto-register all namespaces used in the document
     *
     * @return \Dom\XPath A Dom\XPath object ready to use in the given document, with several
     *   ws-related namespaces already registered.
     */
    public static function getXPath(Dom\Node $node, bool $autoregister = false): Dom\XPath
    {
        $xp = parent::getXPath($node, $autoregister);

        $xp->registerNamespace('wsx', C::NS_WSX);
        $xp->registerNamespace('mex', C::NS_MEX);

        return $xp;
    }
}
