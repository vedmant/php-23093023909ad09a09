@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row">
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               <div class="panel-heading">Successfully booked!</div>

               <div class="panel-body">

                  <p>You have successfully booked a cleaning!</p>

                  <p>Your booking reference is #{{ $booking->id }}</p>
                  <p>Your cleaner is {{ $booking->cleaner->full_name }}</p>
                  <p>Your date is {{ $booking->date }}</p>

                  <p>Thank you for using our service!</p>

               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
