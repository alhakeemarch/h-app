<form action="{{route('projectService.store')}}" class=" form-group m-0 d-flex jumbotron p-3" method="POST">
    @csrf
    <input type="hidden" name="project_id" value="{{$project->id}}">
    <div class="col-md-6">
        <x-input name='name_ar' title="">
            <x-slot name='title'>{{__('service name')}}</x-slot>
            <x-slot name='is_required'>true</x-slot>
            <x-slot name='input_value'>خدمات إستشارات هندسية ...</x-slot>
        </x-input>
    </div>
    <x-input name='price' title="">
        <x-slot name='title'>{{__('price')}}</x-slot>
        <x-slot name='onkeypress_fun'>onlyNumber(event)</x-slot>
        <x-slot name='is_required'>true</x-slot>
    </x-input>
    <div class="col-md">
        <label class="my-1">نسبة الضريبة
            <span class="small text-danger">({{__('required')}})</span>:</label>
        <select name="vat_percentage" class="form-control @error ('vat_percentage') is-invalid @enderror" required>
            <option value='15' selected>15 %</option>
            <option value='5'>5 %</option>
        </select>
    </div>
    <x-btn btnText='add'>
        <x-slot name='is_btn_link'>true</x-slot>
    </x-btn>
</form>