<?php namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Repositories\ProjectRepository as Project;
use App\Repositories\ListvalueRepository as Listvalue;

class ProjectsController extends Controller
{
    /**
     * @var Project
     */
    private $project;
    /**
    * @var Project
    */
    private $listvalue;
 
    public function __construct(Project $project, Listvalue $listvalue) {
 
        $this->project = $project;
        $this->listvalue = $listvalue;
    }
 
    public function index() {
        return view('projects.index');
    }
}