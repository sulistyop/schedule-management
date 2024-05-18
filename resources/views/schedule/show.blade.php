@extends('layouts.app')

@section('back-button')
    <a href="{{ redirect()->back() }}" class="btn btn-outline-secondary rounded-circle text-decoration-none">
        <i class="fas fa-angle-left text-black"></i>
    </a>
@endsection

@section('page-title')
    {{__('Schedule Detail') }}
@endsection

@section('content')
    <div class="container">
        <div class="card border-0 w-75 mx-auto">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="text-center">
                            <img src="{{ asset('images/cloud-building.svg') }}" alt="storage_logo" style="width: 100px; height: 100px;">
                        </div>
                    </div>
                    <div class="col-8">
                        <h5>Server: {{ $backupSchedule->backup_server }}</h5>
                        <div class="row">
                            <div class="col-6">
                                <table>
                                    <tr>
                                        <td>Method</td>
                                        <td>:</td>
                                        <td>{{ $backupSchedule->backup_method }}</td>
                                    </tr>
                                    <tr>
                                        <td>Last Execution</td>
                                        <td>:</td>
                                        <td>{{ $backupSchedule->updated_at ? $backupSchedule->updated_at->diffForHumans() : 'Never' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Schedule</td>
                                        <td>:</td>
                                        <td>{{ $backupSchedule->schedule_time }}</td>
                                    </tr>
                                    <tr>
                                        <td>Storage</td>
                                        <td>:</td>
                                        <td>{{ $backupSchedule->storage_name }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-6">
                                <table>
                                    <tr>
                                        <td>Compression</td>
                                        <td>:</td>
                                        <td>{{ $backupSchedule->use_compression === true ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Encryption</td>
                                        <td>:</td>
                                        <td>{{ $backupSchedule->use_encryption === true ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Backup Name Template</td>
                                        <td>:</td>
                                        <td>{{ $backupSchedule->schedule_time }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="m-2">
                            <a href="{{ route('schedule.edit', $backupSchedule->id) }}" class="btn btn-warning">Edit</a>
                            <form id="deleteForm{{ $backupSchedule->id }}" action="{{ route('schedule.destroy', $backupSchedule->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger delete-btn" data-id="{{ $backupSchedule->id }}">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const scheduleId = this.getAttribute('data-id');
                    if (confirm('Are you sure you want to delete this schedule?')) {
                        const form = document.getElementById('deleteForm' + scheduleId);
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
