<?php namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Repositories\TaskRepository as Task;
use App\Repositories\ListvalueRepository as Listvalue;

class TasksController extends Controller
{
    /**
     * @var Task
     */
    private $task;
    /**
    * @var Task
    */
    private $listvalue;
 
    public function __construct(Task $task, Listvalue $listvalue) {
 
        $this->task = $task;
        $this->listvalue = $listvalue;
    }
 
    public function index() {
        
        
    }
}