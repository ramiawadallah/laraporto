<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Setting;
use Auth;

class SettingsController extends Controller
{
    protected $sttings;
    private $uplouad_dir;

    public function __construct(Setting $settings){
        //$this->middleware('auth');
        
        $this->middleware('rule:admin');
        $this->settings = $settings;
        $this->uplouad_dir = base_path() . '/public/uploads';
    }
    
    public function index()
    {
        $id = 1;
        $settings = Setting::find($id);
        //return view('admin/setting/edit', compact('settings'));
        return view(user('rule').'_rule.settings.index',compact('settings'));
    }

   public function update(Request $request){
    
        $this->validate($request,[
            'translate'             => [
                'title'             =>  ['required', 'min:3'],
                'subtitle'          =>  ['required', 'min:3'],
                'copyright'         =>  ['required', 'min:3'],
                'address'           =>  ['required', 'min:3'],
            ],
                'email'             =>  ['required', 'min:3'],
                'phone'             =>  ['required', 'min:3'],
                'fax'               =>  ['required', 'min:3'],
                'pobox'             =>  ['required', 'min:3'],
                'map'               =>  ['required', 'min:3'],
                //'photo'             => ['required'],
                'facebook'          =>  ['required', 'min:3'],
                'twitter'           =>  ['required', 'min:3'],
                'instagram'         =>  ['required', 'min:3'],
                'linkedin'          =>  ['required', 'min:3'],   
                'youtube'           =>  ['required', 'min:3'],
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
            $id = 1;
            $photo = Setting::find($id)->photo;
        }

        if(empty($request->maintenance)){
            $request->maintenance = 'open';
        }

        return \Control::update($request,1,'setting',[
        'email' => $request->email,
        'phone' => $request->phone,
        'maintenance' => $request->maintenance,
        'fax' => $request->fax,
        'pobox' => $request->pobox,
        'map' => $request->map,
        'keywords' => $request->keywords,
        'facebook' => $request->facebook,
        'twitter' => $request->twitter,
        'linkedin' => $request->linkedin,
        'youtube' => $request->youtube,
        'instagram' => $request->instagram,
        //'copyright' => $request->copyright,
        //'address' => $request->address,
        'photo' => $photo,
        'translate'=>['title','subtitle','desc','copyright','address'],
        ] );

        session()->flash('success',trans('lang.system_updated'));
            
        }

        public function lang($lang)
    {
        $lang = \App\Lang::where('code',$lang);
        $default = \App\Lang::where('default',1);
        if ($lang->exists()) 
        {
            $local = $lang->first()->code;
        }else{
            if ($default->exists()) {
                # code...
                $local = $default->first()->code;
            }else{
                
                $local = 'ar';
            }
        }
           \Cookie::queue(\Cookie::make('locale', $local, 43200));
        return back();
    }

    public function maintenance()
    {
        if (site('maintenance') == 'open') 
        {
           return redirect('/');
        }else{
            
            return view('Helper::maintenance');
        }
    }
}
