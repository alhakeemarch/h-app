@extends('layouts.app')
@section('title', 'project show')
@section('content')

<form action="{{route('project.update',$project)}}" method="POST" class="form-group card m-2 p-2">
    @csrf
    @method('PATCH')
    <input type="hidden" name="form_action" value="update_azel_data">

    <div class="card-body">
        <div class="row">
            <x-input name='azel_walls_material' title="">
                <x-slot name='title'>مادة عزل الحوائط</x-slot>
                <x-slot name='tooltip'>مادة العزل الحراري</x-slot>
                <x-slot name='placeholder'>مثال: بولسترين</x-slot>
                <x-slot name='onkeypress_fun'>onlyArabicString(event)</x-slot>
                <x-slot name='input_value'>{{$project->azel_walls_material}}</x-slot>
            </x-input>
            <x-input name='azel_walls_value' title="">
                <x-slot name='title'>قيمة عزل الحوائط</x-slot>
                <x-slot name='tooltip'>قيمة العزل الحراري</x-slot>
                <x-slot name='placeholder'>مثال: 0.53</x-slot>
                <x-slot name='onkeypress_fun'>onlyNumber(event)</x-slot>
                <x-slot name='input_value'>{{$project->azel_walls_value}}</x-slot>
            </x-input>
        </div>
        <div class="row">
            <x-input name='azel_ceiling_material' title="">
                <x-slot name='title'>مادة عزل الأسقف</x-slot>
                <x-slot name='tooltip'>مادة العزل الحراري</x-slot>
                <x-slot name='placeholder'>مثال: بولسترين</x-slot>
                <x-slot name='onkeypress_fun'>onlyArabicString(event)</x-slot>
                <x-slot name='input_value'>{{$project->azel_ceiling_material}}</x-slot>
            </x-input>
            <x-input name='azel_ceiling_value' title="">
                <x-slot name='title'>قيمة عزل الأسقف</x-slot>
                <x-slot name='tooltip'>قيمة العزل الحراري</x-slot>
                <x-slot name='placeholder'>مثال: 0.31</x-slot>
                <x-slot name='onkeypress_fun'>onlyNumber(event)</x-slot>
                <x-slot name='input_value'>{{$project->azel_ceiling_value}}</x-slot>
            </x-input>
        </div>
        <div class="row">
            <x-input name='azel_window_material' title="">
                <x-slot name='title'>مادة عزل النوافذ</x-slot>
                <x-slot name='tooltip'>مادة العزل الحراري</x-slot>
                <x-slot name='placeholder'>مثال: زجاج مضاعف</x-slot>
                <x-slot name='onkeypress_fun'>onlyArabicString(event)</x-slot>
                <x-slot name='input_value'>{{$project->azel_window_material}}</x-slot>
            </x-input>
            <x-input name='azel_window_value' title="">
                <x-slot name='title'>قيمة عزل النوافذ</x-slot>
                <x-slot name='tooltip'>قيمة العزل الحراري</x-slot>
                <x-slot name='placeholder'>مثال: 2.67</x-slot>
                <x-slot name='onkeypress_fun'>onlyNumber(event)</x-slot>
                <x-slot name='input_value'>{{$project->azel_window_value}}</x-slot>
            </x-input>
        </div>
        <x-btn class="mt-3" btnText='save' />
    </div>




</form>

@endsection