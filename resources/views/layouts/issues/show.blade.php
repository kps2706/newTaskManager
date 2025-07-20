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
                            Issue Detail View
                        </h1>
                        <div class="page-header-subtitle">View the complete updates of Issue here...</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a class="btn btn-sm btn-light text-primary" href="{{route('issue.edit', $issue->id)}}">
                            <i class="me-1" data-feather="edit"></i>
                            Edit Incident
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
                <div class="card">
                    <div class="card-header">Issue Details</div>
                    <div class="card-body">
                        <p><strong>Module:</strong> {{ $issue->module->name ?? '-' }}</p>
                        <p><strong>Title:</strong> {{ $issue->title }}</p>
                        <p><strong>Description:</strong> {{ $issue->description }}</p>
                        <p><strong>Reported By:</strong> {{ $issue->reporter->name ?? '-' }}</p>
                        <p><strong>Priority:</strong> {{ $issue->priority }}</p>
                        <p><strong>Status:</strong> {{ $issue->status }}</p>
                        <p><strong>Issue Date:</strong> {{ $issue->reported_date->format('d M Y') }}</p>
                    </div>
                    <div class="card-footer">
                        <h5 class="mb-3">Add Comment</h5>
                          <form action="{{ route('issue.comments.store', $issue->id) }}" method="POST">
                            @csrf
                            <div class="form-group mb-2">
                                <textarea name="comment" class="form-control" rows="4" required placeholder="Write your comment..."></textarea>
                            </div>

                            @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('super_admin'))
                            <div class="form-group mb-3">
                                <label>Visibility</label>
                                <select name="visibility" class="form-select">
                                    <option value="public">Public</option>
                                    <option value="internal">Internal</option>
                                </select>
                            </div>
                            @else
                                <input type="hidden" name="visibility" value="public">
                            @endif

                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                            <a href="{{ route('issue.index') }}" class="btn btn-secondary">Cancel</a>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4">
                <div class="card">
                    <div class="card-header">Communication History</div>
                    <div class="card-body">

                    <div class="timeline timeline-xs mt-4">
                        @forelse ($issue->comments->sortByDesc('created_at') as $comment)
                            @php
                                $user = auth()->user();
                                $isVendor = $user->hasRole('vendor');
                                $canView = !$isVendor || ($isVendor && $comment->visibility === 'public');
                            @endphp

                            @if($canView)
                            <div class="timeline-item">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-text">{{ $comment->created_at->diffForHumans() }}</div>
                                    <div class="timeline-item-marker-indicator bg-primary"></div>
                                </div>
                                <div class="timeline-item-content">
                                    <strong>{{ $comment->user->name }}</strong>: {{ $comment->comment }}

                                    @if($comment->visibility === 'internal')
                                        <span class="badge bg-warning text-dark ms-2">Internal</span>
                                    @else
                                        <span class="badge bg-success ms-2">Public</span>
                                    @endif
                                </div>
                            </div> {{-- ❗ Moved @endif outside timeline-item-content --}}
                            @endif
                        @empty
                            <div class="text-muted">No comments yet.</div>
                        @endforelse
                    </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</main>

@endsection
