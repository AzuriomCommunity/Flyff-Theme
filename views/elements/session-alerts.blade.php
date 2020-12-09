@if(session('success'))
    <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert" data-aos="fade-right">
        <i class="fas fa-check-circle"></i>
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('error'))
    <div id="alert"  class="alert alert-danger alert-dismissible fade show" role="alert" data-aos="fade-right">
        <i class="fas fa-exclamation-circle"></i>
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div id="status-message"></div>
