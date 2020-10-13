<form class=" container form-group form-row m-0" action="{{ action('ProjectController@search') }}"
    accept-charset="UTF-8" method="POST">
    @csrf
    <div class="col-md-9">
        <label for="fname">{{__( 'project name in arabic')}}
            <span class="small text-danger">({{__('required')}})</span>:</label>
        <input type="text" name="project_name" class="form-control @error ('project_name') is-invalid @enderror"
            value="{{old('project_name')}}" placeholder="{{__( 'project name in arabic')}}.."
            onfocus="this.placeholder=''" onblur="this.placeholder='{{ __('project name in arabic') }}..'" required>
        @error('project_name')
        <small class="text-danger"> {{$errors->first('project_name')}} </small>
        @enderror
    </div>
    <div class="col-md-3">
        <button class=" btn btn-info btn-block" type="submit"> {{__('search')}} |
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>