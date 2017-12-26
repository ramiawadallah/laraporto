<?php 

namespace App\Template;

use Illuminate\View\View;
use App\Post;
use App\Category;
use Carbon\Carbon;
use DB;


class BlogTemplate extends AbstractTemplate{

	protected $view = 'blog';

	protected $posts;
	protected $categories;

	public function __construct(Post $posts, Category $categories){
		$this->posts = $posts;
		$this->categories = $categories;
		
	}

	public function prepare(View $view, array $parameters){
		$posts = $this->posts->where('save_post',1)->orderBy('id', 'desc')->paginate(6);
		$categories= $this->categories->all();
		$view->with(compact('posts', $posts, 'categories', $categories));
	}

}