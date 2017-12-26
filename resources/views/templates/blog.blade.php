
<section class="breadcrumb">
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-sm-9">
				
				<h1>{{ trans('lang.blog') }}</h1>
				
				<ol class="breadcrumb bc-3" >
					<li>
						<a href="/"><i class="fa-home"></i>{{ trans('lang.home') }}</a>
					</li>
				
					<li class="active">
						<strong>{{ trans('lang.blog') }}</strong>
					</li>
				</ol>
							
			</div>
			
			<div class="col-sm-3">
				
				<h2 class="text-muted text-right">{{ App\Post::count() }}</h2>
				
			</div>
			
		</div>
		
	</div>
	
</section>

<!-- Blog -->
<section class="blog">
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-sm-8">
				
				<div class="blog-posts">
					
					@foreach($posts as $post)
						<!-- Blog Post -->
						<div class="blog-post">
							
							<div class="post-thumb">
							
								<a href="/post/{{ $post->id }}">
									<img src="uploads/{{ $post->photo }}" class="img-rounded" />
									<span class="hover-zoom"></span>
								</a>
								
							</div>
							
							<div class="post-details">
								
								<h3>
									<a href="post/{{ $post->id }}">{{ $post->trans('title') }}</a>
								</h3>
								
								<div class="post-meta">
									
									<div class="meta-info">
										<i class="entypo-calendar"></i> 
										{{ date('F j, Y', strtotime($post->created_at)) }}  
									</div>
									
									<div class="meta-info">
										<i class="entypo-comment"></i>
										{{ $post->author->name }}
									</div>
									
								</div>
								
								{!! $post->content !!}
								
							</div>
							
						</div>
					@endforeach
					
					<!-- Blog Pagination -->
					<div class="text-center">
						{{  $posts->links() }}
					</div>
					
				</div>
				
			</div>
			
			<div class="col-sm-4">
				
				<!-- List Sidebar -->
				<div class="sidebar">
					
					<h3>
						<i class="entypo-list"></i>
						{{ trans('lang.categories') }}
					</h3>
					
					
					<div class="sidebar-content">
						<ul>
							@foreach($categories as $category)
								<li>
									<a href="category/{{ $category->id }}">{{ $category->title }}</a>
								</li>
							@endforeach()
						</ul>
						
					</div>
					
				</div>

				<!-- Comments Sidebar -->
				
			</div>
		</div>
	</div>
</section>


