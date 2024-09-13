<div class="row">
    <div class="col-12">
        @if($message = Session::get('success'))
            <div id="alert_message" class="alert alert-success custom-alert alert-dismissible fade show" role="alert">
                <span>{{ __($message) }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if ($errors->any())
            <div id="alert_message" class="alert alert-danger custom-alert alert-dismissible fade show" role="alert">
                <strong>{{ __('Whoops!') }}</strong> {{ __('There were some problems with your input.') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ __($error) }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
</div>