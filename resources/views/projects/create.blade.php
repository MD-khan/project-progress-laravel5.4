@extends('layouts.app')

@section('css')
<link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
@endsection

@section('content')
  <div class="row">
       <div class="col-md-12 col-sm-12 col-xs-12">
             <div class="x_panel">
              @include('partials.messages.errors')
              @include('partials.messages.success')

               <div class="x_title">
                    <h2> Create a new Project  <small>different form elements</small></h2>
                    <div class="clearfix"></div>
                  </div>


                  <div class="x_content">
                    <br />

                    <form  data-parsley-validate class="form-horizontal form-label-left" method="POST" action="/projects/store">
                      {{ csrf_field() }}

                      <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Project  Name 
                                      <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="name"  class="form-control col-md-7 col-xs-12" 
                                                value="{{ old('name') }}"  name="name">

                              @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                               </div>
                      </div>

                      <div class="form-group {{ $errors->has('category') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Project  Category 
                                      <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control select2_single" name="category"> 
                                      @foreach ( $categories as $category )
                                    <option value="{{$category->id}}"> {{ $category->name }} </option>
                                      @endforeach
                                </select>

                              @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                               </div>
                      </div>


                      <div class="form-group {{ $errors->has('deal_price') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="deal_price">  Project Deal Price 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="deal_price"  class="form-control col-md-7 col-xs-12" 
                                                value="{{ old('deal_price') }}"  name="deal_price">

                              @if ($errors->has('deal_price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deal_price') }}</strong>
                                    </span>
                                @endif
                               </div>
                      </div>

                      <div class="form-group {{ $errors->has('planing_cost') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="planing_cost">  Project Plan Cost
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="planing_cost"  class="form-control col-md-7 col-xs-12" 
                                                value="{{ old('planing_cost') }}"  name="planing_cost">

                              @if ($errors->has('planing_cost'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('planing_cost') }}</strong>
                                    </span>
                                @endif
                               </div>
                      </div>

                      <div class="form-group {{ $errors->has('design_cost') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="design_cost"> Estimate Design Cost
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="design_cost"  class="form-control col-md-7 col-xs-12" 
                                                value="{{ old('design_cost') }}"  name="design_cost">

                              @if ($errors->has('design_cost'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('design_cost') }}</strong>
                                    </span>
                                @endif
                               </div>
                      </div>

                      <div class="form-group {{ $errors->has('develop_cost') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="develop_cost"> Estimate Develop Cost
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="develop_cost"  class="form-control col-md-7 col-xs-12" 
                                                value="{{ old('develop_cost') }}"  name="develop_cost">

                              @if ($errors->has('develop_cost'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('develop_cost') }}</strong>
                                    </span>
                                @endif
                               </div>
                      </div>

                      <div class="form-group {{ $errors->has('others_cost') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="others_cost"> Others Cost
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="others_cost"  class="form-control col-md-7 col-xs-12" 
                                                value="{{ old('others_cost') }}"  name="others_cost">

                              @if ($errors->has('others_cost'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('others_cost') }}</strong>
                                    </span>
                                @endif
                               </div>
                      </div>

                      <div class="ln_solid"></div>
                        <h5>  Add Team members  </h5>
                       <div class="ln_solid"></div>


                       <div class="form-group {{ $errors->has('site_manager') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="site_manager">Site Manager 
                                      <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control select2_single" name="site_manager[]"> 
                                      @foreach ( $site_managers as $manager )
                                        <option value="{{$manager->id}}"> {{ $manager->first_name }}  {{ $manager->last_name }} </option>
                                      @endforeach
                                </select>

                              @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('site_manager') }}</strong>
                                    </span>
                                @endif
                               </div>
                      </div>

                       <div class="form-group {{ $errors->has('developers') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="developers"> Attach Developer(s) 
                                      <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="select2_multiple form-control" multiple="multiple" name="developers[]" >
                                      @foreach ( $developers as $developer )
                                          <option value="{{$developer->id}}"> {{ $developer->first_name }} {{ $developer->last_name }} </option>
                                      @endforeach
                                </select>

                              @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('developers') }}</strong>
                                    </span>
                                @endif
                               </div>
                      </div>



                       <div class="form-group {{ $errors->has('designers') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="designers"> Attach Designer(s) 
                                      <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="select2_multiple form-control" multiple="multiple" name="designers[]" >
                                      @foreach ( $designers as $designer )
                                          <option value="{{$designer->id}}"> {{ $designer->first_name }} {{ $designer->last_name }} </option>
                                      @endforeach
                                </select>

                              @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('designers') }}</strong>
                                    </span>
                                @endif
                               </div>
                      </div>


                      <div class="ln_solid"></div>
                        <h5>  Attach Client Information </h5>
                       <div class="ln_solid"></div>
                       <div class="form-group {{ $errors->has('clients') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="clients"> Attach Client(s) 
                                      <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="select2_multiple form-control" multiple="multiple" name="clients[]" >
                                      @foreach ( $clients as $client )
                                          <option value="{{$client->id}}"> {{ $client->first_name }} {{ $client->last_name }} </option>
                                      @endforeach
                                </select>

                              @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('clients') }}</strong>
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

@endsection

@section('js')
<script src="../vendors/select2/dist/js/select2.full.min.js"></script>
<script>
      $(document).ready(function() {

         $(".select2_single").select2({
         placeholder: "Select Manager(s)",
          allowClear: true
        });

        $(".select2_multiple").select2({
          placeholder: "you can select  more than one",
          allowClear: true
        });
      });
    </script>
    @endsection

