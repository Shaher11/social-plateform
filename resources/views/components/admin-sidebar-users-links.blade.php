<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('home')}}">Home</a></li>
                   <li><a href="/admin">Dashboard</a></li>

                </ul>
            </li>
       
            <li><a><i class="fa fa-file"></i>Categories <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('admin.categories.create')}}">Create Category</a></li>
                    <li><a href="{{route('admin.categories.index')}}">View All Categories</a></li>
                </ul>
            </li>

            <li><a><i class="fa fa-calendar"></i>Posts <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('admin.posts.create')}}">Create Post</a></li>
                    <li><a href="{{route('admin.posts.index')}}">View All Posts</a></li>
                   <li><a href="{{route('admin.comments.index')}}">View All Comments</a></li>

                </ul>
            </li>
            <li><a><i class="fa fa-tag"></i>Tags <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('admin.tags.create')}}">Create Tag</a></li>
                    <li><a href="{{route('admin.tags.index')}}">View All Tags</a></li>
                </ul>
            </li>

            <li><a><i class="fa fa-users"></i>Users <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('admin.users.create')}}">Create User</a></li>
                    <li><a href="{{route('admin.users.index')}}">View All Users</a></li>
                </ul>
            </li>




        </ul>
    </div>


</div>
<!-- /sidebar menu -->
