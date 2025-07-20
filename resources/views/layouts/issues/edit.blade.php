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
                            Edit Incident
                        </h1>
                        <div class="page-header-subtitle">Manage All your Users here..</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a class="btn btn-sm btn-light text-primary" href="{{route('module.index')}}">
                        <i class="me-1" data-feather="users"></i>
                            Manage Module
                        </a>
                        <a class="btn btn-sm btn-light text-primary" href="{{route('issue.index')}}">
                            <i class="me-1" data-feather="arrow-left"></i>
                            Back to Incident List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-xxl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Modify Incident</div>
                    <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops! Something went wrong.</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form method="POST" action="{{ route('issue.update', $issue_for_edit->id)}}">
                        @csrf
                        @method('put')
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                            <div class="col-md-4">
                            <label class="small mb-1">Module</label>
                                    <select class="form-select" aria-label="Default select example" name="module_id" id="module_id">
                                        <option selected disabled>Select a Module:</option>
                                        @foreach($modules as $module)
                                        <option value="{{ $module->id }}" {{ $issue_for_edit->module_id == $module->id ? 'selected' : '' }}>{{ $module->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                            <div class="col-md-8">
                                    <label class="small mb-1" for="title">Incident Title</label>
                                    <input class="form-control" id="title" name="title" type="text" placeholder="Enter your Incident Title" value="{{$issue_for_edit->title}}" />
                                </div>
                            </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="description">Incident Description</label>
                                    <textarea class="lh-base form-control" type="text" placeholder="Enter Incident description..." rows="4" id="description" name="description">{{$issue_for_edit->description}}</textarea>
                                </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                <label class="small mb-1">Priority</label>
                                    <select class="form-select" aria-label="Default select example" name="priority" id="priority">
                                        <option selected disabled>Select a Priority:</option>
                                        <option value="Low" {{ $issue_for_edit->priority == 'low' ? 'selected' : '' }}>Low</option>
                                        <option value="Medium" {{ $issue_for_edit->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                                        <option value="High" {{ $issue_for_edit->priority == 'high' ? 'selected' : '' }}>High</option>
                                        <option value="Critical" {{ $issue_for_edit->priority == 'critical' ? 'selected' : '' }}>Critical</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1">Status</label>
                                    <select class="form-select" aria-label="Default select example" name="status" id="status">
                                        <option selected disabled>Select a status:</option>
                                        <option value="new" {{$issue_for_edit->status == 'new' ? 'selected' : '' }}>New</option>
                                        <option value="assigned" {{$issue_for_edit->status == 'assigned' ? 'selected' : '' }}>Assigned</option>
                                        <option value="in_progress" {{$issue_for_edit->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="resolved" {{$issue_for_edit->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                                        <option value="closed" {{$issue_for_edit->status == 'resolved' ? 'closed' : '' }}>Closed</option>
                                    </select>
                                </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                <div class="col-md-6">

                                    <label class="small mb-1" for="reported_date">Reported Date</label>
                                    <input class="form-control" id="reported_date" name="reported_date" type="date" value="{{ $issue_for_edit->reported_date ? $issue_for_edit->reported_date->format('Y-m-d') : '' }}" />

                                </div>
                                 <div class="col-md-6">
                                    <label class="small mb-1" for="closed_date">Close Date</label>
                                    <input class="form-control" id="closed_date" name="closed_date" type="date" value="{{ $issue_for_edit->closed_date ? $issue_for_edit->closed_date->format('Y-m-d') : '' }}" />
                                 </div>

                                </div>


                            <!-- Submit button-->
                            <button class="btn btn-primary" type="submit">Save</button>
                            <a href="{{ route('issue.index') }}" class="btn btn-secondary">Cancel</a>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4">
                <div class="card">
                    <div class="card-header">Status Timeline</div>
                    <div class="card-body">
                        <div class="timeline timeline-xs mt-4">
                            @forelse ($issue_for_edit->statusLogs->sortByDesc('created_at') as $log)
                                <div class="timeline-item">
                                    <div class="timeline-item-marker">
                                        <div class="timeline-item-marker-text">{{ $log->created_at->diffForHumans() }}</div>
                                        <div class="timeline-item-marker-indicator bg-info"></div>
                                    </div>
                                        @php
                                            $data = $log->additional_data;
                                            $user = \App\Models\User::find($data['changed_by'] ?? null);
                                        @endphp
                                    <div class="timeline-item-content">
                                        <strong>{{ $user->name ?? 'System' }}</strong>
                                        changed status to
                                        <span class="badge bg-primary">{{ Str::title(str_replace('_', ' ', $log->status)) }}</span>

                                        {{-- Optional assignee info --}}
                                        {{-- Optional vendor info --}}
                                        @if($log->status === 'assigned' && isset($data['vendor_id']))
                                            <span class="text-muted ms-2">→ Assigned to Vendor ID: {{ $data['vendor_id'] }}</span>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div class="text-muted">No status changes yet.</div>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

@endsection
