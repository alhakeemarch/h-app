<a href="#">
    <div class="sidebar-title d-flex justify-content-between">
        <span class="">Folders and Files</span>
        <i class="fas fa-caret-up"></i>
        <i class="fas fa-caret-down d-none"></i>
    </div>
</a>
@if (auth()->user()->is_admin)
<a href="{{route ('file_folder.emps_dir')}}">
    <div class="sidebar-item {{ (request()->is('file_folder/emp*')) ? 'active' : '' }}">
        employee dir
    </div>
</a>
@endif
<a class="" href="{{route ('file_folder.runningProjects')}}">
    <div class="sidebar-item {{ (request()->is('file_folder/runningProjects*')) ? 'active' : '' }}">
        running projects
    </div>
</a>
<a class="" href="{{route ('file_folder.finshedProjects')}}">
    <div class="sidebar-item {{ (request()->is('file_folder/finshedProjects*')) ? 'active' : '' }}">
        finished projects
    </div>
</a>
<a class="" href="{{route ('file_folder.zaidProjects')}}">
    <div class="sidebar-item {{ (request()->is('file_folder/zaidProjects*')) ? 'active' : '' }}">
        zaied projects
    </div>
</a>
<a class="" href="{{route ('file_folder.earchive')}}">
    <div class="sidebar-item {{ (request()->is('file_folder/earchive*')) ? 'active' : '' }}">
        E-Archive projects
    </div>
</a>
<a class="" href="{{route ('file_folder.Safety')}}">
    <div class="sidebar-item {{ (request()->is('file_folder/Safety*')) ? 'active' : '' }}">
        Safety projects
    </div>
</a>
<a class="" href="{{route ('file_folder.central_area')}}">
    <div class="sidebar-item {{ (request()->is('file_folder/central_area*')) ? 'active' : '' }}">
        central area projects
    </div>
</a>