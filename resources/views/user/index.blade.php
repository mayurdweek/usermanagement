<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Users</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="posts">
        <h1>All Users</h1>
        <a href="{{ route('users.create') }}">Create New Post</a>
        <form action="{{ route('user.logout') }}" method="post" style="display: inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
        <form action="{{ route('users.importdata') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" accept=".csv" required>
            <button type="submit" class="btn btn-success">Import CSV</button>
        </form>
        

        @if(session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        <a href="{{ route('users.exportuser') }}" class="btn btn-primary">Export Users to CSV</a>

        <table id="usersTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Profile</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                    <th>Gender</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Hobby</th>
                    <th class="action">Actions</th>
                </tr>
            </thead>
        </table>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('users.data') !!}', // Laravel route to fetch data
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'image', name: 'image', orderable: false, searchable: false, render:function(data,type,row){
                        return `<img src="${data}" alt="Image" style="width:50px;height:50px;object-fit:cover;">`;
                    } },
                    { data: 'email', name: 'email' },
                    { data: 'mobile', name: 'mobile' },
                    { data: 'gender', name: 'gender' },
                    { data: 'country', name: 'country' },
                    { data: 'state', name: 'state' },
                    { data: 'city', name: 'city' },
                    { data: 'hobby', name: 'hobby' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ],
                initComplete:function(){
                    $('.dataTables_filter').css('margin-bottom','2rem');
                    $('.display').css('width','90rem')
                }
            });
        });
    </script>
</body>
</html>
