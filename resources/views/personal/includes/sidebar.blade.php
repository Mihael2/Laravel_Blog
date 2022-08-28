  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">

        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            
          <li class="nav-item">
              <a href="{{ route('personal.main.index')}}" class="nav-link">
              <i class="nav-icon fa-solid fa-house"></i>
              <p>
                Main 
              </p>
            </a>
          </li>       

          <li class="nav-item">
            <a href="{{ route('personal.liked.index')}}" class="nav-link">
            <i class="nav-icon fa-solid fa-heart"></i>
              <p>
                Liked posts 
              </p>
            </a>
          </li>   
          
          <li class="nav-item">
            <a href="{{ route('personal.comment.index')}}" class="nav-link">
            <i class="nav-icon fa-solid fa-comments"></i>
              <p>
                Comments
              </p>
            </a>
          </li>  

        </ul>
      
    </div>
  </aside>