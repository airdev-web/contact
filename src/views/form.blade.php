<form action="{{ route('postMailContact') }}" method="post" class="contact-form">
    {{ csrf_field() }}
    <input type="hidden" id="captcha_token-input" name="captcha_token" value="">

    @yield('fields')

    @sectionMissing('send-button')
        <div class="input-group">
            <label for="input-firstname">Prénom</label>
            <input id="input-firstname" type="text" name="firstname" required>
        </div>
        <div class="input-group">
            <label for="input-name">Nom</label>
            <input id="input-name" type="text" name="name" required>
        </div>
        <div class="input-group">
            <label for="input-phone">Téléphone</label>
            <input id="input-phone" type="text" name="phone" required>
        </div>
        <div class="input-group">
            <label for="input-email">Email</label>
            <input id="input-email" type="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="input-message" class="label-textarea">Message</label>
            <textarea id="input-message" name="message" rows="5" required></textarea>
        </div>
    @endif

    <button class="g-recaptcha btn margin-after-textarea"
            data-sitekey="{{ $captcha_public }}"
            data-callback='onSubmit'
            data-action='submit'
            id="send-button">
        @yield('send-button')

        @sectionMissing('send-button')
            <a class="link" href="#">Envoyer</a>
        @endif
    </button>

    <button id="submit-button" type="submit" class="hidden">submit</button>
</form>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
    function onSubmit(token) {
        document.getElementById('captcha_token-input').value = token;
        document.getElementById('submit-button').click();
    }
</script>
