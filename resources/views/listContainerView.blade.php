<ul>
    @foreach($lists as $list)
    <li>{{$list->activity}} - {{$list->check}}</li>
    @endforeach
</ul>