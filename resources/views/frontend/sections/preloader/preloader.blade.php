@isset ($preloader)
    @if ($preloader->status == 'enable')
        <div id="preloader-wrap">
            <div class="preloader-inner">
                <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
            </div>
        </div>
        <!--// Preloader // -->
    @endif
@else
    <div id="preloader-wrap">
        <div class="preloader-inner">
            <div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
        </div>
    </div>
    <!--// Preloader // -->
@endisset
