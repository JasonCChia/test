@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @session('status')
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endsession

                <div class="card">
                    <div class="card-header">
                        <h4>Category List
                            <a href="{{ url('category/create') }}" class="btn btn-primary float-end">add category</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>

                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>{{ $category->status == 1 ? 'Visible' : 'Hidden' }}</td>
                                        <td>
                                            <a class="btn btn-success"
                                                href="{{ route('category.edit', $category->id) }}">Edit</a>
                                            <a class="btn btn-info"
                                                href="{{ route('category.show', $category->id) }}">Show</a>
                                            <form class="d-inline" action="{{ route('category.destroy', $category->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" href="">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
