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
                    Issues List
                </h1>
                <div class="page-header-subtitle">All Issue realetd to project and binded with task are litsted here..</div>
            </div>
            <div class="col-12 col-xl-auto mt-4">
                <a class="btn btn-sm btn-light text-primary" href="{{route('issue.create')}}">
                    <i class="me-1" data-feather="flag"></i>
                    Report New Issue
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
                            <th>#</th>
                            <th>Module</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Priority</th>
                            <th>Status</th>
                            {{-- <th>Close Date</th> --}}
                            <th>Issue Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Module</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Priority</th>
                            <th>Status</th>
                            {{-- <th>Close Date</th> --}}
                            <th>Issue Date</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($issues as $key => $issue)
                        <tr>
                            <td>{{ $key + 1}} </td>
                            <td>{{$issue->module->name ?? 'N/A'}}</td>
                            <td> {{ $issue->title }} </td>
                            <td>{{ $issue->description }}</td>
                            <td>
                            @switch($issue->priority)
                                @case('low')
                                    <span class="badge bg-yellow-soft text-yellow">Low</span>
                                    @break
                                @case('medium')
                                    <span class="badge bg-blue-soft text-blue">Medium</span>
                                    @break
                                @case('high')
                                    <span class="badge bg-red-soft text-red">High</span>
                                    @break
                                @case('critical')
                                    <span class="badge bg-purple-soft text-purple">Critical</span>
                                    @break
                                @default
                                    <span class="badge bg-secondary">Unknown</span>
                            @endswitch
                            </td>
                            <td>
                                @php
                                    $statusLabels = [
                                        'new' => ['label' => 'New', 'class' => 'badge bg-secondary'],
                                        'assigned' => ['label' => 'Assigned', 'class' => 'badge bg-primary'],
                                        'in_progress' => ['label' => 'In Progress', 'class' => 'badge bg-warning text-dark'],
                                        'resolved' => ['label' => 'Resolved', 'class' => 'badge bg-info'],
                                        'closed' => ['label' => 'Closed', 'class' => 'badge bg-success'],
                                    ];
                                    $status = $issue->status;
                                @endphp
                                <span class="{{ $statusLabels[$status]['class'] ?? 'badge bg-light text-dark' }}">
                                    {{ $statusLabels[$status]['label'] ?? ucfirst($status) }}
                                </span>
                            </td>
                           {{-- <td>{{ $issue->closed_date ? \Carbon\Carbon::parse($issue->closed_date)->format('d-m-Y') : 'Not Closed' }}</td> --}}
                            <td>{{ \Carbon\Carbon::parse($issue->reported_date)->format('d-m-Y') }}</td>
                            <td>
                             <div class="d-flex align-items-center gap-2">
                                <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" title="Edit user" href="{{route('issue.edit', $issue->id)}}"><i data-feather="edit"></i></a>
                                @role('super_admin')
                                <form action="{{ route('issue.destroy', $issue->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this issue?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark" title="Delete issue"><i data-feather="trash-2"></i></button>
                                </form>
                                @endrole
                                <a class="btn btn-datatable btn-icon btn-transparent-dark me-2"
                                title="Add/View Comments"
                                href="{{ route('issue.show', $issue->id) }}">
                                    <i data-feather="message-circle"></i>
                                </a>
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
