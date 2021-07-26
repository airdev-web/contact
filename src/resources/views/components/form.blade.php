@if($route_name == '#')
    Route {{ $route_name }} incorrect.
@else
    <form action="{{ route($route_name.'_post') }}" method="post" class="{{ config('contact.form-class', '') }}">
        {{ csrf_field() }}

        {{ $route_name }}

        <input type="hidden" id="captcha_token-input-{{ $route_name }}" name="captcha_token" value="">

        @if ($slot->isEmpty())
            <div class="mb-3">
                <label for="input-firstname">Prénom</label>
                <input class="form-control" id="input-firstname" type="text" name="firstname" required {{ config('contact.debug') ? 'value=Romain' : '' }}>
            </div>
            <div class="mb-3">
                <label for="input-name">Nom</label>
                <input class="form-control" id="input-name" type="text" name="name" required {{ config('contact.debug') ? 'value=Vause' : '' }}>
            </div>
            <div class="mb-3">
                <label for="input-phone">Téléphone</label>
                <input class="form-control" id="input-phone" type="text" name="phone" required {{ config('contact.debug') ? 'value=0470/61.86.07' : '' }}>
            </div>
            <div class="mb-3">
                <label for="input-email">Email</label>
                <input class="form-control" id="input-email" type="email" name="email" required {{ config('contact.debug') ? 'value=email_a_repondre@airdev.be' : '' }}>
            </div>
            <div class="mb-3">
                <label for="input-message" class="label-textarea">Message</label>
                <textarea class="form-control" id="input-message" name="message" rows="5">@if (config('contact.debug')){!! Str::of("Ceci est un message de base\nIl est affiché car debug = true")->trim(' ') !!}@endif</textarea>
            </div>
        @else
            {{ $slot }}
        @endif

        <button class="g-recaptcha {{ config('contact.submit-btn-class') }}"
                data-sitekey="{{ config('contact.captcha_public') }}"
                data-callback='onSubmit_{{ $route_name }}'
                data-action='submit'
                id="send-button">
            @if (!isset($button_slot) || !$button_slot)
                Envoyer
            @else
                {{ $button_slot }}
            @endif
        </button>

        <button id="submit-button-{{ $route_name }}" type="submit" style="display: none">submit</button>
    </form>
    <script>
        function onSubmit_{{ $route_name }}(token) {
            document.getElementById('captcha_token-input-{{ $route_name }}').value = token;
            document.getElementById('submit-button-{{ $route_name }}').click();
        }
    </script>
@endif
