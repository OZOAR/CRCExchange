@if (session('success'))
    <br />
    <div class="alert alert-success">
        @lang(session('success'))
    </div>
@endif

@if(session('error'))
    <br />
    <ul class="alert alert-danger">
        @lang(session('error'))
    </ul>
@endif