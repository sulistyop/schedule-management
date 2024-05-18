@if(session('title') || session('message'))
    <div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="{{ asset('images/monster-data.svg') }}" class="img-fluid mx-auto m-2" style="min-width: 250px" alt="Monster Backup">
                    @if(session('title'))
                        <div id="responseTitle" class="h5 mt-2 fs-1 base-color fw-bold">{{ session('title') }}</div>
                    @endif
                    @if(session('message'))
                        <div id="responseMessage" class="fs-4 base-color">{{ session('message') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif
