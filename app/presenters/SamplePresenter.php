<?php
namespace App\Presenters;

use Drahak\Restful\IResource;
use Drahak\Restful\Application\UI\ResourcePresenter;

/**
 * SamplePresenter resource
 * @package ResourcesModule
 * @author Drahomír Hanák
 */
class SamplePresenter extends ResourcePresenter
{

    protected $typeMap = array(
        'json' => IResource::JSON,
        'xml' => IResource::XML
    );

    /**
     * @GET sample[.<type xml|json>]
     */
    public function actionContent($type = 'json')
    {
        $this->resource->title = 'REST API';
        $this->resource->subtitle = '';
        $this->sendResource($this->typeMap[$type]);
    }

    /**
     * @GET sample/detail
     */
    public function actionDetail()
    {
        $this->resource->message = 'Hello world';
    }

}