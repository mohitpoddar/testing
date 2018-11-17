<?php namespace App\Repositories\Criteria\Listvalues;
 
use App\Repositories\Contracts\CriteriaInterface;
use App\Repositories\Contracts\RepositoryInterface as Repository;
use App\Repositories\Contracts\RepositoryInterface;
 
class UserGroups extends Criteria {
//class UserGroups implements CriteriaInterface {

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        $query = $model->findWhere(['table' => 'users', 'field' => 'group']);
        return $query;
    }
}