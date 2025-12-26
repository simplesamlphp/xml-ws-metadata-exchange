<?php

declare(strict_types=1);

namespace SimpleSAML\WebServices\MetadataExchange;

/**
 * Class holding constants relevant for WS Metadata Exchange.
 *
 * @package simplesamlphp/xml-ws-metadata-exchange
 */

class Constants extends \SimpleSAML\XML\Constants
{
    /**
     * The namespace for the Metadata Exchange protocol (2004).
     */
    public const string NS_WSX = 'http://schemas.xmlsoap.org/ws/2004/09/mex';

    /**
     * The namespace for the Metadata Exchange protocol (2011).
     */
    public const string NS_MEX = 'http://www.w3.org/2011/03/ws-mex';
}
