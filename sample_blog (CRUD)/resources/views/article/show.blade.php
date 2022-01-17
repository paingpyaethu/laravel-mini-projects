@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				@component('component.breadcrumb')
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0">
							<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
							<li class="breadcrumb-item"><a href="{{route('article.index')}}">Article List</a></li>
							<li class="breadcrumb-item active" aria-current="page">Detail</li>
						</ol>
					</nav>
				@endcomponent
				<div class="card">
					<div class="card-header">
						<h4 class="mb-0 py-3">Detail</h4>
					</div>
					@inject("users","App\User")
					<div class="card-body">
						<h4>{{$article -> title}}</h4>
						<div class="mb-3">
								<i class="feather-user text-primary"></i>
								{{$users->find($article->user_id)->name}}

								<i class="feather-calendar text-danger"></i>
								{{$article->created_at->format('j M Y')}}
						</div>

						<p>{{$article -> description}}</p>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection