<!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              
              <div class="menu_section">
                <h3>General</h3>

                <ul class="nav side-menu">
                    <li><a href="/dashboard"> 
                    <i class="fa fa-tachometer" aria-hidden="true"></i>
                          Dashboard </a> </li>

                  <li><a> <i class="fa fa-code" aria-hidden="true"></i> Projects <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/projects"> All Projects  </a></li>
                      <li><a href="/projects/create"> Add Project </a> </li>
                      <li><a href="#">Project Detail</a></li>
                      <li><a href="#l">Project Type  </a></li>
                    </ul>
                  </li>

                  <li><a> <i class="fa fa-plug" aria-hidden="true"></i> Tasks <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#"> My Tasks  </a></li>
                      <li><a href="#"> Add Task </a> </li>
                    </ul>
                  </li>

                  <li><a> <i class="fa fa-fire" aria-hidden="true"></i>Tickets <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#"> All Tickets  </a></li>
                      <li><a href="#"> Add Tickets  </a></li>
                    </ul>
                  </li>

                  <li><a> <i class="fa fa-clock-o" aria-hidden="true"></i>Time Track <span class="fa fa-chevron-down"> </span></a>
                    <ul class="nav child_menu">
                      <li><a href="#"> All Tickets  </a></li>
                      <li><a href="#"> Add Tickets  </a></li>
                    </ul>
                  </li>

                </ul>
              </div>

              <div class="menu_section">
                <h3> User Management </h3>
                <ul class="nav side-menu">

                  @if(Auth::user()->can(['user_edit', 'user_list_view', 'user_block','user_add'], true))
                   <li> <a>  <i class="fa fa-users" aria-hidden="true">  </i> Users  <span class="fa fa-chevron-down"> </span>  </a>
                    <ul class="nav child_menu">
                          <li><a href="/users"> All Users </a></li>
                          <li><a href="/users/create">  Add User </a></li>
                    </ul>
                  </li>
             @endif

                  <li><a><i class="fa fa-table"></i> Roles  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/roles">All Roles </a></li>
                      <li><a href="/roles/create"> Add Roles </a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-desktop"> </i> Profile  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#"> My Profile  </a></li>
                    </ul>
                  </li>

                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->