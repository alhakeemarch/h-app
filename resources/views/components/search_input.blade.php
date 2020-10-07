<input type="text" name="{{$name}}" class="form-control" autocomplete="off" onkeyup="filterNames(event)"
    @if($onkeypress_fun ?? false) onkeypress="{{$onkeypress_fun}}" @endif placeholder="{{'search'}}.."
    onfocus="this.placeholder=''" onblur="this.placeholder='{{'search'}}..'">