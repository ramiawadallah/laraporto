<?php 

$lang = app()->getLocale();

?>

@foreach( App\Page::all()->where('save_page',1) as $page)

     <li  class="{{ Request::is($page->uri_wildcard) ? 'active' : '' }} {{ count($page->children) ? ($page->isChild()) : '' }}">

		<a href="{{ url($page->uri) }}">
			<span>{{ $page->trans('title',$lang) }} </span>
		</a>

		@if(count($page->children))
                <span class="{{ $page->isChild() ? 'right' : '' }}"></span>
        @endif

		@if(count($page->children))
            <ul class="dropdown-menu">
                @include('partials.navigation', ['pages' => $page->children])
            </ul>
        @endif
	</li>

@endforeach