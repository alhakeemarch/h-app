{{-- <div class="alert alert-danger"> --}}
<ul class="alert alert-danger mt-3">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
{{-- </div> --}}