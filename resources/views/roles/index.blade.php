@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> All Roles </h2>
                    <a href="/roles/create" class="btn btn-primary pull-right"> Add a new role </a>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Roles</th>
                          <th> Permission(s) </th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
                        @if( $roles->count() )

                             @foreach ( $roles as $role )
                        <tr>
                          <th scope="row"> {{ $number++}} </th>
                          <td> <label class="gray">  {{ $role->display_name }} </label> </td>
                          <td>  
                          
                          @foreach ( $role->perms as $permission )
                              
                              {{ $permission->display_name }} ,
                            
                          @endforeach
                         
                           </td>
                          <td>
                            <a href="/roles/{{$role->id}}/show" class="btn btn-small btn-primary"> View </a>
                            <a href="/roles/{{$role->id}}/edit" class="btn btn-small btn-success"> Edit </a>
                          </td>
                        </tr>
                          @endforeach
                        @endif

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
        </div>
</div>
@endsection
