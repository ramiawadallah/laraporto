<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Page;
use App\Setting;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Baum\MoveNotPossibleException;
use Auth;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $pages;
    protected $settings;
    private   $uplouad_dir;

    public function __construct(page $pages, setting $settings)
    {

        $this->middleware('rule:admin');

        $this->pages = $pages;
        $this->settings = $settings;
        $this->uplouad_dir = base_path() . '/public/uploads';

    }

    public function index()
    {
        return \Control::index('page');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$page = $this->pages->findOrFail($id);
        $templates = $this->getPageTemplate();
        $orderPages = $this->pages->all();
        return view(user('rule').'_rule.pages.create',compact('page','orderPages', 'templates'));
        //return \Control::create('page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {

        $name = 'page';
        $redirect = 'admin/pages';
        $calback = null;

        $this->validate($request,[
            'translate' => [
                'title' => 'required',
                'content' => 'required',
            ],
            'uri' => 'required',
            'order' => 'required',
            'orderPage' => 'required',
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
            $photo = null;
        }

        // get data from form
        $data = [
            'translate'     => ['title','content'],
            'uri'           => $request['uri'],
            'name'          => $request['name'],
            'template'      => $request['template'],
            'save_page'      => $request['save_page'],
            'updated_by'    => Auth::user()->name,
            'photo'         => $photo,
        ];

        $model = '\App\\'.ucfirst(str_singular(camel_case($name)));
       if (isset($data['translate'])) 
       {
          foreach ($data['translate'] as $k => $field) 
          {
              foreach (\App\Lang::all() as $lang) 
              {
                  if (is_string($k)) 
                  {
                    $data['lang'][$k.'-'.$lang->id] = $field;
                  }elseif(is_numeric($k))
                  {
                    $transField = $field.$lang->id;
                    $data['lang'][$field.'-'.$lang->id] = $request->{$transField};
                  }
              }
          }
       }

       $create = new $model;
            $currentLang = \App\Lang::where('code',app()->getLocale())->first();
            if (isset($data['translate'])) 
            {
              foreach ($data['translate'] as $k => $trans) 
              {
                if (is_string($k)) 
                {
                  $data[$k] = $trans;
                }elseif(is_numeric($k))
                {
                  $data[$trans] = $request->{$trans.$currentLang->id};
                }
              }
            }           
           foreach (array_except($data, ['translate','lang','files']) as $key => $value) 
           {
              $create->{$key} = $value;
           }
        
        $page = $this->pages->create($data);
        $this->updatePageOrder($page, $request);

        //$create; 
        if (isset($data['lang'])) 
          {
             foreach ($data['lang'] as $key => $value) 
             {
              $colum = explode('-', $key)[0];
              $lang = explode('-', $key)[1];
              updateLang($lang,$name,$page->id,$colum,$value); 
             }
          }

        $id = $model::all()->last()->id;

        
        if (isset($data['files'])) 
        {
            \Files::upload($request,$name,$id,$data['files']);
        }
        

        session()->flash('success',trans('lang.added',['var'=>trans('lang.'.$name)]));
        if (is_callable($calback)) 
        {
           call_user_func_array($calback,[$request,$id]);
        }

        if (is_null($redirect)) 
        {
            return back();
        }else
        {
            return redirect($redirect);
        }
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return \Control::show('page',$id);
    }

    public function showpage(Page $page, array $parmaeters){
        //$this->prepaerTemplate($page, $parmaeters);
        //return view('page', compact('page'));
        return \Control::show('page',$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    public function edit($id)
    {
        $page = $this->pages->findOrFail($id);
        $templates = $this->getPageTemplate();
        $orderPages = $this->pages->all();
        return view(user('rule').'_rule.pages.edit',compact('page','orderPages', 'templates'));
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

        $name = 'page';
        $redirect = 'admin/pages';
        $calback = null;

        $page = $this->pages->findOrFail($id);

        if(!$request->has('order', 'orderPage')){

          if ($response = $this->updatePageOrder($page, $request)) {
              return $response;
          } 

        }
        

        $this->validate($request,[
            'translate' => [
                'title' => 'required',
                'content' => 'required',
            ],
            'uri' => 'required',
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
            $photo = Page::find($id)->photo;
        }

        // get data from form
        $data = [
            'translate'     => ['title','content'],
            'uri'           => $request['uri'],
            'name'          => $request['name'],
            'template'      => $request['template'],
            'save_page'      => $request['save_page'],
            'updated_by'    => Auth::user()->name,
            'photo'         => $photo,
        ];

      if (isset($data['translate'])) 
       {
          foreach ($data['translate'] as $k => $field) 
          {
              foreach (\App\Lang::all() as $lang) 
              {
                  if (is_string($k)) 
                  {
                    $data['lang'][$k.'-'.$lang->id] = $field;
                  }elseif(is_numeric($k))
                  {
                    $transField = $field.$lang->id;
                    $data['lang'][$field.'-'.$lang->id] = $request->{$transField};
                  }
              }
          }
       }



       $model = '\App\\'.ucfirst(str_singular(camel_case($name)));
       $create = $model::find($id);
            $currentLang = \App\Lang::where('code',app()->getLocale())->first();
            if (isset($data['translate'])) 
            {
              foreach ($data['translate'] as $k => $trans) 
              {
                if (is_string($k)) 
                {
                  $data[$k] = $trans;
                }elseif(is_numeric($k))
                {
                  $data[$trans] = $request->{$trans.$currentLang->id};
                }
              }
            }
           foreach (array_except($data, ['translate','lang','files']) as $key => $value) 
           {
              $create->{$key} = $value;
           }
       $create->save();
       if (isset($data['lang'])) 
          {
             foreach ($data['lang'] as $key => $value) 
             {
              $colum = explode('-', $key)[0];
              $lang = explode('-', $key)[1];
              updateLang($lang,$name,$create->id,$colum,$value); 
             }
          }
        session()->flash('success',trans('lang.updated',['var'=>trans('lang.'.$name)]));
       if (is_callable($calback)) 
        {
           call_user_func_array($calback,[$request,$id]);
        }
        if (isset($data['files'])) 
        {
          
          \Files::update($request,$name,$id,$data['files']);
          
        }


        if (is_null($redirect)) 
        {
            return back();
        }else
        {
            return redirect($redirect);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id = null)
    {
        $page = $this->pages->findOrFail($id);
        foreach ($page->children as $child) {
            $child->makeRoot();
        }
        return \Control::destroy($request,$id,'page');
    }


    public function order(Request $request)
    {
        return \Control::order($request->data,'page',0);
    }

    protected function updatePageOrder(Page $page, Request $request){
        if ($request->has('order', 'orderPage')) {
            try {
                $page->updateOrder($request->input('order'), $request->input('orderPage'));
            } catch (MoveNotPossibleException $e) {
                return redirect(route('admin.pages.edit', $page->id))->with('success', trans('lang.cannot_make_page_child'));
            }
        }
    }

    protected function getPageTemplate(){
        $templates = config('cms.templates');
        return ['' => 'None'] + array_combine(array_keys($templates), array_keys($templates));
    }

    public function prepaerTemplate(Page $page, array $parmaeters){
        $templates = config('cms.templates');

        if (! $page->template || ! isset($templates[$page->template])) {
            return;
        }
        $template = app($templates[$page->template]);
        $view = sprintf('templates.%s', $template->getView());
        if (! view()->exists($view)) {
            return;
        }
        $template->prepare($view = view($view), $parmaeters);
        $page->view = $view;
    }

}
