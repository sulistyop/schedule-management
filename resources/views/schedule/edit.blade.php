@extends('layouts.app')

@section('back-button')
    <a href="{{ route('schedule.index') }}" class="btn btn-outline-secondary rounded-circle text-decoration-none">
        <i class="fas fa-angle-left text-black"></i>
    </a>
@endsection

@section('page-title')
    {{__('Schedule Edit') }}
@endsection

@section('back-button')
    <a href="{{ back() }}" class="btn btn-outline-secondary rounded-circle text-decoration-none">
        <i class="fas fa-angle-left text-black"></i>
    </a>
@endsection

@section('badge-process')
    <div class="badge badge-custom bg-green-light small">Running</div>
@endsection

@section('content')
    <div class="container">
        <div class="mx-auto w-50">
            <form action="{{ route('schedule.update', $backupSchedule->id) }}" method="post">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label for="schedule_name" class="form-label">Schedule Name</label>
                    <input type="text" class="form-control @error('schedule_name') is-invalid @enderror" id="schedule_name" name="schedule_name" value="{{ old('schedule_name', $backupSchedule->schedule_name) }}" required>
                    @error('schedule_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="backup_server" class="form-label">Backup Server</label>
                    <input type="text" class="form-control @error('backup_server') is-invalid @enderror" id="backup_server" name="backup_server" value="{{ old('backup_server', $backupSchedule->backup_server) }}" required>
                    @error('backup_server')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="backup_method" class="form-label">Backup Method</label>
                    <select class="form-select @error('backup_method') is-invalid @enderror" id="backup_method" name="backup_method" required>
                        <option value="">Select Backup Method</option>
                        <option value="full" {{ old('backup_method', $backupSchedule->backup_method) == 'full' ? 'selected' : '' }}>Full</option>
                        <option value="incremental" {{ old('backup_method', $backupSchedule->backup_method) == 'incremental' ? 'selected' : '' }}>Incremental</option>
                    </select>
                    @error('backup_method')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="backup_type" class="form-label">Backup Type</label>
                    <select class="form-select @error('backup_type') is-invalid @enderror" id="backup_type" name="backup_type" required>
                        <option value="">Select Backup Type</option>
                        <option value="file" {{ old('backup_type', $backupSchedule->backup_type) == 'file' ? 'selected' : '' }}>File</option>
                        <option value="image" {{ old('backup_type', $backupSchedule->backup_type) == 'image' ? 'selected' : '' }}>Image</option>
                    </select>
                    @error('backup_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="enable_pitr" name="enable_pitr" {{ old('enable_pitr', $backupSchedule->enable_pitr) ? 'checked' : '' }}>
                    <label class="form-check-label" for="enable_pitr">Enable PITR</label>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="backup_per_file" name="backup_per_file" {{ old('backup_per_file', $backupSchedule->backup_per_file) ? 'checked' : '' }}>
                    <label class="form-check-label" for="backup_per_file">Backup a database per file</label>
                </div>

                <div class="mb-3">
                    <label for="storage_name" class="form-label">Storage Name</label>
                    <input type="text" class="form-control @error('storage_name') is-invalid @enderror" id="storage_name" name="storage_name" value="{{ old('storage_name', $backupSchedule->storage_name) }}" required>
                    @error('storage_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="storage_directory">Storage Directory</label>
                    <input type="text" class="form-control" id="storage_directory" name="storage_directory" value="{{ old('storage_directory', $backupSchedule->storage_directory) }}" required>
                    <small id="storage_directory_help" class="form-text text-muted">Enter a valid directory path.</small>
                    @error('storage_directory')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="retention_policy_type" class="form-label">Retention Policy Type</label>
                    <select class="form-select @error('retention_policy_type') is-invalid @enderror" id="retention_policy_type" name="retention_policy_type" required>
                        <option value="">Select Retention Policy Type</option>
                        <option value="type1" {{ old('retention_policy_type', $backupSchedule->retention_policy_type) == 'type1' ? 'selected' : '' }}>Type 1</option>
                        <option value="type2" {{ old('retention_policy_type', $backupSchedule->retention_policy_type) == 'type2' ? 'selected' : '' }}>Type 2</option>
                    </select>
                    @error('retention_policy_type')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="backup_name" class="form-label">Backup Name</label>
                    <input type="text" class="form-control @error('backup_name') is-invalid @enderror" id="backup_name" name="backup_name" value="{{ old('backup_name', $backupSchedule->backup_name) }}" required>
                    @error('backup_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="use_compression" name="use_compression" {{ old('use_compression', $backupSchedule->use_compression) ? 'checked' : '' }}>
                    <label class="form-check-label" for="use_compression">Use Compression</label>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="use_encryption" name="use_encryption" {{ old('use_encryption', $backupSchedule->use_encryption) ? 'checked' : '' }}>
                    <label class="form-check-label" for="use_encryption">Use Encryption</label>
                </div>

                <div class="mb-3">
                    <label for="backup_schedule_frequency" class="form-label">Backup Schedule Frequency</label>
                    <select class="form-select @error('backup_schedule_frequency') is-invalid @enderror" id="backup_schedule_frequency" name="backup_schedule_frequency" required>
                        <option value="">Select Backup Schedule Frequency</option>
                        <option value="hourly" {{ old('backup_schedule_frequency', $backupSchedule->backup_schedule_frequency) == 'hourly' ? 'selected' : '' }}>Hourly</option>
                        <option value="daily" {{ old('backup_schedule_frequency', $backupSchedule->backup_schedule_frequency) == 'daily' ? 'selected' : '' }}>Daily</option>
                        <option value="weekly" {{ old('backup_schedule_frequency', $backupSchedule->backup_schedule_frequency) == 'weekly' ? 'selected' : '' }}>Weekly</option>
                        <option value="monthly" {{ old('backup_schedule_frequency', $backupSchedule->backup_schedule_frequency) == 'monthly' ? 'selected' : '' }}>Monthly</option>
                    </select>
                    @error('backup_schedule_frequency')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#backup_method').change(function() {
                if ($(this).val() === 'full') {
                    $('#backup_per_file').prop('checked', false);
                    $('#backup_per_file').prop('disabled', true);
                } else {
                    $('#backup_per_file').prop('disabled', false);
                }
            });
        });
    </script>
@endpush
