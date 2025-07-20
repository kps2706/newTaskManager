@extends('layouts.app')

@section('main_content')

<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="file"></i></div>
                            Users List
                        </h1>
                        <div class="page-header-subtitle">Manage All your Users here..</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a class="btn btn-sm btn-light text-primary" href="{{route('user.create')}}">
                            <i class="me-1" data-feather="user-plus"></i>
                            Add New User
                        </a>
                    </div>
                </div>
            </div>
        </div>
</header>

    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="card">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Joined Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Joined Date</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    {{-- <div class="avatar me-2"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-1.png" /></div> --}}
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @php
                                    $role = $user->getRoleNames()->first();
                                    $roleColor = match($role) {
                                        'vendor' => 'yellow',
                                        'reporter' => 'blue',
                                        'admin' => 'red',
                                        'super_admin' => 'purple',
                                        default => 'secondary'
                                    };
                                @endphp

                                <span class="badge bg-{{ $roleColor }}-soft text-{{ $roleColor }}">
                                    {{ $role ? ucfirst(str_replace('_', ' ', $role)) : 'No Role' }}
                                </span>
                            </td>
                            <td>
                                @if (!$user->is_active)
                                    <span class="badge bg-danger-soft text-danger">Disabled</span>
                                @elseif (!$user->is_authorized)
                                    <span class="badge bg-warning-soft text-warning">Pending</span>
                                @else
                                    <span class="badge bg-success-soft text-success">Approved</span>
                                @endif
                            </td>
                            <td>{{ $user->created_at->format('d-m-Y') }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    {{-- Approve Button (only if pending and not disabled) --}}
                                    @if (!$user->is_authorized && $user->is_active)
                                        <form action="{{ route('admin.approve-user', $user->id) }}" method="POST" onsubmit="return confirm('Approve this user?');">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark" title="Approve User">
                                                <i data-feather="check-circle"></i>
                                            </button>
                                        </form>
                                    @endif

                                    {{-- Edit --}}
                                    @can('user-edit')
                                        <a class="btn btn-datatable btn-icon btn-transparent-dark" title="Edit user" href="{{ route('user.edit', $user->id) }}">
                                            <i data-feather="edit"></i>
                                        </a>
                                    @endcan

                                    {{-- Disable --}}
                                    @if ($user->is_authorized && $user->is_active)
                                        <form action="{{ route('admin.disable-user', $user->id) }}" method="POST" onsubmit="return confirm('Disable this user?');">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark" title="Disable User">
                                                <i data-feather="slash"></i>
                                            </button>
                                        </form>
                                    @elseif(!$user->is_active)
                                        <form action="{{ route('admin.enable-user', $user->id) }}" method="POST" onsubmit="return confirm('Enable this user?');">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark" title="Enable User">
                                                <i data-feather="tick"></i>
                                            </button>
                                        </form>
                                    @endif
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
