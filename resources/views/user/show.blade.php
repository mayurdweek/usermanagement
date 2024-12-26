<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
     <div class="showpost">
        <h1 class="heading1">Users</h1>
        <div class="post-detail">
            <div class="line">
                <label for="Profile">Profile</label>
                <img src="{{asset($users->image)}}" alt="profile Pic" height="100px" width="100px" class="editimage">
            </div>
            <div class="line">
                <label for="Name">Name</label>
                <p>{{$users->name}}</p><br>
            </div>
            <div class="line">
                <label for="Email">Email</label>
                <p>{{$users->email}}</p><br>
            </div>
            <div class="line">`
                <label for="mobile">mobile</label>
                <p>{{$users->mobile}}</p><br>
            </div>
            <div class="line">
                <label for="gender">Gender</label>
                <p>{{$users->gender}}</p><br>
            </div>
            <div class="line">
                <label for="country">country</label>
                <p>{{$users->country_name}}</p><br>
            </div>
          
            <div class="line">
                <label for="city">state</label>
                <p>{{$users->state_name}}</p><br>
            </div>
            <div class="line">
                <label for="city">city</label>
                <p>{{$users->city_name}}</p><br>
            </div>
            <div class="line">
                <label for="hobby">Hobby</label>
                <p>{{$users->hobby}}</p><br>
            </div>
            <div class="line">
                <label for="Files">Files</label>
                @foreach ($doc as $d)
                    <a href="{{asset('/storage/uploads/'.$d->filename)}}" target="_blank">{{$d->filename}}</a>
                @endforeach
            </div>
        </div>
        <form action="{{route('users.index')}}" method="get">
            @csrf
            <button type="submit">Back</button>
        </form>
    </div> 
</body>
</html>