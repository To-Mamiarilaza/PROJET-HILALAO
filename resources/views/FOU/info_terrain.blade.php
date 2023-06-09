@foreach($infos as $info)
    <p>{{$info->name}}</p>
    <p>{{$info->category}}</p>
    <p>{{$info->field_type}}</p>
    <p>{{$info->infrastructure}}</p>
    <p>{{$info->light}}</p>
    <p>{{$info->address}}</p>
    <p>{{$info->longitude}}</p>
    <p>{{$info->latitude}}</p>
    <p>{{$info->description}}</p>
@endforeach