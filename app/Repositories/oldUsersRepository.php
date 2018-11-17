<?php

namespace App\SO\Users;

use App\SO\Models\User;
use App\SO\Users\UsersInterface;
use App\SO\Helpers\Requests\UserRequest;
use App\SO\Models\Role as Role;

class UsersRepository implements UsersInterface {
    
    protected $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function all(){
        return $this->user->all();
    }

    /**
     * Returns a user found by it's _id or Fails if not found
     */
    public function find($id){
        return $this->user->findOrFail($id);
    }

    public function add(UserRequest $request){

        $request->validate();
        
        $this->user->user_id = $request->userId;
        $this->fillCommonFields($request);
        $this->user->save();
        $this->attachRoles($request);
    }

    /**
     * Receives a request, validates the request, and then it runs a logic to know how to update the user
     */
    public function update(UserRequest $request, $id){
        $request->validate();

        $userToUpdate = $this->find($id);

        // If permissions where edited for the user, change roles here
        $isAssign = ($request->isAssign == 'yes') ? 1 : 0;
        $isDelegate = ($request->isDelegate == 'yes') ? 1 : 0;
        $isRepresent = ($request->isRepresent == 'yes') ? 1 : 0;

        if($userToUpdate->user_assign_right != $isAssign){
            $isAssign == 1 ? $userToUpdate->roles()->attach(Role::where('name', 'Assign')->first()) : $userToUpdate->roles()->detach(Role::where('name', 'Assign')->first());
        }
        if($userToUpdate->user_delegate_right != $isDelegate){
            $isDelegate == 1 ? $userToUpdate->roles()->attach(Role::where('name', 'Delegate')->first()) : $userToUpdate->roles()->detach(Role::where('name', 'Delegate')->first());
        }
        if($userToUpdate->user_represent_right != $isRepresent){
            $isRepresent == 1 ? $userToUpdate->roles()->attach(Role::where('name', 'Represent')->first()) : $userToUpdate->roles()->detach(Role::where('name', 'Represent')->first());
        }

        if($userToUpdate->user_type != $request->userType){
            $userToUpdate->roles()->detach(Role::where('name', $userToUpdate->user_type)->first());
            $userToUpdate->roles()->attach(Role::where('name', $request->userType)->first());
        }

        $this->fillCommonFields($request);
        $userToUpdate->save();
    }

    /**
     * Deletes the user
     */
    public function delete($id){
        $userToDelete = $this->find($id);
        $userToDelete->delete();
    }

    /**
     * Returns name by it's user _id
     */
    public function getNameById($id){
        return $this->user->select('user_full_name')->where('_id', $id)->first();
    }

    /**
     * Returns user _id by the user user_id
     */
    public function getIdByWindowsId($w_id){
        return $this->user->select('_id')->where('user_id', $w_id)->first();
    }

    /**
     * When you save and udate this fields will be added to the table, this function is here to help not writing the code twice
     */
    public function fillCommonFields(UserRequest $request){
        $this->user->user_full_name = $request->userFullName;
        $this->user->user_group = $request->userGroup;
        $this->user->user_type = $request->userType;
        $this->user->user_email = $request->userEmail;
        $this->user->user_Lotus_solution = $request->userLotus;
        $this->user->user_assign_right = ($request->isAssign == 'yes') ? 1 : 0;
        $this->user->user_delegate_right = ($request->isDelegate == 'yes') ? 1 : 0;
        $this->user->user_represent_right = ($request->isRepresent == 'yes') ? 1 : 0;
        if($request->isRepresent == 'yes') $this->user->user_represented_id = $request->userRepresented;
    }

    public function attachRoles(UserRequest $request){
        if($request->isAssign == 'yes') $this->user->roles()->attach(Role::where('name', 'Assign')->first());
        if($request->isDelegate == 'yes') $this->user->roles()->attach(Role::where('name', 'Delegate')->first());
        if($request->isRepresent == 'yes') $this->user->roles()->attach(Role::where('name', 'Represent')->first());
        $this->user->roles()->attach(Role::where('name', $request->userType)->first());
    }

    /**
     * Returns users who can act as representers for the user being created
     */
    public function getRepresenters($id){
        return $this->user->select(['user_full_name', 'user_id'])->where('_id', '!=', $id)->get();
    }

    /**
     * Returns an array of user who can be responsible (have the rights to delegate a project)
     */
    public function responsibles(){
        $where = [
            ['user_delegate_right', 1],
            ['_id', '!=', $this->user->_id]
        ];
        return $this->user->select('user_full_name', '_id')->where($where)->get();
    }

}