<?php namespace App\SO\Repositories\Criteria\Users;
 
use App\SO\Repositories\Contracts\CriteriaInterface;
use App\SO\Repositories\Contracts\RepositoryInterface as Repository;
use App\SO\Repositories\Contracts\RepositoryInterface;
 
class IsAdmin implements CriteriaInterface {
 
    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        $query = $model->where('is_permission', '=', 1);
        return $query;
    }
}