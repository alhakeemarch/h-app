{{-- --------------------------------------------------------------------------------------------- --}}
<div class=" sidebar-group">
    <a href="#">
        <div class="sidebar-title">
            <span class=" mx-5">admin</span>
            <i class="fas fa-caret-up"></i>
            <i class="fas fa-caret-down d-none"></i>
        </div>
    </a>
    <a class="" href="{{route ('user.index')}}">
        <div class="d-none sidebar-item {{ (request()->is('user*')) ? 'active' : '' }}">
            users
        </div>
    </a>
    <a href="{{route ('employee.index')}}">
        <div class="d-none sidebar-item {{ (request()->is('employee*')) ? 'active' : '' }}">
            employee
        </div>
    </a>
    <a href="{{route ('person.index')}}">
        <div class="d-none sidebar-item {{ (request()->is('person*')) ? 'active' : '' }}">
            person
        </div>
    </a>
    <a href="{{route ('home')}}">
        <div class="d-none sidebar-item {{ (request()->is('link*')) ? 'active' : '' }}">
            link
        </div>
    </a>
    <a href="{{route ('home')}}">
        <div class="d-none sidebar-item {{ (request()->is('link*')) ? 'active' : '' }}">
            link
        </div>
    </a>
</div>
{{-- --------------------------------------------------------------------------------------------- --}}
<div class=" sidebar-group">
    <a href="#">
        <div class="sidebar-title">
            <span class=" mx-5">project</span>
            <i class="fas fa-caret-up"></i>
            <i class="fas fa-caret-down d-none"></i>
        </div>
    </a>
    <a class="" href="{{route ('customer.index')}}">
        <div class="d-none sidebar-item {{ (request()->is('customer*')) ? 'active' : '' }}">
            customers
        </div>
    </a>
    <a class="" href="{{route ('project.index')}}">
        <div class="d-none sidebar-item {{ (request()->is('project*')) ? 'active' : '' }}">
            projects
        </div>
    </a>
    <a href="{{route ('plot.index')}}">
        <div class="d-none sidebar-item {{ (request()->is('plot*')) ? 'active' : '' }}">
            plots
        </div>
    </a>
    <a href="{{route ('contract.index')}}">
        <div class="d-none sidebar-item {{ (request()->is('contract*')) ? 'active' : '' }}">
            contracts
        </div>
    </a>
    <a href="{{route ('home')}}">
        <div class="d-none sidebar-item text-danger {{ (request()->is('attachment*')) ? 'active' : '' }}">
            attachments
        </div>
    </a>
    <a href="{{route ('task.index')}}">
        <div class="d-none sidebar-item {{ (request()->is('task*')) ? 'active' : '' }}">
            tasks
        </div>
    </a>
</div>
{{-- --------------------------------------------------------------------------------------------- --}}
<div class=" sidebar-group">
    <a href="#">
        <div class="sidebar-title">
            <span class=" mx-5">data</span>
            <i class="fas fa-caret-up"></i>
            <i class="fas fa-caret-down d-none"></i>
        </div>
    </a>
    <a class="" href="{{route ('country.index')}}">
        <div class="d-none sidebar-item {{ (request()->is('country*')) ? 'active' : '' }}">
            countries
        </div>
    </a>
    <a href="{{route ('saudiCity.index')}}">
        <div class="d-none sidebar-item {{ (request()->is('saudiCity*')) ? 'active' : '' }}">
            saudi cities
        </div>
    </a>
    <a href="{{route ('municipalityBranch.index')}}">
        <div class="d-none sidebar-item {{ (request()->is('municipalityBranch*')) ? 'active' : '' }}">
            municipality
            Branchs
        </div>
    </a>
    <a href="{{route ('district.index')}}">
        <div class="d-none sidebar-item {{ (request()->is('district*')) ? 'active' : '' }}">
            districts
        </div>
    </a>
    <a href="{{route ('neighbor.index')}}">
        <div class="d-none sidebar-item {{ (request()->is('neighbor*')) ? 'active' : '' }}">
            neighbors
        </div>
    </a>
    <a href="{{route ('plan.index')}}">
        <div class="d-none sidebar-item {{ (request()->is('plan*')) ? 'active' : '' }}">
            plans
        </div>
    </a>
    <a href="{{route ('street.index')}}">
        <div class="d-none sidebar-item {{ (request()->is('street*')) ? 'active' : '' }}">
            streets
        </div>
    </a>
    <a href="{{route ('allowedBuildingRatio.index')}}">
        <div class="d-none sidebar-item {{ (request()->is('allowedBuildingRatio*')) ? 'active' : '' }}">
            allowed Building Ratios
        </div>
    </a>
    <a href="{{route ('allowedBuildingHeight.index')}}">
        <div class="d-none sidebar-item {{ (request()->is('allowedBuildingHeight*')) ? 'active' : '' }}">
            allowed Building Height
        </div>
    </a>
    <a href="{{route ('ownerType.index')}}">
        <div class="d-none sidebar-item {{ (request()->is('ownerType*')) ? 'active' : '' }}">
            owner Type
        </div>
    </a>
</div>
{{-- --------------------------------------------------------------------------------------------- --}}