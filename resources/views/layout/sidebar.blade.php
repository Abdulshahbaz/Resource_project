<aside class="main-sidebar sidebar-dark-primary elevation-4"> 
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>                                                                                       
        <div class="info">
         <a href="#" class="d-block">Task</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="{{route('task.index')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Task List
              </p>
            </a> 
          <li class="nav-item">
            <a href="{{route('task.create')}}" class="nav-link">                      
              <i class="nav-icon far fa-image"></i>
              <p>
                Task Add
              </p>
            </a>
          </li>       
        </ul>
      </nav>
    </div>
</aside>     