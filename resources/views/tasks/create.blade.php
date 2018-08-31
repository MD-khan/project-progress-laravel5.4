@extends('layouts.app')


@section('css')
<style>
  .completed { text-decoration: line-through; }
</style>
@stop

@section('content')
<div class="x_panel"> 
          <div class="x_title">
                  <div class="col-sm-6 col-md-6 col-xs-12">  
                          <h2>  Task for <span class="label"> {{ $user->first_name }} {{ $user->last_name }}</span></h2> 
                    </div>
                  <div class="col-sm-6 col-md-6 col-xs-12">  
                        <a href="/projects/{{$project->id}}/show" class="pull-right btn btn-primary"> 
                              Back
                          </a>
                          <h2>  Project: {{ $project->name }}</h2> 
                    </div>
                        <div class="clearfix"></div>
                </div>

</div>


<div class="row"> 
@include('partials.messages.errors')
              @include('partials.messages.success')

          <div class="col-md-7 col-sm-7 col-xs-12"> 
                <div class="x_panel">
                      <div class="x_title">
                          <h2> Add  New Task </h2>
                              
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content"> 
                      <form 
                                    action="/users/{{$user->id}}/projects/{{$project->id}}/tasks"  
                                    class="form-horizontal form-label-left" 
                                    novalidate="" method="POST" action="" >
                          {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Task  Name 
                                      <span class="required">*</span>
                                </label>
                             <div class="col-md-9 col-sm-9 col-xs-12">
                                          <input type="text" id="name"  class="form-control col-md-7 col-xs-12" 
                                                value="{{ old('name') }}"  name="name">

                                        @if ($errors->has('name'))
                                              <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                          @endif
                               </div>
                      </div>

                      <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description"> Description
                                </label>
                             <div class="col-md-9 col-sm-9 col-xs-12">
                                          <textarea class="form-control" name="description"></textarea>
                                        @if ($errors->has('name'))
                                              <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                          @endif
                               </div>
                      </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-block btn-success">Submit</button>
                        </div>
                      </div>

                      </form>
                    </div>

                </div>

           </div>

          <div class="col-md-5 col-sm-5 col-xs-12">  
                  <div class="x_panel">
                      <div class="x_title">
                          <h2>  Tasks </h2>
                              
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content"> 
                       <div class="">
                          <ul class="to_do">
                            @foreach ( $tasks as $task )
                              <form  action="/users/{{$user->id}}/projects/{{$project->id}}/tasks/{{$task->id}}" method="POST">
                                <li class="{{ $task->isComplete() ? "completed" : ""}} ">
                                <input type="checkbox" class="task" 
                                            name="task_value"  
                                            value="{{ $task->complete}}" 
                                            
                                            {{ $task->isComplete() ? "checked" : ""}}
                                            class="flat"  onChange="this.form.submit()""> 
                         {{ $task->name }} 
                          </li>
                          {{ method_field('PATCH') }}
                          {{ csrf_field() }}
                          </form>
                          @endforeach
                        </ul>
                    </div>
                    </div>

                 </div>
          </div>
       
    </div>
    
@endsection


@section('js')
<script>
  
</script>

@stop
