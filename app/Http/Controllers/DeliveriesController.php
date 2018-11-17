<?php namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Repositories\DeliveryRepository as Delivery;
use App\Repositories\ListvalueRepository as Listvalue;

class DeliveriesController extends Controller
{
    /**
     * @var Delivery
     */
    private $delivery;
    /**
    * @var Delivery
    */
    private $listvalue;
 
    public function __construct(Delivery $delivery, Listvalue $listvalue) {
 
        $this->delivery = $delivery;
        $this->listvalue = $listvalue;
    }
 
    public function index() {
        
        
    }
}