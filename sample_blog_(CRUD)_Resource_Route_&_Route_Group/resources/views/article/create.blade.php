@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				@component('component.breadcrumb')
							<li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
							<li class="breadcrumb-item"><a href="{{route('article.index')}}">Article List</a></li>
							<li class="breadcrumb-item active" aria-current="page">Add Article</li>
				@endcomponent
				<div class="card">
					<div class="card-header">
						<h4 class="mb-0 py-3">Add Article</h4>
					</div>

					<div class="card-body">
						@if(session('status'))
							<p class="alert alert-success">
								{!! session('status') !!}
							</p>
						@endif
						<form action="{{route('article.store')}}" method="post">
							@csrf
							<div class="form-group">
								<label for="title">Article Title</label>
								<input type="text" name="title" id="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror">
								@error("title")
									<small class="font-weight-bold text-danger">{{$message}}</small>
								@enderror
							</div>
							<div class="form-group">
								<label for="description">Description</label>
								<textarea name="description" id="description" rows="10" class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>
								@error("description")
								<small class="font-weight-bold text-danger">{{$message}}</small>
								@enderror
							</div>
							<button class="btn btn-primary">Save Article</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection