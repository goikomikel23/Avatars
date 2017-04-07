<tr>
    <th class="text-center"><img src="{{ route('downloadAvatar', ['email' => $avatar['email']]) }}" width="100" height="100"/></th>
    <th class="text-center">{{$avatar['email']}}</th>
    <th class="text-center"><a href="{{route('deleteAvatar', ['email' => $avatar['email']])}}"><img src="../../storage/app/public/x.png" width="100" height="100"/></a></th>
</tr>

