<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use App\Classroom;	
use Validator;
use App\Students;
use App\User;
use Auth;

class ClassroomController extends Controller
{
     public function handleAddClassroom()
     {
     	$data=Input::all();
        $rules = [
          
            'title' => 'required|min:5',
            'computers' => 'required',
        ];

        $messages = [
            'title.required' => 'Votre titre est obligatoire',
            'title.min' => 'Votre titre doit dépasser 5 caractères',
          
            'computers.required' => 'Le champ computers est obligatoire'
        ];

        $validation = Validator::make($data, $rules, $messages);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors());
        }
     	//dd($data);
     	$cl=Classroom::create(['tables'=>$data['tables'],
     		'components' =>$data['components'],
     		'title'=>$data['title']


     ]);
     		dd(now()->addDays(5));

     }

     public  function  handleDeleteClassroom($id)
     {
     	//dd($id);
     	//$cl= Classroom::find($id);
     	//return $cl?$cl->delete():'error';
     	  // $cl = Classroom::find($id);
       //$delete = $cl ? $cl->delete() : null;
       //return $delete? 'true' : 'false';
       //dd($id);
     Classroom::whereId($id)->delete();
     //return back();
      //return back()->withErrors(['La suppression a été effectuée']);
     Session::flash('message', "Special message goes here");
        return back();
     //return redirect(route(''));
     	
     	 
     }
     public function showClassroom()
     {
     	$cl=Classroom::withcount('students')->get();
        if ($data = @file_get_contents("http://api.apixu.com/v1/current.json?key=fc8ed0be1ed24dcb885144051190404&q=Tunis"))
   {
       $json = json_decode($data, true);
       $icons = $json['current']['condition']['icon'];
       return view('list',['cl'=>$cl,'icons'=>$icons]);
       //$longitude = $json['longitude'];
   }



    //dd( $condition);
     	
     	
     }
     public function showForm()
     {
        //$cl=Classroom::find($id);
        //dd($cl);
        //return view('show');
        
     }
     public function showClass($id)
     {
        //dd(Classroom::find($id)->with('students')->first());
        $cl=Classroom::find($id);
        return view('show',['cl'=>$cl]);
        
     }
     public function handleUpdateClassroom($id)
     {
         $cl=Classroom::find($id);
        

        $data=Input::all();
        $cl->tables=$data['tables'];
        $cl->components=$data['components'];
        $cl->title=$data['title'];
        $cl->save();

     }
     public function handleRegister()
     {

        $data=Input::all();
        //dd(bcrypt($data['password']));
        User::create(['name'=>$data['name'], 'email'=>$data['email'], 'password'=>bcrypt($data['password'])]);





     }
     public function showUser()
     {
        return view('user');
     }
     public function handleLogin()
     {
        $data=Input::all();
        $credentials = [
           'email' => $data['email'],
           'password' => $data['password'],
       ];
       if (Auth::attempt($credentials)) {
           return Auth::user();

           //dd($user);
       } else { return 'error'; } 

     }
     public function showLogin()
     {
        return view('login');
     }

     public function logout()
     {
         Auth::logout();//se deconnecter
         return redirect(route('showLogin'));
     }
     public function showStudents($id)

     {
        $cl=Classroom::find($id);
        //dd($cl->students);
         if ($cl and $cl->students()->exists()) 
            {
                   return view('showStudents',['cl'=>$cl]);
            }
        else 
            return back()->withErrors(['etudiant innexistant']);
        

     }
     public function handleDeletStudent($id)
     {
        $s=Students::find($id);
        if(Auth::user() and $s)
        {
            Students::whereId($id)->delete();
            return back()->withErrors(['la suppression a été faite']);       
        }

        

     }
}
