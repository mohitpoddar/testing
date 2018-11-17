<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Repositories\Criteria\Listvalues\UserGroups;
use App\Repositories\ListvalueRepository as Listvalue;

class ListvalueController extends Controller {
    //**
     * @var Listvalue
     */
    private $listvalue;
 
    public function __construct(Listvalue $listvalue) {
 
        $this->listvalue = $listvalue;
    }
 
    public function index() {
        //$this->listvalue->pushCriteria(new UserGroups());
        return \Response::json($this->listvalue->all());
    }
}