@extends('+admin.layouts.app')

@section('content')
   <div class="container">

      <h1>Create New City</h1>
      <hr/>

      {!! Form::open(['url' => '/admin/city', 'class' => 'form-horizontal', 'files' => true]) !!}

      <div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
         {!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
         <div class="col-sm-6">
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
         </div>
      </div>

      <div class="form-group">
         <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
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
@endsection