{{-- <div class="alert alert-danger"> --}}
{{-- <ul class="alert alert-danger mt-3">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
</ul> --}}
{{-- </div> --}}

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error...!</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>