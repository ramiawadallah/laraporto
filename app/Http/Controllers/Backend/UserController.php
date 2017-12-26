<?php

namespace App\Http\Controllers\Backend;
use App\User;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    protected $users;
    private $uplouad_dir;

    public function __construct(User $users)
    {
        $this->middleware('rule:admin');
     

        $this->users = $users;
        $this->uplouad_dir = base_path() . '/public/uploads';
    }

    public function index()
    {
        return \Control::index('user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('admin_rule.users.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name' =>  'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'phone' =>  'required',
            'rule'=>'required',
            'gender'=>'required',
            'photo'=> 'required',
        ]);

        
        // Photo request
        if($request->hasFile('photo')){
            // get photo name
            $photo_rand = $request->file('photo')->getClientOriginalName();
            $photo = rand(0, 10000) . '_' . $photo_rand; 
            // move photo to folder
            $destination = $this->uplouad_dir;
            $request->file('photo')->move($destination, $photo);
        }else{
            $photo = Setting::find($id)->photo;
        }
        
        return \Control::store($request,'user',[
            'name'=>$request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' =>  $request->phone,
            'rule'=>$request->rule,
            'gender'=>$request->gender,
            'info'=>$request->info,
            'photo'=>$photo,
        ],cp.'users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return \Control::show('user',$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return \Control::edit('user',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' =>  'required',
            'email' => 'required|email',
            'password' => 'confirmed',
            'phone' =>  'required',
            'rule'=>'required',
            'gender'=>'required',
        ]);

        
        // Photo request
        if($request->hasFile('photo')){
            // get photo name
            $photo_rand = $request->file('photo')->getClientOriginalName();
            $photo = rand(0, 10000) . '_' . $photo_rand; 
            // move photo to folder
            $destination = $this->uplouad_dir;
            $request->file('photo')->move($destination, $photo);
        }else{
            $photo = User::find($id)->photo;
        }
        
        $data=[
            'name'=>$request->name,
            'email' => $request->email,
            'phone' =>  $request->phone,
            'rule'=>$request->rule,
            'gender'=>$request->gender,
            'info'=>$request->info,
            'photo'=>$photo,
        ];

        if($request->has('password')){
            $data['password'] =  bcrypt($request->password);
        }

        return \Control::update($request,$id,'user',$data,cp.'users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id = null)
    {
        return \Control::destroy($request,$id,'user');
    }

    public function order(Request $request)
    {
        return \Control::order($request->data,'user',0);
    }

}
