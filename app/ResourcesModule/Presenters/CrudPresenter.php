<?php
namespace App\ResourcesModule\Presenters;

use Drahak\Restful\Application\UI\ResourcePresenter;

/**
 * CRUD resource presenter
 * @package ResourcesModule
 * @author Drahomír Hanák
 */
class CrudPresenter extends ResourcePresenter
{

    public function actionCreate()
    {
        $this->resource->action = 'Create';
    }

    public function actionRead()
    {
        $this->resource->action = 'Read';
    }

    public function actionUpdate()
    {
        $this->resource->action = 'Update';
    }

    public function actionDelete()
    {
        $this->resource->action = 'Delete';
    }

}