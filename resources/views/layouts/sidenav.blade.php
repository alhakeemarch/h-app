{{-- --------------------------------------------------------------------------------------------- --}}
<input type="text" id='national_id' name="national_id_input" class="form-control my-4 mx-3 sidebar-serch"
    autocomplete="off" required placeholder="{{__( 'search..')}}" onfocus="this.placeholder=''"
    onblur="this.placeholder=' {{__( 'search..')}}'" onkeyup="filterSidebar(event)" onkeypress=" onlyString(event)">
{{-- --------------------------------------------------------------------------------------------- --}}
<div class=" sidebar-group">
    <a href="#">
        <div class="sidebar-title d-flex justify-content-between">
            <span class="">admin</span>
            <i class="fas fa-caret-up"></i>
            <i class="fas fa-caret-down d-none"></i>
        </div>
    </a>
    <a class="" href="{{route ('user.index')}}">
        <div class="sidebar-item {{ (request()->is('user*')) ? 'active' : '' }}">
            users
        </div>
    </a>
    <a href="{{route ('employee.index')}}">
        <div class="sidebar-item {{ (request()->is('employee*')) ? 'active' : '' }}">
            employee
        </div>
    </a>
    <a href="{{route ('person.index')}}">
        <div class="sidebar-item {{ (request()->is('person*')) ? 'active' : '' }}">
            person
        </div>
    </a>
    <a href="{{route ('home')}}">
        <div class="sidebar-item {{ (request()->is('link*')) ? 'active' : '' }}">
            link
        </div>
    </a>
    <a href="{{route ('home')}}">
        <div class="sidebar-item {{ (request()->is('link*')) ? 'active' : '' }}">
            link
        </div>
    </a>
</div>
{{-- --------------------------------------------------------------------------------------------- --}}
<div class=" sidebar-group">
    <a href="#">
        <div class="sidebar-title d-flex justify-content-between">
            <span>project</span>
            <i class="fas fa-caret-up"></i>
            <i class="fas fa-caret-down d-none"></i>
        </div>
    </a>
    <a class="" href="{{route ('customer.index')}}">
        <div class="sidebar-item {{ (request()->is('customer*')) ? 'active' : '' }}">
            customers
        </div>
    </a>
    <a class="" href="{{route ('project.index')}}">
        <div class="sidebar-item {{ (request()->is('project*')) ? 'active' : '' }}">
            projects
        </div>
    </a>
    <a href="{{route ('plot.index')}}">
        <div class="sidebar-item {{ (request()->is('plot*')) ? 'active' : '' }}">
            plots
        </div>
    </a>
    <a href="{{route ('contract.index')}}">
        <div class="sidebar-item {{ (request()->is('contract*')) ? 'active' : '' }}">
            contracts
        </div>
    </a>
    <a href="{{route ('home')}}">
        <div class="sidebar-item text-danger {{ (request()->is('attachment*')) ? 'active' : '' }}">
            attachments
        </div>
    </a>
    <a href="{{route ('task.index')}}">
        <div class="sidebar-item {{ (request()->is('task*')) ? 'active' : '' }}">
            tasks
        </div>
    </a>
</div>
{{-- --------------------------------------------------------------------------------------------- --}}
<div class=" sidebar-group">
    <a href="#">
        <div class="sidebar-title d-flex justify-content-between">
            <span>data</span>
            <i class="fas fa-caret-up"></i>
            <i class="fas fa-caret-down d-none"></i>
        </div>
    </a>
    <a class="" href="{{route ('country.index')}}">
        <div class="sidebar-item {{ (request()->is('country*')) ? 'active' : '' }}">
            countries
        </div>
    </a>
    <a href="{{route ('saudiCity.index')}}">
        <div class="sidebar-item {{ (request()->is('saudiCity*')) ? 'active' : '' }}">
            saudi cities
        </div>
    </a>
    <div class="sidbar-divider"></div> {{-- ------------------------------------------- --}}
    <a href="{{route ('municipalityBranch.index')}}">
        <div class="sidebar-item {{ (request()->is('municipalityBranch*')) ? 'active' : '' }}">
            municipality
            Branchs
        </div>
    </a>
    <a href="{{route ('district.index')}}">
        <div class="sidebar-item {{ (request()->is('district*')) ? 'active' : '' }}">
            districts
        </div>
    </a>
    <a href="{{route ('neighbor.index')}}">
        <div class="sidebar-item {{ (request()->is('neighbor*')) ? 'active' : '' }}">
            neighbors
        </div>
    </a>
    <a href="{{route ('plan.index')}}">
        <div class="sidebar-item {{ (request()->is('plan*')) ? 'active' : '' }}">
            plans
        </div>
    </a>
    <a href="{{route ('street.index')}}">
        <div class="sidebar-item {{ (request()->is('street*')) ? 'active' : '' }}">
            streets
        </div>
    </a>
    <div class="sidbar-divider"></div> {{-- ------------------------------------------- --}}
    <a href="{{route ('allowedBuildingRatio.index')}}">
        <div class="sidebar-item {{ (request()->is('allowedBuildingRatio*')) ? 'active' : '' }}">
            allowed Building Ratios
        </div>
    </a>
    <a href="{{route ('allowedBuildingHeight.index')}}">
        <div class="sidebar-item {{ (request()->is('allowedBuildingHeight*')) ? 'active' : '' }}">
            allowed Building Height
        </div>
    </a>
    <a href="{{route ('allowedUsage.index')}}">
        <div class="sidebar-item {{ (request()->is('allowedUsage*')) ? 'active' : '' }}">
            allowed usage
        </div>
    </a>
    <div class="sidbar-divider"></div> {{-- ------------------------------------------- --}}
    <a href="{{route ('ownerType.index')}}">
        <div class="sidebar-item {{ (request()->is('ownerType*')) ? 'active' : '' }}">
            owner Type
        </div>
    </a>
    <a href="{{route ('company.index')}}">
        <div class="sidebar-item text-danger {{ (request()->is('company*')) ? 'active' : '' }}">
            companies
        </div>
    </a>
    <a href="{{route ('organization.index')}}">
        <div class="sidebar-item text-danger {{ (request()->is('organization*')) ? 'active' : '' }}">
            organization
        </div>
    </a>
    <a href="{{route ('endowments.index')}}">
        <div class="sidebar-item text-danger {{ (request()->is('endowments*')) ? 'active' : '' }}">
            endowments
        </div>
    </a>
    <div class="sidbar-divider"></div> {{-- ------------------------------------------- --}}
    <a href="{{route ('major.index')}}">
        <div class="sidebar-item {{ (request()->is('major*')) ? 'active' : '' }}">
            major
        </div>
    </a>
    <a href="{{route ('contractfield.index')}}">
        <div class="sidebar-item text-danger {{ (request()->is('contractfield*')) ? 'active' : '' }}">
            contract field
        </div>
    </a>
    <a href="{{route ('lettertype.index')}}">
        <div class="sidebar-item text-danger {{ (request()->is('lettertype*')) ? 'active' : '' }}">
            letter type
        </div>
    </a>
</div>
{{-- --------------------------------------------------------------------------------------------- --}}