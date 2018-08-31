@extends('layouts.app')

@section('content')
    <form data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="/roles/store">
    {{ csrf_field() }}
  <div class="row"> 
  @include('partials.messages.errors')
  @include('partials.messages.success')

      <div class="col-md-8">
               <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <a href="/roles/" class="pull-right btn btn-default"> Back </a>
                   <a href="/roles/create/" class="pull-right btn btn-default"> Add a new role  </a>
                  <div class="x_title">
                    <h2> Create a New Role </h2>
                              
                    <div class="clearfix"></div>
                    </div>

                  <div class="x_content">
                    <br>

                          <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Role Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name"  
                                    name="name" class="form-control col-md-7 col-xs-12" 
                                    value="{{ old('name') }}" 
                                    required autofocus>
                              @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>


                  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="display_name">Role Disspaly  Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="display_name"  
                                    name="display_name" class="form-control col-md-7 col-xs-12" 
                                    value="{{ old('display_name') }}" 
                                    required autofocus>
                              @if ($errors->has('display_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('display_name') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>


                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description"> Description<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <textarea class="resizable_textarea form-control" 
                                          placeholder="" 
                                          style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 100px;" 
                                          name="description">
                                          {{old('description')}}
                          </textarea>
                              @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
      </div> 

      <div class="col-md-4"> 
          <div class="panel panel-default">

              <div class="panel-heading">
                    <div class="panel-title"> <h4> Attach Permission(s) </h4></div>
              </div>

              <div class="panel-body"> 
                       @if( $permissions->count() )
                                            @foreach ( $permissions as $permission )
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value=" {{ $permission->id}}" name="permissions[]">
                                                             {{ $permission->display_name }}
                                                     </label>
                                                </div>
                                            @endforeach
                   
                    @else 
                    <p> No Permissions found </p>
                 @endif

                   @if ($errors->has('permissions'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('permissions') }}</strong>
                                    </span>
                                @endif

              </div>

          </div><!-- panel -->
      </div> <!-- md-4 -->

  </div>
   </form>

@endsection
