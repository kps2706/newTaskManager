@extends('layouts.app')
@section('main_content')
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="activity"></i></div>
                            Dashboard
                        </h1>
                        <div class="page-header-subtit le">Overview of system activity, user engagement, and reported incidents.</div>
                    </div>
                    {{-- <div class="col-12 col-xl-auto mt-4">
                        <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                            <span class="input-group-text"><i class="text-primary" data-feather="calendar"></i></span>
                            <input class="form-control ps-0 pointer" id="litepickerRangePlugin" placeholder="Select date range..." />
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </header>

    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">

        {{-- First Row Data tiles --}}
        {{-- <div class="row">
            <div class="col-xxl-4 col-xl-12 mb-4">
                <div class="card h-100">
                    <div class="card-body h-100 p-5">
                        <div class="row align-items-center">
                            <div class="col-xl-8 col-xxl-12">
                                <div class="text-center text-xl-start text-xxl-center mb-4 mb-xl-0 mb-xxl-4">
                                    <h1 class="text-primary">Welcome to SB Admin Pro!</h1>
                                    <p class="text-gray-700 mb-0">Browse our fully designed UI toolkit! Browse our prebuilt app pages, components, and utilites, and be sure to look at our full documentation!</p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-xxl-12 text-center"><img class="img-fluid" src="assets/img/illustrations/at-work.svg" style="max-width: 26rem" /></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-6 mb-4">
                <div class="card card-header-actions h-100">
                    <div class="card-header">
                        Recent Activity
                        <div class="dropdown no-caret">
                            <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="text-gray-500" data-feather="more-vertical"></i></button>
                            <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="dropdownMenuButton">
                                <h6 class="dropdown-header">Filter Activity:</h6>
                                <a class="dropdown-item" href="#!"><span class="badge bg-green-soft text-green my-1">Commerce</span></a>
                                <a class="dropdown-item" href="#!"><span class="badge bg-blue-soft text-blue my-1">Reporting</span></a>
                                <a class="dropdown-item" href="#!"><span class="badge bg-yellow-soft text-yellow my-1">Server</span></a>
                                <a class="dropdown-item" href="#!"><span class="badge bg-purple-soft text-purple my-1">Users</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="timeline timeline-xs">
                            <!-- Timeline Item 1-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">27 min</div>
                                    <div class="timeline-item-marker-indicator bg-green"></div>
                                </div>
                                <div class="timeline-item-content">
                                    New order placed!
                                    <a class="fw-bold text-dark" href="#!">Order #2912</a>
                                    has been successfully placed.
                                </div>
                            </div>
                            <!-- Timeline Item 2-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">58 min</div>
                                    <div class="timeline-item-marker-indicator bg-blue"></div>
                                </div>
                                <div class="timeline-item-content">
                                    Your
                                    <a class="fw-bold text-dark" href="#!">weekly report</a>
                                    has been generated and is ready to view.
                                </div>
                            </div>
                            <!-- Timeline Item 3-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">2 hrs</div>
                                    <div class="timeline-item-marker-indicator bg-purple"></div>
                                </div>
                                <div class="timeline-item-content">
                                    New user
                                    <a class="fw-bold text-dark" href="#!">Valerie Luna</a>
                                    has registered
                                </div>
                            </div>
                            <!-- Timeline Item 4-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">1 day</div>
                                    <div class="timeline-item-marker-indicator bg-yellow"></div>
                                </div>
                                <div class="timeline-item-content">Server activity monitor alert</div>
                            </div>
                            <!-- Timeline Item 5-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">1 day</div>
                                    <div class="timeline-item-marker-indicator bg-green"></div>
                                </div>
                                <div class="timeline-item-content">
                                    New order placed!
                                    <a class="fw-bold text-dark" href="#!">Order #2911</a>
                                    has been successfully placed.
                                </div>
                            </div>
                            <!-- Timeline Item 6-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">1 day</div>
                                    <div class="timeline-item-marker-indicator bg-purple"></div>
                                </div>
                                <div class="timeline-item-content">
                                    Details for
                                    <a class="fw-bold text-dark" href="#!">Marketing and Planning Meeting</a>
                                    have been updated.
                                </div>
                            </div>
                            <!-- Timeline Item 7-->
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">2 days</div>
                                    <div class="timeline-item-marker-indicator bg-green"></div>
                                </div>
                                <div class="timeline-item-content">
                                    New order placed!
                                    <a class="fw-bold text-dark" href="#!">Order #2910</a>
                                    has been successfully placed.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4 col-xl-6 mb-4">
                <div class="card card-header-actions h-100">
                    <div class="card-header">
                        Progress Tracker
                        <div class="dropdown no-caret">
                            <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="text-gray-500" data-feather="more-vertical"></i></button>
                            <div class="dropdown-menu dropdown-menu-end animated--fade-in-up" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#!">
                                    <div class="dropdown-item-icon"><i class="text-gray-500" data-feather="list"></i></div>
                                    Manage Tasks
                                </a>
                                <a class="dropdown-item" href="#!">
                                    <div class="dropdown-item-icon"><i class="text-gray-500" data-feather="plus-circle"></i></div>
                                    Add New Task
                                </a>
                                <a class="dropdown-item" href="#!">
                                    <div class="dropdown-item-icon"><i class="text-gray-500" data-feather="minus-circle"></i></div>
                                    Delete Tasks
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="small">
                            Server Migration
                            <span class="float-end fw-bold">20%</span>
                        </h4>
                        <div class="progress mb-4"><div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div></div>
                        <h4 class="small">
                            Sales Tracking
                            <span class="float-end fw-bold">40%</span>
                        </h4>
                        <div class="progress mb-4"><div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div></div>
                        <h4 class="small">
                            Customer Database
                            <span class="float-end fw-bold">60%</span>
                        </h4>
                        <div class="progress mb-4"><div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div></div>
                        <h4 class="small">
                            Payout Details
                            <span class="float-end fw-bold">80%</span>
                        </h4>
                        <div class="progress mb-4"><div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div></div>
                        <h4 class="small">
                            Account Setup
                            <span class="float-end fw-bold">Complete!</span>
                        </h4>
                        <div class="progress"><div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div></div>
                    </div>
                    <div class="card-footer position-relative">
                        <div class="d-flex align-items-center justify-content-between small text-body">
                            <a class="stretched-link text-body" href="#!">Visit Task Center</a>
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Example Colored Cards for Dashboard Demo-->
        <div class="row">
            <div class="col-lg-6 col-xl-3 mb-4">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="text-white-75 small">Total Users</div>
                                <div class="text-lg fw-bold">{{$totalUsers}}</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="users"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="{{route('user.index')}}">View Details</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 mb-4">
                <div class="card bg-warning text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="text-white-75 small">Total Incidents</div>
                                <div class="text-lg fw-bold">{{$totalIncidents}}</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="flag"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="{{route('issue.index')}}">View Details</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 mb-4">
                <div class="card bg-success text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="text-white-75 small">Overdue Incidents</div>
                                <div class="text-lg fw-bold">{{$overdueCount}}</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="check-square"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="{{route('issue.index')}}">View Details</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 mb-4">
                <div class="card bg-danger text-white h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="text-white-75 small">Pending Requests</div>
                                <div class="text-lg fw-bold">17</div>
                            </div>
                            <i class="feather-xl text-white-50" data-feather="message-circle"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="text-white stretched-link" href="{{route('issue.index')}}">View Requests</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Example DataTable for Dashboard Demo-->
        <div class="card mb-4">
            <div class="card-header">Recent Incident</div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Module</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>Module</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </tfoot>
                    <tbody>
                         @foreach ($recentIncidents as $incident)
                            <tr>
                                <td>{{ $incident->title }}</td>
                                <td>{{ $incident->module->name ?? 'N/A' }}</td>
                                <td>
                                    <span class="badge bg-{{ $incident->status == 'resolved' ? 'success' : 'warning text-dark' }}">
                                        {{ ucfirst($incident->status) }}
                                    </span>
                                </td>
                                <td>{{ $incident->created_at->format('d M Y') }}</td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</main>


@endsection
