<?php namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Repositories\PortfolioRepository as Portfolio;
use App\Repositories\ListvalueRepository as Listvalue;

class PortfoliosController extends Controller
{
    /**
     * @var Portfolio
     */
    private $portfolio;
    /**
    * @var Portfolio
    */
    private $listvalue;
 
    public function __construct(Portfolio $portfolio, Listvalue $listvalue) {
 
        $this->portfolio = $portfolio;
        $this->listvalue = $listvalue;
    }
 
    public function index() {
        

        
    }
}
