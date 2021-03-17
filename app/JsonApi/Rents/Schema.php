<?php

namespace App\JsonApi\Rents;



use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{


    /**
     * @var string
     */
    protected $resourceType = 'rents';

    /**
     * @param \App\Rent $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param \App\Rent $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'createdAt' => $resource->created_at,
            'updatedAt' => $resource->updated_at,
            'count' => $resource->count,
            'deadline' => $resource->deadline,
            'deposit' => $resource->deposit,
            'user_id' => $resource->user_id,
            'book_id' => $resource->book_id,



        ];
    }


    public function getRelationships($resource, $isPrimary, array $includeRelationships)
    {
        return [
            'users' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ],
            'books' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ],
        ];
    }
}
