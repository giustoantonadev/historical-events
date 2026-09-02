<section>

    <header class="mb-4">
        <h2 class="text-secondary">
            {{ __('Profile Information') }}
        </h2>

        <p class="text">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form
        id="send-verification"
        method="POST"
        action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form
        method="POST"
        action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        {{-- NAME --}}
        <div class="mb-3">

            <label for="name" class="form-label">
                {{ __('Name') }}
            </label>

            <input
                id="name"
                name="name"
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name">

            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

        </div>

        {{-- EMAIL --}}
        <div class="mb-3">

            <label for="email" class="form-label">
                {{ __('Email') }}
            </label>

            <input
                id="email"
                name="email"
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username">

            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

        </div>

        {{-- EMAIL VERIFICATION --}}
        @if (
        $user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail
        && ! $user->hasVerifiedEmail()
        )

        <div class="mb-3">

            <p class="text-muted">
                {{ __('Your email address is unverified.') }}
            </p>

            <button
                form="send-verification"
                class="btn btn-outline-dark"
                type="submit">
                {{ __('Click here to re-send the verification email.') }}
            </button>

            @if (session('status') === 'verification-link-sent')

            <p class="mt-2 text-success">
                {{ __('A new verification link has been sent to your email address.') }}
            </p>

            @endif

        </div>

        @endif

        {{-- SAVE --}}
        <div class="d-flex align-items-center gap-3">

            <button
                type="submit"
                class="btn btn-primary">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'profile-updated')

            <span class="text-success">
                {{ __('Saved.') }}
            </span>

            @endif

        </div>

    </form>

</section>