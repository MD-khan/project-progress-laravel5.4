@extends('layouts.app')

@section('css')

@endsection

@section('content')
  
    <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Add a new Project </h2>
                    
                    <div class="clearfix"></div>
                  </div>


                  <div class="x_content">
                    
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      
                        <ul class="wizard_steps">
                              <li> <a href="#step-1"><span class="step_no">1</span><span class="step_descr">  Step 1<br /> 
                                     <small>Basic Information of the project </small>
                                    </span>
                                    </a>
                             </li>


                        <li><a href="#step-2"><span class="step_no">2</span> <span class="step_descr">   Step 2<br />
                              <small> Attach Client information </small>
                                 </span>   </a>
                       </li>

                      <li><a href="#step-3"><span class="step_no">3</span> <span class="step_descr">   Step 2<br />
                              <small> Attach Team Members  </small>
                                 </span>   </a>
                       </li>

                       <li><a href="#step-4"><span class="step_no">4</span> <span class="step_descr">   Step 2<br />
                              <small> Project Budget   </small>
                        </span>   </a>
                       </li>

                      </ul>


                      <div id="step-1">
                        <form class="form-horizontal form-label-left" method="POST" action="/projects/store">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Project Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Project Category <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" name="category" >
                          
                         
                            <option value="">  Category </option>
                              <option value="">  Category </option>
                                <option value="">  Category </option>
                                  <option value="">  Category </option>
                         
                          </select>
                            </div>
                          </div>

                          <div class="form-group input-prepend">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Project Duration <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             <div class="input-prepend input-group">
                                <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                <input type="text" style="width: 200px" name="reservation" id="reservation" class="form-control" value="" />
                              </div>
                            </div>
                          </div>

                        </form>

                      </div>



                      <div id="step-2">
                            <form class="form-horizontal form-label-left">

                          <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Company Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                          </div>

                          <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Key Contact  <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Key Contact Email<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Key Person's Phone  <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Address <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Website <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                            </div>
                          </div>

                        </form>

                      </div>
                      <div id="step-3">
                        <form class="form-horizontal form-label-left">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Add Site Manager(s): <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Add Developer(s): <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Add Designers <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Add Member(s) <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
                            </div>
                          </div>

                        </form>

                      </div>


                      <div id="step-4">
                        <form class="form-horizontal form-label-left">

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Project Deal Price: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>


                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Develope Cost: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Design Cost: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Others Cost: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                        </form>

                      </div>

                    </div> <!-- Wizard -->


                    </div>
                    </div>
                    </div>
                    </div>
                  
                    <!-- End SmartWizard Content -->
<div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name"> Key Contact
                                      <span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" id="category"  class="form-control col-md-7 col-xs-12" 
                                                value="{{ old('first_name') }}"   placeholder="First Name">

                              @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                               </div>

                               <div class="col-md-3 col-sm-3 col-xs-12 {{ $errors->has('last_name') ? ' has-error' : '' }} ">
                                <input type="text" id="category"  class="form-control col-md-7 col-xs-12" 
                                                value="{{ old('last_name') }}"  placeholder="Last Name">

                              @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                               </div>
                      </div>


                      <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">  Email Address 
                                      <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="email"  class="form-control col-md-7 col-xs-12" 
                                                value="{{ old('email') }}" >

                              @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                               </div>
                      </div>

                      <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone"> Phone
                                      <span class="required">*</span>
                            </label>
                            <div class="col-md-4 col-sm-4 col-xs-6">
                                <input type="tel" id="phone"  class="form-control col-md-7 col-xs-12" name="phone" 
                                                value="{{ old('phone') }}" >

                              @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                               </div>

                               <div class="col-md-2 col-sm-2 col-xs-6 {{ $errors->has('extention') ? ' has-error' : '' }} ">
                                <input type="text" id="extention"  class="form-control col-md-7 col-xs-12" 
                                                value="{{ old('last_name') }}"  name="extention" placeholder="Extention">

                              @if ($errors->has('extention'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('extention') }}</strong>
                                    </span>
                                @endif
                               </div>
                      </div>

                      <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">  Password
                                      <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="password"  class="form-control col-md-7 col-xs-12" 
                                                value="{{ old('password') }}" >

                              @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                               </div>
                      </div>


                       <div class="ln_solid"></div>
                         <h5>  Client's Company Information </h5>
                          <div class="ln_solid"></div>

                         <div class="form-group {{ $errors->has('company_name') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company_name">  Company/Industry/Any
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="company_name"  class="form-control col-md-7 col-xs-12"  name="company_name" 
                                                value="{{ old('company_name') }}" >

                              @if ($errors->has('company_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                @endif
                               </div>
                      </div>

                      <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">  Address
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control"></textarea>

                              @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                               </div>
                      </div>

                       <div class="form-group {{ $errors->has('company_phone') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company_phone">  Phone
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="tel" id="company_phone"  class="form-control col-md-7 col-xs-12"  name="company_phone" 
                                                value="{{ old('company_phone') }}" >

                              @if ($errors->has('company_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_phone') }}</strong>
                                    </span>
                                @endif
                               </div>
                      </div>

                      <div class="form-group {{ $errors->has('website') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">  Website
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="website"  class="form-control col-md-7 col-xs-12"  name="website" 
                                                value="{{ old('website') }}" >

                              @if ($errors->has('company_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                               </div>
                      </div>


                      
  
  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <a href="/projects/create" class="pull-right btn btn-success"> Add a New Project </a>
                  <div class="x_title">
                    <h2>  {{ $project->name }}   <small class="badge"> Total: </small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    @foreach ( $project->participants as $p )
                          {{ $p->first_name }}
                          @foreach ($p->roles as $role)
                              {{ $role->display_name  }}
                            @endforeach
                    @endforeach
                  </div>
                </div>
              </div>

@endsection

@section('js')
<!-- jQuery Smart Wizard -->
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>

<!-- jQuery Smart Wizard -->
    <script>
      $(document).ready(function() {
        $('#wizard').smartWizard();

        $('.buttonNext').addClass('btn btn-success');
        $('.buttonPrevious').addClass('btn btn-primary');
        $('.buttonFinish').addClass('btn btn-default');

          $('#reservation').daterangepicker(null, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });

      });
    </script>
@endsection
