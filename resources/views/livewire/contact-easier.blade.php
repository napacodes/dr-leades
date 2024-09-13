<div>

    @if ($style == 'style1')

        <div class="contact-form-wrap">
            <form wire:submit="save" id="contactForm">

                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-form-group">
                            <input type="text" class="form-control" wire:model="name" placeholder="{{ __('frontend.name') }}" required>
                            <div class="form-validate-icons">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-form-group">
                            <input type="email" class="form-control" wire:model="email" placeholder="{{ __('frontend.email') }}" required>
                            <div class="form-validate-icons">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="contact-form-group">
                            <input type="text" class="form-control" wire:model="phone" placeholder="{{ __('frontend.phone') }}" required>
                            <div class="form-validate-icons">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="contact-form-group">
                            <textarea wire:model="message" class="form-control"  placeholder="{{ __('frontend.your_message') }}" cols="20" rows="8"></textarea>
                            <div class="form-validate-icons">
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="form-alerts">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                            @error('email') <span class="error">{{ $message }}</span> @enderror
                            @error('phone') <span class="error">{{ $message }}</span> @enderror
                            @error('message') <span class="error">{{ $message }}</span> @enderror
                            @if($message = Session::get('success'))
                                <span class="error">{{ __($message) }}</span>
                            @endif
                        </div>
                        <div class="contact-btn-left">
                            <button type="submit" id="contactBtn" class="primary-btn">
                                <span class="text">{{ __('frontend.send_message') }}</span>
                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    @endif

</div>
