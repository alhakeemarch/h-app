<form action="{{route('projectService.store')}}" class=" form-group m-0 d-flex jumbotron p-3" method="POST">
    @csrf
    <input type="hidden" name="project_id" value="{{$project->id}}">
    <div class="col-md-9">
        <x-input name='name_ar' title="">
            <x-slot name='title'>{{__('service name')}}</x-slot>
            <x-slot name='is_required'>true</x-slot>
            <x-slot name='input_value'>خدمات إستشارات هندسية ...</x-slot>
        </x-input>
    </div>
    <div class="col-md-2">
        <x-input name='price' title="">
            <x-slot name='title'>{{__('price')}}</x-slot>
            <x-slot name='onkeypress_fun'>onlyNumber(event)</x-slot>
            <x-slot name='is_required'>true</x-slot>
            <x-slot name='input_min'>1</x-slot>
            <x-slot name='input_max'>7</x-slot>
        </x-input>
    </div>
    <button type="submit" class="btn btn-link m-0 align-self-end col-md-1">{{__('add')}} |
        <i class="far fa-plus-square"></i>
    </button>
</form>