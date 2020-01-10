<div class="card-header text-white bg-dark mb-3">
    job information:
</div>
<div class="form-group row mb-3">
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="id_job_title">{{__( 'job title as in ID')}}
            <span class="small text-muted">({{__('optional')}})</span>
            :</label>
        <input type="text" name="id_job_title" class="form-control mb-3 @error ('id_job_title') is-invalid @enderror"
            placeholder="{{__( 'job title as in ID')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'job title as in ID')}}..'"
            value="{{ old('id_job_title') ?? $person->id_job_title }}">
        @error('id_job_title')
        <small class=" text-danger"> {{$errors->first('id_job_title')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="job_title">{{__( 'actual job title')}}
            <span class="small text-muted">({{__('optional')}})</span>
            :</label>
        <input type="text" name="job_title" class="form-control mb-3 @error ('job_title') is-invalid @enderror"
            placeholder="{{__( 'actual job title')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'actual job title')}}..'"
            value="{{ old('job_title') ?? $person->job_title }}">
        @error('job_title')
        <small class=" text-danger"> {{$errors->first('job_title')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="job_position">{{__( 'current jop position')}}
            <span class="small text-muted">({{__('optional')}})</span>
            :</label>
        <input type="text" name="job_position" class="form-control mb-3 @error ('job_position') is-invalid @enderror"
            placeholder="{{__( 'current jop position')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'current jop position')}}..'"
            value="{{ old('job_position') ?? $person->job_position }}">
        @error('job_position')
        <small class=" text-danger"> {{$errors->first('job_position')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="job_division">{{__( 'current jop division')}}
            <span class="small text-muted">({{__('optional')}})</span>
            :</label>
        <input type="text" name="job_division" class="form-control mb-3 @error ('job_division') is-invalid @enderror"
            placeholder="{{__( 'current jop division')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'current jop division')}}..'"
            value="{{ old('job_division') ?? $person->job_division }}">
        @error('job_division')
        <small class=" text-danger"> {{$errors->first('job_division')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
    <div class="col-md">
        <label for="current_project">{{__( 'current project')}}
            <span class="small text-muted">({{__('optional')}})</span>
            :</label>
        <input type="text" name="current_project"
            class="form-control mb-3 @error ('current_project') is-invalid @enderror"
            placeholder="{{__( 'current project')}}.." onfocus="this.placeholder=''"
            onblur="this.placeholder='{{__( 'current project')}}..'"
            value="{{ old('current_project') ?? $person->current_project }}">
        @error('current_project')
        <small class=" text-danger"> {{$errors->first('current_project')}} </small>
        @enderror
    </div>
    {{-- --------------------------------------------------------------------------------------------- --}}
</div>