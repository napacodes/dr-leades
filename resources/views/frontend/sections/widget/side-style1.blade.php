@isset ($side_button_widget)
    @if ($side_button_widget->status_phone == 'enable')
        <a href="tel:{{ $side_button_widget->phone }}" class="btn-whatsapp-pulse custom-color-black">
            <i class="fas fa-phone"></i>
        </a>
    @endif

    @if ($side_button_widget->status_whatsapp == 'enable')
        @if ($side_button_widget->contact == "fas fa-envelope")
            <a href="mailto:{{ $side_button_widget->email_or_whatsapp }}" class="btn-whatsapp-pulse btn-whatsapp-pulse-border" style="@if ($side_button_widget->status_phone == 'disable') bottom:80px; @endif">
                <i class="fas fa-envelope"></i>
            </a>
        @else
            <a href="{{ $side_button_widget->email_or_whatsapp }}" class="btn-whatsapp-pulse btn-whatsapp-pulse-border" style="@if ($side_button_widget->status_phone == 'disable') bottom:80px; @endif">
                <i class="fab fa-whatsapp"></i>
            </a>
        @endif
    @endif

    @if ($side_button_widget->status == 'enable')
    <a href="{{ $side_button_widget->link }}" class="btn-whatsapp-pulse btn-whatsapp-pulse-border-2 custom-color-blue" style="@if ($side_button_widget->status_phone == 'disable' && $side_button_widget->status_whatsapp == 'disable') bottom:80px; @elseif ($side_button_widget->status_phone == 'disable') bottom:160px; @elseif ($side_button_widget->status_whatsapp == 'disable') bottom:160px; @endif">
        <i class="{{ $side_button_widget->social_media }}"></i>
    </a>
    @endif
@else
    <a href="#" class="btn-whatsapp-pulse custom-color-black">
        <i class="fas fa-phone"></i>
    </a>

    <a href="#" class="btn-whatsapp-pulse btn-whatsapp-pulse-border">
        <i class="fab fa-whatsapp"></i>
    </a>

    <a href="#" class="btn-whatsapp-pulse btn-whatsapp-pulse-border-2 custom-color-blue">
        <i class="fab fa-facebook"></i>
    </a>
@endisset
