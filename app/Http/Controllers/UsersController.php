<?php namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository as User;
use App\Repositories\ListvalueRepository as Listvalue;
 
class UsersController extends Controller {
 
    /**
     * @var User
     */
    private $user;
    /**
    * @var Listvalue
    */
    private $listvalue;
    private $listvalue2;
 
    public function __construct(User $user, Listvalue $listvalue, Listvalue $listvalue2) {
 
        $this->user = $user;
        $this->listvalue = $listvalue;
        $this->listvalue2 = $listvalue2;
    }
 
    public function index() {
        return \Response::json($this->user->all());
    }

    public function showUsersConfigIndex() {
        if (Auth::check()) {
            // The user is logged in...
            $user = Auth::user();
            if(!$user->is_permission==0){
                // The user is admin (1) or superuser (2)
                $filtername='';
                $filterdivision='%';
                $filtertype='%';
                $filteroptions = array('filtername'=>$filtername, 'filterdivision'=>$filterdivision, 'filtertype'=>$filtertype);
                $groups= $this->listvalue->findWhere(['table' => 'users','field' => 'group'],['value','fulltext']);
                $types = $this->listvalue2->findWhere(['table' => 'users','field' => 'is_permission'],['value','fulltext']);
                if ($filtertype=='%') {
                    $users = $this->user->findWhere([['name', 'LIKE', '%'.$filtername.'%'], ['group', 'LIKE', $filterdivision]],['*']);
                }
                else{
                    $users = $this->user->findWhere([['name', 'LIKE', '%'.$filtername.'%'], ['group', 'LIKE', $filterdivision], ['is_permission', '=', intval($filtertype)]],['*']);
                }
                return view('admin.user.users-config-index', compact('users','groups','types','filteroptions'));
            } else {
                abort(401, 'Not allowed: No access rights for the user');

            }
        }
    }

    public function showFiltered(Request $request){
        $filtername=$request->input('filtername');
        $filterdivision=$request->input('filterdivision');
        $filtertype=$request->input('filtertype');
        $filteroptions = array('filtername'=>$filtername, 'filterdivision'=>$filterdivision, 'filtertype'=>$filtertype);
        $groups= $this->listvalue->findWhere(['table' => 'users','field' => 'group'],['value','fulltext']);
        $types = $this->listvalue2->findWhere(['table' => 'users','field' => 'is_permission'],['value','fulltext']);
        if ($filtertype=='%') {
            $users = $this->user->findWhere([['name', 'LIKE', '%'.$filtername.'%'], ['group', 'LIKE', $filterdivision]],['*']);
        }
        else{
            $users = $this->user->findWhere([['name', 'LIKE', '%'.$filtername.'%'], ['group', 'LIKE', $filterdivision], ['is_permission', '=', intval($filtertype)]],['*']);
        }
        return view('admin.user.users-config-index', compact('users','groups','types','filteroptions'));
    }

    public function create(){
        $groups= $this->listvalue->findWhere(['table' => 'users','field' => 'group'],['value','fulltext']);
        $types = $this->listvalue2->findWhere(['table' => 'users','field' => 'is_permission'],['value','fulltext']);
        $users = $this->user->all();
        return view('admin.user.add-user', compact('users','groups','types'));
    }
    
    // TODO Everything below this point needs to be revised, copy pasted from another site


    public function store(UserRequest $request){
        $this->user->add($request);
        return redirect('users');
    }
    
    public function edit($id){
        $this->user = new UsersRepository($this->user->find($id));
        $this->table = new UsersTableRepository($this->user->find($id));

        $user = $this->user->find($id);

        $title = 'Edit ' . $this->user->getNameById($id);
        $groups = $this->table->getGroups();
        $types = $this->table->getTypes();
        $respresenters = $this->user->getRepresenters($id);
        $data = [
            'title' => $title,
            'user' => $user,
            'groups' => $groups,
            'types' => $types,
            'representers' => $respresenters
        ];

        return view('users.edit-user')->with($data);
    }

    public function update(UserRequest $request, $id){
        $this->user->update($request, $id);
        return redirect('users');
    }

    public function delete($id){

        /// TODO never delete a user, put status to -1

        $this->user = new UsersRepository($this->user->find($id));

        $user = $this->user->find($id);
        $title = 'Delete User';

        $data = [
            'title' => $title,
            'user' => $user
        ];

        return view('users.delete-user')->with($data);
    }

    public function destroy(Request $request, $id){
        $this->user->delete($id);
        return redirect('users');
    }


}