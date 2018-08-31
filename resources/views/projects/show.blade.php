@extends('layouts.app')

@section('css')

@endsection

@section('content')

<div class="row">
    <div class="col-md-12  col-xs-12"> 
        <div class="x_panel">
          <div class="x_title">
            <h3> Project: {{ $project->name }}</h3>
            </div>

            <div class="row "> 
                <div class="col-md-3 col-xs-3"> Category: {{ $project->category->name }}</div>
                <div class="col-md-3 col-xs-3"> Started at: {{ $project->created_at->format('d M, Y g:i a') }}</div>
                <div class="col-md-3 col-xs-3"> Duration: {{ $project->created_at->diffInDays() }}</div>
                <div class="col-md-3 col-xs-3"> Created by: {{ $project->user->first_name }}</div>
          </div>

          </div>
          </div>
          </div>

          @if ( Auth::user()->hasRole('admin') )
            <!-- only admin can see it  -->
              <div class="row">
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">

                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-money" aria-hidden="true"></i>
                          </div>
                          <div class="count">{{ $project->dealPrice() }} </div>

                          <h3> Deal Price </h3>
                          <p>  <a href="#"> Edit </a></p>
                        </div>
                      </div>

                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-fire" aria-hidden="true"></i>
                          </div>
                          <div class="count">{{ $project->totalAmountSpent() }}</div>

                          <h3> Cost  </h3>
                          <p> <a href="#"> View and  Edit </a> </p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-smile-o" aria-hidden="true"></i>
                          </div>
                          <div class="count">{{ $project->revenue() }} </div>

                          <h3> Revenue </h3>
                          <p> Based on deal price and cost</p>
                        </div>
                      </div>
                      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                          <div class="icon"><i class="fa fa-users" aria-hidden="true"></i>
                          </div>
                          <div class="count">179</div>

                          <h3>Members</h3>
                          <p>Including Clients and Team </p>
                        </div>
                      </div>
                    </div>
              @endif

                <div class="row">
                      <div class="col-md-8  col-xs-12"> 
                            <div class="x_panel">
                              <div class="x_title">
                                    <h5>  Developers </h5>
                            </div>

                             <div class="x_content"> 
                              <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th> Name </th>
                                      <th> Hours </th>
                                      <th> Tasks </th>
                                      <th> Action </th>
                                    </tr>
                                  </thead>
                             
                             <tbody>
                                 @foreach ( $project->participantsByRole('web_developer') as $participant )
                                    <tr>
                                           <td>
                                                  <img src="/images/user.png" class="avatar" alt="Avatar">
                                                  <ul class="list-inline">
        
                                                <li>  {{ $participant->first_name }}</li>

                            </ul>
                                           </td>

                                      <td>  
                                        10
                                      </td>
                                      <td> 10 completed | 5 Left </td>
                                       <td> 
                                             <a href="/users/{{$participant->id}}/projects/{{$project->id}}/tasks/create"  class="btn btn-primary btn-sm"> Assing task</a>
                                       </td>
                        </tr>
                          @endforeach
    </tbody>
  </table>
                  <div class="ln_solid"></div>
                        <h5>  Designer(s)  </h5>
                       <div class="ln_solid"></div>

                               <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th> Name </th>
                                      <th> Hours </th>
                                      <th> Tasks </th>
                                      <th> Action </th>
                                    </tr>
                                  </thead>
                             
                             <tbody>
                                 @foreach ( $project->participantsByRole('web_designer') as $participant )
                                    <tr>
                                           <td>
                                                  {{ $participant->first_name }}
                                                    <img src="/images/user.png" class="avatar" alt="Avatar">
                                                  <ul class="list-inline">
                                          
                            </ul>
                                           </td>

                                      <td>  
                                        10
                                      </td>
                                      <td> 10 completed | 5 Left </td>
                                       <td> 
                                            <a href="/users/{{$participant->id}}/projects/{{$project->id}}/tasks/create"  class="btn btn-primary btn-sm"> Assing task</a>
                                       </td>
                        </tr>
                          @endforeach
    </tbody>
  </table>

                             </div>

                          </div>
                  </div>



                  <div class="col-md-4  col-xs-12"> 
                            <div class="x_panel">

                              <div class="x_title">
                                    <h5>  Clients </h5>
                            </div>

                            <div class="x_content"> 
                              <ul class="list-group">
                               @foreach ( $project->participantsByRole('client') as $participant )
                               <a href="#" class="list-group-item ">
                                <img src="/images/user.png" class="avatar pull-right" alt="Avatar">
                                    <h4 class="list-group-item-heading">
                                          {{ $participant->first_name }} {{ $participant->last_name  }}

                                      </h4>
                                     <p class="list-group-item-text">  
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i> {{  $participant->email }} <br>
                                         <i class="fa fa-mobile" aria-hidden="true"></i> {{  $participant->phone }} <br>

                                     </p>
                                     </a>
                                @endforeach
                                </ul>
                            </div>

                          </div>

                            <div class="x_panel">

                              <div class="x_title">
                                    <h5>  Team Leader(s) </h5>
                            </div>
                            <div class="x_content"> 
                              <ul class="list-group">
                               @foreach ( $project->participantsByRole('site_manager') as $participant )
                               <a href="#" class="list-group-item ">
                                <img src="/images/user.png" class="avatar pull-right" alt="Avatar">
                                    <h4 class="list-group-item-heading">
                                          {{ $participant->first_name }} {{ $participant->last_name  }}

                                      </h4>
                                     <p class="list-group-item-text">  
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i> {{  $participant->email }} <br>
                                         <i class="fa fa-mobile" aria-hidden="true"></i> {{  $participant->phone }} <br>

                                     </p>
                                     </a>
                                @endforeach
                                </ul>
                            </div>
                            </div>


                  </div>

        </div>


@endsection

@section('js')

@endsection
