@extends('layouts.app')

@section('css')
<style>
  .completed { text-decoration: line-through; }
</style>
@endection

@section('content')
    
  @include('partials.messages.errors')
  @include('partials.messages.success')
  

  <div id="app">
  
    <project-task :list="tasks">  </project-task>


    <template id="task-template"> 
    <h2>  {{ $user->first_name }}'s Task <span v-show="remaining ">(@{{ remaining }}) </span> </h2>
      <ul v-show="list.length"> 
          <li :class="{ 'completed' : task.completed }" 
              v-for="task in list"  @click = "toggleCompletedFor(task)"> 
                
               @{{ task.body }}  <span class="btn btn-sm btn-primary" @click="deleteTask(task)"> X </span>
            </li>
      </ul>
      <p v-else>  No Task yet </p>

      <button @click="clearCompleted">Clear Competed </button>
      </template>
   </div>

  <div>

    {{ $project->name }}
    <br>
  

   </div>
      

      <div class="row"> 

          <div class="col-md-7 col-sm-7 col-xs-12"> 
                <div class="x_panel">
                      <div class="x_title">
                          <h2> Add  New Task </h2>
                              
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content"> 
                      <form 
                                    action=""  
                                    class="form-horizontal form-label-left" 
                                    novalidate="" method="POST"  >
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
                          <h2>  Tasks ( {{ $user->totalTasks() }} )</h2>
                              
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content"> 
                       <div class="">
                          <ul class="to_do">
                            @foreach ( $project->tasks as $task )
                          <li>
                            <p>
                              <input type="checkbox" class="flat"> 
                                  {{ $task->name }} 
                              </p>
                          </li>
                          @endforeach
                        </ul>
                    </div>
                    </div>

                 </div>
          </div>
       
    </div>
@endsection

@section('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.js"></script>
  <script>
Vue.component('project-task' , {
  props: ['list'],
  template: '#task-template',
  methods: {

              toggleCompletedFor:  function(task) {
              task.completed = ! task.completed;
        },

          isCompleted : function(task) {
          return task.completed;
        },

        isProgress: function(task) {
            return ! this.isCompleted(task);
        },

        deleteTask: function(task) {
          this.list.$remove(task);
        },

        clearCompleted: function() {
          this.list =   this.list.filter(this.isProgress);
        },


      },

      computed:  {

        remaining: function() {
           var vm = this; 
         return this.list.filter( this.isProgress).length;
        }
      }
});

     new Vue ({
      el: '#app',

      data: {

            btn : "btn btn-primary",
                tasks: [
                     { body: 'Go To Dhaka', completed: false },
                     { body: 'Go To Boston', completed: false },
                     { body: 'Go To Khulna ', completed: true },
                ]
      },
      

     })
  </script>
@endsection


