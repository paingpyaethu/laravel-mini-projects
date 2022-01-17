@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				@component('component.breadcrumb')
					<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Article List</li>
				@endcomponent
				<div class="card">
					<div class="card-header">
						<h4 class="mb-0 py-3">Article List</h4>
					</div>

					<div class="card-body">
						@if(session('status'))
							<p class="alert alert-danger">
								{!! session('status') !!}
							</p>
						@endif
						@if(session('updateStatus'))
							<p class="alert alert-success">
								{!! session('updateStatus') !!}
							</p>
						@endif
						<div class="d-flex justify-content-between align-items-center">
							<div class="">
								{{--For Paginate--}}
								{{$articles -> appends(Request::all()) -> links()}}
							</div>
							<div class="">
								<form action="{{ route('article.search') }}" method="get">
									<div class="form-inline mb-3">
										<input type="text" class="form-control mr-2" name="search">
										<button class="btn btn-primary">Search</button>
									</div>
								</form>
							</div>
						</div>
						<table class="table table-bordered table-striped table-responsive">
							<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Description</th>
								<th>Owner</th>
								<th>Control</th>
								<th>Created_At</th>
							</tr>
							</thead>
							<tbody>
							@inject("users","App\User")
							@foreach($articles as $article)
								<tr>
									<td>{{$article->id}}</td>
									<td class="text-nowrap">{{substr($article->title,0,20)}}.....</td>
									<td>{{substr($article->description,0,80)}}...</td>
									<td class="text-nowrap">{{$users->find($article->user_id)->name}}</td>
									<td class="text-nowrap">
										<a href="{{ route('article.show', $article->id) }}" class="btn btn-primary">Detail</a>
										<a href="{{ route('article.edit', $article->id) }}" class="btn btn-warning">Edit</a>
										<button type="submit" form="del" class="btn btn-danger">Delete</button>
										<form action="{{ route('article.destroy', $article->id) }}" id="del" method="post">
											@csrf
											@method('delete')
										</form>
									</td>
									<td class="text-nowrap">

											{{$article->created_at ->format('d M Y')}}
											<br>
											{{$article->created_at -> format('h:i a')}}

									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection