Hi: {{$user->name}} <br>
This is link to active your account <br/>
<a href="{{route('user.verify', ['token' => $token, 'id' => $id])}}">Click here</a>