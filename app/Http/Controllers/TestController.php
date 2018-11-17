<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SO\Models\User;

//use Faker\Generator as Faker;

class TestController extends Controller {
    //
    // protected $user;
    private $user;

    public function __construct(User $user) {

        $this->user = $user;
    }

    public function testdrill1()
    {
        
        //$user = App\User::find(1);

        //foreach ($user->notifications as $notification) {
        //    echo $notification->type;
        //}

        //$this->user->pushCriteria(new IsAdmin());
        //return \Response::json($this->user->all());
        
        //$criteria = new UserGroups();
        //return \Response::json($this->listvalue->getByCriteria($criteria)->all());
        
        //$this->listvalue->pushCriteria(new UserGroups());
        return \Response::json($this->listvalue->all());
        //return \Response::json($this->listvalue->findByField('id','2',['table','value']));
        //$groups=$this->listvalue->findWhere(['table' => 'users','field' => 'group'],['value'])->pluck('value');//->all();
        //$data = ['groups' => $groups];
        //dd(compact('groups'));
        //return \Response::json($this->listvalue->findWhere(['table' => 'users','field' => 'group'],['value']));
        


    }

    public function testdrill2()
    {
        return User::create([
            //'name' => $faker->name,
            //'email' => $faker->unique()->safeEmail,
            'name' => 'Joe Testing',
            'email' => str_random(3).time() . '.test@joe.com',
            'username' => 'xjoe',
            'password' => bcrypt('password'),
            'remember_token' => str_random(10),
            'status' => 1,
        ]);

        //
    
    }

}