@extends('layouts.app')

@section('main_content')

<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="user"></i></div>
                            Permission List
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="{{route('permission.create')}}">
                            <i class="me-1" data-feather="user-plus"></i>
                            Add New Permission
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                     @endif
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Permission Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Permission Name</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($permissions as $key => $permission)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    {{-- <div class="avatar me-2"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-1.png" /></div> --}}
                                    {{ $key +1 }}
                                </div>
                            </td>
                            <td>{{ $permission->name }}</td>
                            <td>
                            <div class="d-flex align-items-center gap-2">
                                <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" title="Edit permission" href="{{route('permission.edit', $permission->id)}}"><i data-feather="edit"></i></a>
                                <form action="{{ route('permission.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this permission?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark" title="Delete permission"><i data-feather="trash-2"></i></button>
                                </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@endsection
