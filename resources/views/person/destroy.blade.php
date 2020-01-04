<form class="delete" action="{{ route('person.destroy', $person) }}" method="POST">
    @method('DELETE')
    @csrf
    <button class="btn btn-danger btn-lg btn-block" onclick="return confirm('Are you sure?')">
        <i class="fa fa-trash"></i> Delete</button>
</form>