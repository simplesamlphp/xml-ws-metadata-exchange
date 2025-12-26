<?php

declare(strict_types=1);

return [
    'http://schemas.xmlsoap.org/ws/2004/09/mex' => [
        'Dialect' => '\SimpleSAML\WebServices\MetadataExchange\XML\wsx\Dialect',
        'GetMetadata' => '\SimpleSAML\WebServices\MetadataExchange\XML\wsx\GetMetadata',
        'Identifier' => '\SimpleSAML\WebServices\MetadataExchange\XML\wsx\Identifier',
        'Location' => '\SimpleSAML\WebServices\MetadataExchange\XML\wsx\Location',
        'Metadata' => '\SimpleSAML\WebServices\MetadataExchange\XML\wsx\Metadata',
        'MetadataReference' => '\SimpleSAML\WebServices\MetadataExchange\XML\wsx\MetadataReference',
        'MetadataSection' => '\SimpleSAML\WebServices\MetadataExchange\XML\wsx\MetadataSection',
    ],
    'http://www.w3.org/2011/03/ws-mex' => [
    ],
];
