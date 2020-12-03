<div class="card-header text-white bg-dark mb-3">
    {{__('project information')}}
</div>
<div class="row">
    {{-- ----------------------------------------------------------------------------------------------------------- --}}
    <x-input name='project_arch_hight' title="">
        <x-slot name='type'>text</x-slot>
        <x-slot name='is_required'>true</x-slot>
        <x-slot name='title'>{{__('required height')}}</x-slot>
        <x-slot name='input_value'>{{old('project_arch_hight') ?? $project->project_arch_hight}}</x-slot>
    </x-input>
    {{-- ----------------------------------------------------------------------------------------------------------- --}}
    <x-input name='project_type' title="">
        <x-slot name='type'>text</x-slot>
        <x-slot name='is_required'>true</x-slot>
        <x-slot name='title'>{{__('required use')}}</x-slot>
        <x-slot name='input_value'>{{old('project_type') ?? $project->project_type}}</x-slot>
    </x-input>
    {{-- ----------------------------------------------------------------------------------------------------------- --}}
    <div class="col-md form-group mt-1">
        <label for="project_manager_id">{{__('project manager')}}
            <span class="small text-danger my-1">({{__('required')}})</span> :</label>
        <select class="form-control my-1" name="project_manager_id">
            <option selected disabled>choose..</option>
            @foreach ($employees as $person)
            <option value="{{$person->id}}" @if($plot->project_manager_id == $person->id)
                selected
                @elseif(old('project_manager_id') == $person->id) selected
                @endif>
                {{$person->ar_name1 .' '.$person->ar_name2.' '. $person->ar_name5}}</option>
            @endforeach
        </select>
    </div>

    {{-- ----------------------------------------------------------------------------------------------------------- --}}
</div>
<div class="row">
    {{-- ----------------------------------------------------------------------------------------------------------- --}}
    <x-input name='last_rokhsa_no' title="">
        <x-slot name='type'>text</x-slot>
        <x-slot name='title'>{{__('rokhsa number')}}</x-slot>
        <x-slot name='input_value'>{{old('last_rokhsa_no') ?? $project->last_rokhsa_no}}</x-slot>
    </x-input>
    {{-- ----------------------------------------------------------------------------------------------------------- --}}
    <x-input name='last_rokhsa_issue_date' title="">
        <x-slot name='type'>text</x-slot>
        <x-slot name='title'>{{__('rokhsa issue date')}}</x-slot>
        <x-slot name='input_pattern'>(0[1-9]|1[0-9]|2[0-9]|3[01])-(0[1-9]|1[012])-[0-9]{4}</x-slot>
        <x-slot name='tooltip'>(dd-mm-yyyy)</x-slot>
        <x-slot name='input_value'>{{old('last_rokhsa_issue_date') ?? $project->last_rokhsa_issue_date}}</x-slot>
    </x-input>
    {{-- ----------------------------------------------------------------------------------------------------------- --}}
    <div class="col-md form-group mt-1">
        <label for="is_only_supervision">{{__( 'supervision only')}}
            <span class="small text-muted">({{__('optional')}})</span>:</label>
        <select name="is_only_supervision"
            class="form-control my-1 @error ('is_only_supervision') is-invalid @enderror">
            <option value=0 selected> {{__('no')}}</option>
            <option value=1 @if(old('is_only_supervision') or $project->is_only_supervision
                )selected @endif
                > {{__('yes')}}</option>
        </select>
        @error('is_only_supervision')
        <small class=" text-danger"> {{$errors->first('is_only_supervision')}} </small>
        @enderror
    </div>
    {{-- ----------------------------------------------------------------------------------------------------------- --}}
</div>