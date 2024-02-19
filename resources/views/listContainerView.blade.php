<ul>
    @foreach($lists as $list)
    <li>{{$list->activity}} - {{$list->check}} - {{$list->position}}</li>
    @endforeach
</ul>