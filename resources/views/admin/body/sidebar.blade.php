<aside class="sidebar">
    <nav>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Home</a></li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle">Projects</a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('projects.index') }}">Project List</a></li>
                    <li><a href="{{ route('projects.create') }}">Create Project</a></li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle">Tasks</a>
                <ul class="dropdown-menu">
                        <li><a href="{{ route('tasks.index') }}">Tasks List</a></li>
                        <li><a href="{{ route('tasks.create') }}">Create Task</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>
