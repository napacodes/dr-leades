@isset ($bottom_button_widget)
    <div class="mobile-widget-container">
        @if (!empty($bottom_button_widget->button_name) && $bottom_button_widget->status == 'enable')
            <a href="tel:{{ $bottom_button_widget->phone }}" class="btn btn-icon">
                <i class="fas fa-phone-alt"></i> {{ $bottom_button_widget->button_name }}
            </a>
        @endif
        @if (!empty($bottom_button_widget->button_name_2) && $bottom_button_widget->status_whatsapp == 'enable')
            <a href="https://wa.me/{{ $bottom_button_widget->whatsapp }}" class="btn btn-icon">
                <i class="fab fa-whatsapp"></i> {{ $bottom_button_widget->button_name_2 }}
            </a>
        @endif
    </div>
@else
    <div class="mobile-widget-container">
        <a href="tel:" class="btn btn-icon">
            <i class="fas fa-phone-alt"></i> Call
        </a>
        <a href="https://wa.me/" class="btn btn-icon">
            <i class="fab fa-whatsapp"></i> WhatsApp
        </a>
    </div>
@endisset


