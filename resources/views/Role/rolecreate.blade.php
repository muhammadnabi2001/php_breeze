@extends('Layout.main')

@section('title', 'Ingredients')

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
                    <h1 class="m-0">Createrolepage</h1>
                </div>
            </div>
            <div class="row mb-2">

            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-5">
                    <div class="table-responsive">
                        <!-- table-responsive qo'shildi -->
                        <form action="/rolestore" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Rolename</label>
                                <input type="text" class="form-control" placeholder="Input role name" name="name">
                            </div>
                        
                            <div class="permissions-section m-2">
                                @foreach ($permissiongroup as $group)
                                    <div class="permission-group mb-4">
                                        <h5>{{ $group->name }}</h5> <!-- PermissionGroup nomi -->
                                        
                                        @foreach ($group->permissions as $permission)
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="permissions[]" value="{{ $permission->id }}" id="permission-{{ $permission->id }}">
                                                <label class="form-check-label" for="permission-{{ $permission->id }}">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection