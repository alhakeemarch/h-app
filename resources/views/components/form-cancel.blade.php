{{-- <a href="{{url()->previous()}}" class="btn btn-secondary col" onclick="show_loader()">
<i class="fas fa-undo"></i> | {{__('cancel')}}
</a> --}}

<form action="{{URL::previous()}}">
    <x-btn btnText='cancel' />
</form>