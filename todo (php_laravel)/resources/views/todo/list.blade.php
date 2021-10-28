

<table class="table caption-top table-hover mb-0">
   @if(session('destroyStatus'))
      <p class="alert alert-danger">{!! session('destroyStatus') !!}</p>
   @endif

   @if(session('updateStatus'))
      <p class="alert alert-success">{!! session('updateStatus') !!}</p>
   @endif

   <div class="d-flex justify-content-between align-items-center">
      <h3>Lists of Item</h3>
      <a href="{{route('form.create')}}" class="btn btn-sm btn-primary">Add</a>
   </div>
      <hr>
   <thead>
   <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Stock</th>
      <th scope="col">Control</th>
      <th scope="col">Date & Time</th>
   </tr>
   </thead>

   <tbody>
   @foreach(\App\Item::all() as $i)
      <tr>
         <th scope="col">{{ $i -> id }}</th>
         <td>{{ $i -> name }}</td>
         <td>{{ $i -> price }}</td>
         <td>{{ $i -> stock }}</td>
         <td>
            <a href="{{route('form.destroy', $i -> id)}}" class="btn btn-danger btn-sm">Delete</a>
            <a href="{{route('form.edit', $i -> id)}}" class="btn btn-info btn-sm">Edit</a>
         </td>
         <td>{{ $i -> created_at->diffForHumans() }}</td>
      </tr>
   @endforeach
   </tbody>
</table>
