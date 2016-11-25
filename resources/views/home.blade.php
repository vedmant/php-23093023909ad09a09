@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row">
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               <div class="panel-heading">Book a cleaning</div>

               <div class="panel-body">

                  {!! Form::open(['url' => '/book', 'class' => 'form-horizontal', 'files' => true]) !!}

                  <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                     {!! Form::label('city', 'City', ['class' => 'col-sm-3 control-label']) !!}
                     <div class="col-sm-6">
                        {!! Form::select('city', \App\City::all()->pluck('name', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Select your City']) !!}
                        {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                     </div>
                  </div>
                  <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
                     {!! Form::label('first_name', 'First Name', ['class' => 'col-sm-3 control-label']) !!}
                     <div class="col-sm-6">
                        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
                     </div>
                  </div>
                  <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
                     {!! Form::label('last_name', 'Last Name', ['class' => 'col-sm-3 control-label']) !!}
                     <div class="col-sm-6">
                        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                     </div>
                  </div>
                  <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : ''}}">
                     {!! Form::label('phone_number', 'Phone Number', ['class' => 'col-sm-3 control-label']) !!}
                     <div class="col-sm-6">
                        {!! Form::text('phone_number', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('phone_number', '<p class="help-block">:message</p>') !!}
                     </div>
                  </div>
                  <div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
                     {!! Form::label('date', 'Date', ['class' => 'col-sm-3 control-label']) !!}
                     <div class="col-sm-6">
                        {!! Form::date('date', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
                     </div>
                  </div>
                  <div class="form-group {{ $errors->has('time') ? 'has-error' : ''}}">
                     {!! Form::label('time', 'Time', ['class' => 'col-sm-3 control-label']) !!}
                     <div class="col-sm-6">
                        {!! Form::time('time', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('time', '<p class="help-block">:message</p>') !!}
                     </div>
                  </div>
                  <div class="form-group {{ $errors->has('hours') ? 'has-error' : ''}}">
                     {!! Form::label('hours', 'Hours', ['class' => 'col-sm-3 control-label']) !!}
                     <div class="col-sm-6">
                        {!! Form::select('hours', range(1, 5), null, ['class' => 'form-control', 'placeholder' => 'Select hours count']) !!}
                        {!! $errors->first('hours', '<p class="help-block">:message</p>') !!}
                     </div>
                  </div>

                  <div class="form-group">
                     <div class="col-sm-offset-3 col-sm-3">
                        {!! Form::submit('Book', ['class' => 'btn btn-primary form-control']) !!}
                     </div>
                  </div>
                  {!! Form::close() !!}

                  @if ($errors->any())
                     <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                           <p>{{ $error }}</p>
                        @endforeach
                     </div>
                  @endif

               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
