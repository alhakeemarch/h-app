<div class="mx-3 d-inline-block bg-light-blue text-monospace text-uppercase p-1 m-1">
    <span class="d-inline-flex justify-content-center align-content-center">
        <a href="{{url('/')}}" class="mx-1"><i class="fas fa-home"></i></a>
        <i class="fas fa-angle-right"></i>
    </span>
    @if (strlen(Request::path())>1)
    @php $link=''; @endphp
    @foreach (explode("/",Request::path()) as $sub_link)
    @if (! is_numeric($sub_link) || auth()->user()->is_admin)
    @php $link.=$sub_link.'/' @endphp
    <span class="d-inline-flex justify-content-center align-content-center">
        <a href="{{url($link)}}" class="mx-1">{{$sub_link}}</a>
        <i class="fas fa-angle-right"></i>
    </span>
    @endif
    @endforeach
    @endif
</div>