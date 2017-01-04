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

    const ErrorMessage = ['success' => false];

    public function actionCreate()
    {
        try {
            $user = $this->database->table('user')->insert($this->getInput());
            $this->resource[] = $user;
        } catch (\Exception $e) {
            $this->resource[] = self::ErrorMessage;
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
        $this->resource[] = $user ? $user : self::ErrorMessage;
        $this->sendResource();
    }

    public function actionUpdate()
    {
        $this->returnErrorMessageIfIdEmpty();
        $this->resource[] = $this->getSuccessArray($this->database->table('user')->where('id =?', $this->id)->update($this->getInput()));
        $this->sendResource();
    }

    public function actionDelete()
    {
        $this->returnErrorMessageIfIdEmpty();
        $this->resource[] = $this->getSuccessArray($this->database->table('user')->where('id =?', $this->id)->delete());
        $this->sendResource();
    }

    private function returnErrorMessageIfIdEmpty()
    {
        if (is_null($this->id)) {
            $this->resource[] = self::ErrorMessage;
            $this->sendResource();
        }
    }

    /**
     * @param $rows int
     * @return array
     */
    private function getSuccessArray($rows)
    {
        return ['success' => ($rows ? true : false)];
    }

}