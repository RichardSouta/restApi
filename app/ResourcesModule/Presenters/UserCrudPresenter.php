<?php
namespace App\ResourcesModule\Presenters;

use Drahak\Restful\Application\UI\ResourcePresenter;
use Nette\Database\Context;

class UserCrudPresenter extends ResourcePresenter
{
    /** @var Context @inject */
    public $database;

    /** @var int @persistent */
    public $id;

    public function actionCreate()
    {
        try {
            $user = $this->database->table('user')->insert($this->getInput());
            $this->resource[] = $user;
        } catch (\Exception $e) {
            $this->resource[] = ['success' => false];
        }
        $this->sendResource();
    }

    public function actionRead()
    {
        if (is_null($this->id)) {
            $user = $this->database->table('user')->fetchAll();
        } else {
            $user = $this->database->table('user')->get($this->id);
        }
        $this->resource[] = $user ? $user : ['success' => false];
        $this->sendResource();
    }

    public function actionUpdate()
    {
        $this->isIdSet();
        $this->resource[] = ['success' => ($this->database->table('user')->where('id =?', $this->id)->update($this->getInput()) ? true : false)];
        $this->sendResource();
    }

    public function actionDelete()
    {
        $this->isIdSet();
        $this->resource[] = ['success' => ($this->database->table('user')->where('id =?', $this->id)->delete() ? true : false)];
        $this->sendResource();
    }

    private function isIdSet()
    {
        if (is_null($this->id)) {
            $this->resource[] = ['success' => false];
            $this->sendResource();
        }
    }

}