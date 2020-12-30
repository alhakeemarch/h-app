<form action="{{ route($route,$resource) }}" method="POST" class="col">
    @method('DELETE')
    @csrf
    <x-btn btnText='delete'></x-btn>
</form>