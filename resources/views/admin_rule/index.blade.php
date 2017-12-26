@extends('layouts.admin')
@section('title') {{ trans('lang.dashbord') }}  @endsection
@section('content')
	<!-- Profile Info and Notifications -->
		<hr/>	

		<div class="row">
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-red">
					<div class="icon"><i class="entypo-users"></i></div>
					<div class="num" data-start="0" data-end="{{ App\User::count() }}" data-postfix="" data-duration="1500" data-delay="0">0</div>
		
					<h3>Registered users</h3>
					<p>website.</p>
				</div>
		
			</div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-green">
					<div class="icon"><i class="entypo-doc-text"></i></div>
					<div class="num" data-start="0" data-end="" data-postfix="" data-duration="1500" data-delay="600">0</div>
		
					<h3>Post</h3>
					<p>this is the post number</p>
				</div>
		
			</div>
			
			<div class="clear visible-xs"></div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-aqua">
					<div class="icon"><i class="entypo-home"></i></div>
					<div class="num" data-start="0" data-end="" data-postfix="" data-duration="1500" data-delay="1200">0</div>
		
					<h3>Page</h3>
					<p>this is the page number</p>
				</div>
		
			</div>
		
			<div class="col-sm-3 col-xs-6">
		
				<div class="tile-stats tile-blue">
					<div class="icon"><i class="entypo-rss"></i></div>
					<div class="num" data-start="0" data-end="52" data-postfix="" data-duration="1500" data-delay="1800">0</div>
		
					<h3>Subscribers</h3>
					<p>on our site right now.</p>
				</div>
		
			</div>
		</div>

		<hr/>

		<div class="col-xs-12">
			<h3>Online Users!</h3>
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Online</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
						<tr>
							<td>{{ $user->name }} </td>
							<td>{{ $user->email }} </td>
							<td>@if($user->isOnline())<i class="entypo-users ico"> online </i>@else <i class="entypo-users"></i> Offline @endif() </td>
						</tr>	
					@endforeach()
				</tbody>
			</table>
			{{ $users->links('layouts.pagination.pag') }}
		</div>

@endsection()