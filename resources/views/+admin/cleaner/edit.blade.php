@extends('+admin.layouts.app')

@section('content')
   <div class="container">

      <h1>Edit Cleaner {{ $cleaner->id }}</h1>

      {!! Form::model($cleaner, [
          'method' => 'PATCH',
          'url' => ['/admin/cleaner', $cleaner->id],
          'class' => 'form-horizontal',
          'files' => true
      ]) !!}

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
      <div class="form-group {{ $errors->has('quality_score') ? 'has-error' : ''}}">
         {!! Form::label('quality_score', 'Quality Score', ['class' => 'col-sm-3 control-label']) !!}
         <div class="col-sm-6">
            {!! Form::number('quality_score', null, ['class' => 'form-control']) !!}
            {!! $errors->first('quality_score', '<p class="help-block">:message</p>') !!}
         </div>
      </div>
      <div class="form-group">
         {!! Form::label('cities', 'Cities', ['class' => 'col-sm-3 control-label']) !!}
         <div class="col-sm-6">
            @foreach(\App\City::all() as $city)
               <label class="checkbox marginleft20">{!! Form::checkbox('cities[]', $city->id, $cleaner->cities->contains($city)) !!} {{ $city->name }}</label>
            @endforeach
         </div>
      </div>


      <div class="form-group">
         <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
         </div>
      </div>
      {!! Form::close() !!}

      @if ($errors->any())
         <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
         </ul>
      @endif

   </div>
@endsection