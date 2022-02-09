@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card">
               <div class="card-header">{{ __('Dashboard') }}</div>

               <div class="card-body">
                  @if (session('status'))
                     <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                     </div>
               @endif

               {{ __('You are logged in!') }}
                     <br>
               {{ Auth::user() }}
                     <br>
                     <br>
                     <br>
               <button class="btn btn-outline-primary test-alert">Test Alert</button>
               <button class="btn btn-secondary test-toast">Test Toast</button>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
@section('foot')
<script>
   $('.test-alert').click(function () {
      Swal.fire({
         icon: 'success',
         title: 'Information has been updated successfully!',
         text: 'Congratulation!',
      })
   })

   $('.test-toast').click(function () {

   })
</script>
@stop