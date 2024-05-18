@extends('layouts.app')

@section('page-title')
    {{__('Schedule') }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="row justify-content-center">
                    {{--buatkan versi card --}}
                    @foreach($backupSchedules as $schedule)
                        <div class="col-md-6">
                            <div class="card border-0 w-75 mx-auto">
                                <div class="card-body">
                                   <div class="text-center">
                                       <img src="{{ asset('images/cloud-building.svg') }}" alt="storage_logo" style="width: 100px; height: 100px;">
                                       <h2>{{ $schedule->schedule_name }}</h2>
                                       <span class="badge badge-custom bg-green-light">Server : {{ $schedule->backup_server }}</span>
                                   </div>
                                    <div>
                                        <table>
                                            <tr>
                                                <td>Method</td>
                                                <td>:</td>
                                                <td>{{ $schedule->backup_method }}</td>
                                            </tr>
                                            <tr>
                                                <td>Last Execution</td>
                                                <td>:</td>
                                                <td>{{ $schedule->updated_at ? $schedule->updated_at->diffForHumans() : 'Never' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Schedule</td>
                                                <td>:</td>
                                                <td>{{ $schedule->schedule_time }}</td>

                                            </tr>
                                            <tr>
                                                <td>Storage</td>
                                                <td>:</td>
                                                <td>{{ $schedule->storage_name }}</td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    {{--Schedule detail--}}
                                    <a href="{{ route('schedule.show', $schedule->id) }}" class="btn btn-primary">Schedule Detail</a>
                                    {{--buatkan button edit ke route schedule edit--}}
                                    <a href="" class="btn btn-success">
                                        <i class="fas fa-pause-circle"></i>
                                    </a>

                                    {{-- <a href="{{ route('schedule.edit', $schedule->id) }}" class="btn btn-warning">Edit</a>
                                     --}}{{--buatkan button delete ke route schedule destroy--}}{{--
                                     <form action="{{ route('schedule.destroy', $schedule->id) }}" method="post" class="d-inline">
                                         @csrf
                                         @method('DELETE')
                                         <button type="submit" class="btn btn-danger">Delete</button>
                                     </form>--}}
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
            @if($backupSchedules->isEmpty())
                <div class="alert alert-danger">No Schedule Found</div>
            @endif
            <div class="col-2">
                <div class="card border-0 text-center">
                    <div class="text-center">
                        <img src="{{ asset('images/cloud-building.svg') }}" alt="storage_logo" style="width: 100px; height: 100px;">
                    </div>
                    <a href="{{ route('schedule.create') }}" class="btn btn-success">Create Schedule</a>
                </div>
            </div>
        </div>
    </div>
@endsection
