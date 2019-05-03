<section id="contact">
    <div class="container">
        <header>
            <h1>{{ __('Say Hello') }}</h1>
            <p>{{ __('Have questions or want to hire me? Send me a message!') }}</p>
        </header>
        <form action="{{ route('contact.send') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text"
                        class="form-control {{ $errors->has('name') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}"
                        id="contact-name" name="name" value="{{ old('name') }}" placeholder="{{ __('Enter your full name...') }}"
                        required>
                    @if($errors->has('name'))
                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    @endif

                </div>
                <div class="form-group col-md-6">
                    <input type="email"
                        class="form-control {{ $errors->has('email') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}"
                        id="contact-email" name="email" value="{{ old('email') }}" placeholder="{{ __('Enter your email address...') }}"
                        required> @if($errors->has('email'))
                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <textarea name="body"
                    class="form-control {{ $errors->has('body') ? 'is-invalid' : ($errors->any() ? 'is-valid' : null) }}"
                    id="contact-body" placeholder="{{ __('Type your message...') }}" required>{{ old('body') }}</textarea>
                @if($errors->has('body'))
                <div class="invalid-feedback">{{ $errors->first('body') }}</div>
                @endif
            </div>
            <button class="btn btn-outline-dark btn-lg"><i class="fas fa-paper-plane"></i> {{ __('Send') }}</button>
        </form>
    </div>
</section>
