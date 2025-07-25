@extends('layouts.app')

@section('main_content')

<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="user-plus"></i></div>
                            Edit User
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="{{route('user.index')}}">
                            <i class="me-1" data-feather="arrow-left"></i>
                            Back to Users List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-4">
        <div class="row">
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update', $user->id)}}">
                            @method('PUT')
                        @csrf

                            <!-- Form Row-->
                                <!-- Form Group (first name)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="name">Full Name</label>
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Enter your Full Name" value="{{$user->name}}" />
                                </div>
                                <!-- Form Group (last name)-->
                               <div class="mb-3">
                                    <label class="small mb-1" for="email">Email Address</label>
                                    <input class="form-control" id="email" name="email" type="text" placeholder="Enter your Email Address" value="{{$user->email}}" />
                                </div>
                                <div class="mb-3">
                                <label class="small mb-1">Role</label>
                                    <select class="form-select" aria-label="Default select example" name="roles[]" id="roles">
                                        @php
                                            $currentRole = $user->getRoleNames()->first();  // 🔁 Get user's Spatie-assigned role
                                        @endphp
                                        <option disabled>Select a role:</option>
                                        <option value="reporter" {{ $currentRole == 'reporter' ? 'selected' : '' }}>Reporter</option>
                                        <option value="admin" {{ $currentRole == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="vendor" {{ $currentRole == 'vendor' ? 'selected' : '' }}>Vendor</option>
                                        <option value="super_admin" {{ $currentRole == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                                    </select>
                                </div>

                            <!-- Submit button-->
                            <button class="btn btn-primary" type="submit">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
