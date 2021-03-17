<?php

namespace App\JsonApi\QueueJobs;

use CloudCreativity\LaravelJsonApi\Queue\AsyncSchema;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{
    use AsyncSchema;

    /**
     * @var string
     */
    protected $resourceType = 'queue-jobs';

    /**
     * @param \App\QueueJob $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param \App\QueueJob $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'createdAt' => $resource->created_at,
            'updatedAt' => $resource->updated_at,
        ];
    }
}
