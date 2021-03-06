<?php

namespace App\JsonApi\Rents;

use App\Jobs\ProcessNewRent;
use App\Rent;
use CloudCreativity\LaravelJsonApi\Eloquent\AbstractAdapter;
use CloudCreativity\LaravelJsonApi\Pagination\StandardStrategy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
 use Neomerx\JsonApi\Contracts\Encoder\Parameters\EncodingParametersInterface;
use CloudCreativity\LaravelJsonApi\Document\ResourceObject;

class Adapter extends AbstractAdapter
{

    /**
     * Mapping of JSON API attribute field names to model keys.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Mapping of JSON API filter names to model scopes.
     *
     * @var array
     */
    protected $filterScopes = [];

    /**
     * Adapter constructor.
     *
     * @param StandardStrategy $paging
     */
    public function __construct(StandardStrategy $paging)
    {
        parent::__construct(new \App\Rent(), $paging);
    }

    /**
     * @param Builder $query
     * @param Collection $filters
     * @return void
     */
    protected function filter($query, Collection $filters)
    {
        $this->filterWithScopes($query, $filters);
    }

/*
    protected function createRecord(ResourceObject $resource)
    {
        // TODO: Implement createRecord() method.
    }*/

    public function create(array $document, EncodingParametersInterface $parameters  )
    {
        $record = $this->createRecord(
            $resource = $this->deserialize($document)
        );

        return  ProcessNewRent::client( $document )->dispatch();


    }

}
