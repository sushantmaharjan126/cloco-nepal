@if ($message = Session::get('success_message'))
<div class="alert alert-success alert-dismissible" id="alert-dismissible" role="alert">
    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
        <span aria-hidden="true">×</span>
    </button>
    {{ $message }}
</div>
@endif

@if ($message = Session::get('status_message'))
<div class="alert alert-success alert-dismissible" id="alert-dismissible" role="alert">
    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
        <span aria-hidden="true">×</span>
    </button>
    {{ $message }}
</div>
@endif

@if ($message = Session::get('error_message'))
<div class="alert alert-danger alert-dismissible" id="alert-dismissible" role="alert">
    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
        <span aria-hidden="true">×</span>
    </button>
    {{ $message }}
</div>
@endif

{{-- @if ($errors->any())
<div class="alert alert-danger alert-dismissible" id="alert-dismissible" role="alert">
    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
        <span aria-hidden="true">×</span>
    </button>

        @foreach ($errors->all() as $error)
            <span>{{ $error }}</span> <br/>
        @endforeach

    </div>
@endif --}}

<script>
    setTimeout(function () {
        $('#alert-dismissible').hide();
    }, 3000);

    $( ".close" ).on( "click", function() {

        $('#alert-dismissible').hide();
    });
</script>