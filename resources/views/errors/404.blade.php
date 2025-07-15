@extends('layouts.app')
@section('main_content')

{{-- Main content for 404 error page --}}
<main>
    <div class="container-xl px-4">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-center mt-4">
                    <img class="img-fluid p-4" src="{{asset('backend/sb-admin/assets/img/illustrations/404-error.svg')}}" alt="" />
                    <p class="lead">This requested URL was not found on this server.</p>
                    <a class="text-arrow-icon" href="{{ route('dashboard') }}">
                        <i class="ms-0 me-1" data-feather="arrow-left"></i>
                        Return to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
