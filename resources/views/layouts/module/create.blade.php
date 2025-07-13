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
                            Add Module
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="{{route('module.index')}}">
                            <i class="me-1" data-feather="arrow-left"></i>
                            Back to Modules List
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
                    <div class="card-header">Module Details</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('module.store')}}">
                        @csrf
                            <!-- Form Row-->
                                <!-- Form Group (first name)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="name">Module Name</label>
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Enter your Full Name" value="" />
                                </div>
                            <!-- Submit button-->
                            <button class="btn btn-primary" type="submit">Add Module</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection