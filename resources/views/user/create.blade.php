<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="createpost">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>Create Post</h1>

        
        

        
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" class="edit-form">
            @csrf
            @method('post')

            <div class="input-title">
                <label for="Profile Pic">Profile Pic</label>
                <input type="file" name="profile" id="image" accept=".jpg,.jpeg,.png,.svg" required>
            </div>
            @error('profile')
            <span class="error-message">{{ $message }}</span>
            @enderror

            <div class="input-title">
                <label for="files">Choose Files (only PDF DOC)</label>
                <input type="file" name="files[]" accept=".pdf,.docx,.doc" multiple>
            </div>

             <div class="input-title">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="input-title">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            @error('email')
                <span class="error-message">{{ $message }}</span>
                @enderror

           
            <div class="password input-title">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            @error('password')
                <span class="error-message">{{ $message }}</span>
                @enderror

            
            <div class="mobileno input-title">
                <label for="mobile">Mobile No:</label>
                <input type="text" name="mobile" id="mobile" required>
            </div>
            @error('mobile')
                <span class="error-message">{{$message}}</span>
                @enderror
            
            <div class="gender input-title">
                <label for="gender">Gender:</label>
                <input type="radio" name="gender" id="gender_male" value="male" class="radio" required>
                <label for="gender_male">Male</label>
                <input type="radio" name="gender" id="gender_female" value="female" class="radio">
                <label for="gender_female">Female</label>
            </div>
            @error('gender')
                <span class="error-message">{{$message}}</span>
            @enderror

            <div class="country input-title">
                <label for="country">Country:</label>
                <select name="country" id="country">
                    @foreach ($contries as $C)
                    <option value={{$C->id}}>{{$C->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="state input-title">
                <label for="state">State</label>
                <select name="state" id="state">
                
                </select>
            </div>
            <div class="city input-title">
                <label for="city">City:</label>
                <select name="city" id="city">
                    
                </select>
            </div>
            @error('city')
                    <span class="error-message">{{$message}}</span>
                    @enderror

            <div class="hobby input-title">
                <label for="hobby">Hobby:</label>
                <input type="checkbox" name="hobby[]" id="hobby_cricket" value="Cricket" class="check">
                <label for="hobby_cricket">Cricket</label>
                <input type="checkbox" name="hobby[]" id="hobby_football" value="Football" class="check">
                <label for="hobby_football">Football</label>
                <input type="checkbox" name="hobby[]" id="hobby_vollyball" value="Vollyball" class="check">
                <label for="hobby_vollyball">Vollyball</label>
            </div>
                @error('hobby')
                <span class="error-message">{{$message}}</span>
                @enderror


            <!-- Submit Button -->
            <div class="createbtn">
                <button type="submit" class="createbutton">Create</button>
            </div> 
        </form>
    </div>
</body>
</html>
