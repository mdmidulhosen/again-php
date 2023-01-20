<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item nav-category">Post management</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#posts" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title">Posts</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="posts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Add New</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">View All</a></li>
                <li class="nav-item"> <a class="nav-link" href="category.php">Category</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Tags</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item nav-category">Users management</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title">Users</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="users">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="users.php?do=Add">Add New</a></li>
                <li class="nav-item"> <a class="nav-link" href="users.php?do=View">View All</a></li>
              </ul>
            </div>
          </li>

          <li class="nav-item nav-category">Comments Section</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#comments" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-floor-plan"></i>
              <span class="menu-title">Comments</span>
              <i class="menu-arrow"></i> 
            </a>
            <div class="collapse" id="comments">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">View All</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Settings</li>
          <li class="nav-item">
            
            <div class="collapse" id="comments">
            </div>
          </li>





        </ul>
      </nav>
      <!-- partial -->