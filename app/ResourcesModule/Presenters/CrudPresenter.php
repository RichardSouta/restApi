<?php
namespace App\ResourcesModule\Presenters;

use Drahak\Restful\Application\UI\ResourcePresenter;
use Nette\Database\Context;
use App\ResourcesModule\User;

class CrudPresenter extends ResourcePresenter
{
    /** @var Context @inject */
    public $database;

    /** @var int @persistent */
    public $id;

    public function actionCreate()
    {

    }

    public function actionRead()
    {
        $user = $this->database->table('user')->get($this->id);
        $this->resource[] = $user ? $user : ['success' => false];
        $this->sendResource();
    }

    public function actionUpdate()
    {

    }

    public function actionDelete()
    {
        $this->resource[] = ['success' => ($this->database->table('user')->where('id =?', $this->id)->delete() ? true : false)];
        $this->sendResource();
    }

}