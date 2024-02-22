<ul>
    @foreach ($lists as $list)
        <li>{{ $list->activity }} - {{ $list->check }} - {{ $list->position }}</li>
        <form action="{{ route('list.delete', $list) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
        <a href="{{ route('list.edit', $list) }}"><button>Edit</button></a>
    @endforeach
</ul>