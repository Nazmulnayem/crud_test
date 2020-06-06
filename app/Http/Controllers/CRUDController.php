<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;
use App\CRUD;

class CRUDController extends Controller
{

public function index(){
    $users = CRUD::all();
    return view('CRUD.Master',['users'=>$users]);

}
    public function userinfoSave(Request $request) {

        $file=$request->file('file_name');
        $name = $file->getClientOriginalName();
        $uploadPath='uploadpath/';
        $file->move($uploadPath,$name);
        $fileUrl=$uploadPath.$name;
        $this->saveFileInfo($request, $fileUrl);
        return redirect('/')->with('message','Info save successfully');
    }


    protected function saveFileInfo($request, $fileUrl) {
        $data = new CRUD();

        $data->email=  $request->email;
        $data->password = Hash::make($request->password);
        $data->file_name = $fileUrl;

        $data->save();
    }


    public function deleteuser($id){

         $user = CRUD::find($id);
         $user->delete();
        return redirect()->route('welcome');
  }
    public function edituser($id){

        $userinfosByID =CRUD::where('id',$id)->first();

        return view('CRUD.editUser',['userinfosByID'=>$userinfosByID]);
    }




    public function updateuser(Request $request){

        $user =CRUD::find($request->id);
        $file_name=$request->file('file_name');
        if($file_name){
            unlink($user->file_name);
            $name = $file_name->getClientOriginalName();
            $uploadPath = 'uploadpath/';
            $file_name->move($uploadPath, $name);
            $fileUrl = $uploadPath.$name;

        }
        else{

            $fileUrl = $user->file_name;
        }


        $user->email=  $request->email;
        $user->password = Hash::make($request->password);
        $user->file_name = $fileUrl;
        $user->save();
        return redirect('/')->with('message','Info Update successfully');

       }









}
