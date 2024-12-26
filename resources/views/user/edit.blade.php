<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="edit">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <h1>Edit Post</h1>
    <form action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" method="POST" class="edit-form">
        @csrf
        @method('PUT')

        <div class="input-title editshow">
            <div class="show">
                <img src="{{asset($user->image)}}" alt=""  width="100px" class="editimage">
            </div>
            <div class="select">
                <label for="Profile Pic">Profile Pic</label>
                <input type="file" name="profile" id="image" accept=".jpg,.jpeg,.png,.svg">
            </div>
        </div>

        <div class="input-title flex-file">
            @foreach ($documents as $doc)
            <div class="show ">
                <a href="{{asset('storage/uploads/'.$doc->filename)}}" target="_blank">{{$doc->filename}}</a>
            </div>
            @endforeach
            
            <div class="select">
                <label for="Files">Select Document</label>
                <input type="file" name="files[]" id="file" accept=".pdf,.doc,.docx,.txt" multiple>
            </div>
        </div>

        <div class="input-title">
            <label for="title">Name:</label>
            <input type="text" name="name" id="name" value="{{$user->name}}"><br>
        </div>
        
        <div class="input-title">
            <label for="title">Email:</label>
            <input type="email" name="email" id="email" value="{{$user->email}}"><br>
        </div>
        @error('email')
            <span class="error-message">{{$message}}</span>
            @enderror
        <div class="password input-title">      
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="{{$user->password}}">
        </div>
        @error('password')
                <p class="error-message">{{$message}}</p>
        @enderror
        <div class="mobileno input-title">
            <label for="mobile">MobileNo:</label>
            <input type="number" name="mobile" id="mobile" value="{{$user->mobile}}">
            
        </div>
        @error('mobile')
            <span class="error-message">{{$message}}</span>
            @enderror
        <div class="gender input-title">
            <label for="Gender">Gender</label>
            <input type="radio" name="gender" id="gender" value="Male" class="radio" {{$user->gender=="Male"? 'checked':''}}>Male
            <input type="radio" name="gender" id="gender" value="Female" class="radio" {{$user->gender=="Female" ?'checked':''}}>Female
            
        </div>
        @error('gender')
            <span class="error-message">{{$message}}</span>
            @enderror
            <div class="country input-title">
                <label for="country">Country</label>
                <select name="country" id="country">
                    @foreach ($countries as $country)
                    <option value="{{$country->id}}" {{$user->country==$country->id?'selected':''}}>{{$country->name}}</option>
                    @endforeach
                </select>
                
            </div>
            @error('country')
                    <span class="error-message">{{$message}}</span>
                @enderror

                <div class="state input-title">
                    <label for="State">State</label>
                    <select name="state" id="state">
                        @foreach ($states as $state)
                            <option value="{{$state->id}}" {{$user->state==$state->id?'selected':''}}>{{$state->name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('state')
                        <span class="error-message">{{$message}}</span>
                    @enderror
        
        <div class="city input-title">
            <label for="City">City</label>
            <select name="city" id="city">
                @foreach ($cities as $city)
                        <option value="{{$city->id}}" {{$user->city==$city->id?'selected':''}}>{{$city->name}}</option>
                @endforeach
               
            </select>
            
        </div>
        @error('city')
                <span class="error-message">{{$message}}</span>
            @enderror


        <?php 
        $hb = is_string($user->hobby) ? explode(',', $user->hobby) : [];
        ?>
       <div class="hobby input-title">
        <label for="Hobby">Hobby</label>
        <label>
            <input type="checkbox" name="hobby[]" value="Cricket" {{ in_array('Cricket', $hb) ? 'checked' : '' }}>Cricket
        </label>
        <label>
            <input type="checkbox" name="hobby[]" value="Football" {{ in_array(' Football', $hb) ? 'checked' : '' }}>Football
        </label>
        <label>
            <input type="checkbox" name="hobby[]" value="Vollyball" {{ in_array(' Vollyball', $hb) ? 'checked' : '' }}>Vollyball
        </label>
        @error('hobby')
        <script>
            alert("{{ e($message) }}");
        </script>
        @enderror
    </div>
        
        <div class="editbtn">
            <button type="submit" class="editupdate">Update</button>
        </div>
        
    </form>
    </div>
</body>
</html>
