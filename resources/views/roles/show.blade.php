@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
             <a href="/roles/" class="pull-right btn btn-default"> Back  </a>
                <div class="panel-heading">

                  <h2 class="panel-title"> Role Details: {{ $role->display_name  }}</h2>

               </div>

                <div class="panel-body">
                        <p> {{ $role->description }} </p>
                        <label> {{ $role->display_name }} has the following permission(s) </label>
                          @foreach ( $role->perms as $permission )
                             <li>
                              {{ $permission->display_name }} 
                           </li>
                          @endforeach
                        
                </div>

                <div class="panel-footer">
                      <a href="/roles/create/" class="btn btn-primary">Add a new role  </a>
                      <a href="/roles/{{$role->id}}/eidt" class="btn btn-primary"> Edit  </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
