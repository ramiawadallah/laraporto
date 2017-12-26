<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;
use App\Lang;

class PagesController extends Controller
{

    public function show(Page $page, Lang $lang, array $parmaeters){
        $this->prepaerTemplate($page, $parmaeters);
        return view('page', compact('page','lang'));
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
