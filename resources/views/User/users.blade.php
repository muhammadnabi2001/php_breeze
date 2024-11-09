@extends('Layout.main')

@section('title', 'Users')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            @if (session('delete'))
            <div class="alert alert-danger" role="alert">
                {{ session('delete') }}
            </div>
            @endif
            @if (session('update'))
            <div class="alert alert-info" role="alert">
                {{ session('update') }}
            </div>
            @endif
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-6 mt-2">
                    <a href="{{route('usercreate')}}" class="btn btn-primary">Create</a>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10">
                    <form action="" method="get" class="m-2">
                        @csrf
                        <input type="text" class="form-control" id="searchinput" name="search">
                </div>
                <div class="col-2">
                    <input type="submit" value="search" class="btn btn-outline-success m-2" name="ok">
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <!-- table-responsive qo'shildi -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="userTableBody">
                                @foreach($users as $user)
                                @if(!$user->roles->contains('name', 'admin'))
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <!-- Modalni ochuvchi tugma -->
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#roleModal{{ $user->id }}">
                                            Role
                                        </button>

                                        <!-- Modal oyna -->
                                        <div class="modal fade" id="roleModal{{ $user->id }}" tabindex="-1"
                                            aria-labelledby="roleModalLabel{{ $user->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="roleModalLabel{{ $user->id }}">User
                                                            Roles</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul class="list-group">
                                                            @foreach($user->roless as $role)
                                                            <li class="list-group-item">{{ $role->name }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td><a href="{{route('useredit',$user->id)}}" class="btn btn-success">Update</a></td>
                                    
                    <td><a href="{{route('userdelete',$user->id)}}" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endif
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>

        </div>
</div>
</section>
</div>
@endsection