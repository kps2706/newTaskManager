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
                            Issue List
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a class="btn btn-sm btn-light text-primary" href="{{route('issue.create')}}">
                            <i class="me-1" data-feather="user-plus"></i>
                            Report New Issue
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
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Module</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Due Date</th>
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
                            <th>Due Date</th>
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
                            <td>{{ \Carbon\Carbon::parse($issue->sla_due_date)->format('d-m-Y')}} </td>
                            <td>{{ \Carbon\Carbon::parse($issue->reported_date)->format('d-m-Y') }}</td>
                            <td>
                             <div class="d-flex align-items-center gap-2">
                                <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" title="Edit user" href="{{route('issue.edit', $issue->id)}}"><i data-feather="edit"></i></a>
                                <form action="{{ route('issue.destroy', $issue->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this issue?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark" title="Delete issue"><i data-feather="trash-2"></i></button>
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
