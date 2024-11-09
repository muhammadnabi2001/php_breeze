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
                    <h1 class="m-0">Createuserpage</h1>
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
                        <form action="{{route('userstore')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">User name</label>
                                <input type="text" class="form-control" placeholder="input username"
                                    name="name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">User email</label>
                                <input type="email" class="form-control" placeholder="input user email"
                                    name="email">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Roles</label>
                                    <select name="roles[]" class="select2" multiple="multiple" data-placeholder="Select a Role" style="width: 100%;">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}">
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>            
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">User password</label>
                                <input type="password" class="form-control"
                                    placeholder="input user password" name="password">
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