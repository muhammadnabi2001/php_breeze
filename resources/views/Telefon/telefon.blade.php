@extends('Layout.main')

@section('title', 'Telefonlar')

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
                    <h1 class="m-0">Telefonlar</h1>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-6 mt-2">
                    <a href="/telefoncreate" class="btn btn-primary">Create</a>
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
                    <div class="table-responsive"> <!-- table-responsive qo'shildi -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Model</th>
                                    <th>Color</th>
                                    <th>Price</th>
                                    <th>Count</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody id="userTableBody">
                                @foreach($telefonlar as $telefon)
                                <tr>
                                    <td>{{ $telefon->id }}</td> 
                                    <td>{{ $telefon->model }}</td> 
                                    <td>{{ $telefon->color }}</td>
                                    <td>{{ $telefon->price }}</td>
                                    <td>{{ $telefon->count }}</td>
                                    <td><a href="{{route('telefonedit',$telefon->id)}}" class="btn btn-success">Update</a></td>
                                    <td><a href="{{route('telefondelete',$telefon->id)}}" class="btn btn-danger">Delete</a></td>
                                </tr>
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