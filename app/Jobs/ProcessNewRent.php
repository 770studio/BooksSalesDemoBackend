<?php

namespace App\Jobs;

use App\Rent;
use CloudCreativity\LaravelJsonApi\Pagination\StandardStrategy;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use CloudCreativity\LaravelJsonApi\Document\ResourceObject;
use CloudCreativity\LaravelJsonApi\Queue\ClientDispatchable;
use Neomerx\JsonApi\Contracts\Encoder\Parameters\EncodingParametersInterface;


class ProcessNewRent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, ClientDispatchable;


    public $document;


    /**
     * Create a new job instance.
     *
     * @param $document
     */
    public function __construct( $document )
    {

        //$adapter = new \App\JsonApi\Rents\Adapter(new StandardStrategy() );
       // $parameters = new \CloudCreativity\LaravelJsonApi\Encoder\Parameters\EncodingParameters;
        //$adapter->create( $document,  $parameters);


        $this->document = $document;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {  //dd(777555555555555);
       // $this->rent->save();

        $r =  Rent::create($this->document['data']['attributes'] )  ;
        $this->didCreate( $r );
    }
}
