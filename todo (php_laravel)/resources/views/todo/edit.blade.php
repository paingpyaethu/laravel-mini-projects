<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Form</title>
   <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
</head>
<body>

<div class="container-fluid">
   <div class="row">
      <div class="col-12">
         <div class="container">
            <div class="row">
               <div class="col-12 col-md-6">
                  <div class="card my-5">
                     <div class="card-body">
                        <h3>Update Item Info</h3>
                        <hr>
                        <form action="{{route('form.update',$currentItem->id)}}" method="post">
                           @csrf
                           <div class="mb-3">
                              <label for="" class="form-label">Item Name</label>
                              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="" value="{{ $currentItem->name }}">
                              @error('name')
                              <small class="text-danger fw-bold">{{$message}}</small>
                              @enderror
                           </div>

                           <div class="row">
                              <div class="col">
                                 <label for="" class="form-label">Price ( MMK )</label>
                                 <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$currentItem->price}}">
                                 @error('price')
                                 <small class="text-danger fw-bold">{{$message}}</small>
                                 @enderror
                              </div>
                              <div class="col">
                                 <label for="" class="form-label">Stock ( Piece )</label>
                                 <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{$currentItem->stock}}">
                                 @error('stock')
                                 <small class="text-danger fw-bold">{{$message}}</small>
                                 @enderror
                              </div>
                           </div>
                           <hr>
                           <button class="btn btn-primary">Update Item</button>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="col-12">
                  <div class="card">
                     <div class="card-body">
                        @include('todo.list')
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</body>
</html>
