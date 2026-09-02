<section>

    <header class="mb-4">

        <h2 class="text-danger">
            {{ __('Delete Account') }}
        </h2>

        <p class="text">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>

    </header>

    {{-- MODAL TRIGGER --}}
    <button
        type="button"
        class="btn btn-danger"
        data-bs-toggle="modal"
        data-bs-target="#deleteAccountModal">
        {{ __('Delete Account') }}
    </button>


    {{-- MODAL --}}
    <div
        class="modal fade"
        id="deleteAccountModal"
        tabindex="-1"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        aria-labelledby="deleteAccountModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                {{-- HEADER --}}
                <div class="modal-header">

                    <h5
                        class="modal-title"
                        id="deleteAccountModalLabel">
                        {{ __('Delete Account') }}
                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>

                </div>


                {{-- FORM --}}
                <form
                    method="POST"
                    action="{{ route('profile.destroy') }}">

                    @csrf
                    @method('DELETE')


                    {{-- BODY --}}
                    <div class="modal-body">

                        <h5>
                            {{ __('Are you sure you want to delete your account?') }}
                        </h5>

                        <p class="text-muted">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>


                        <div class="mt-3">

                            <label
                                for="delete_password"
                                class="form-label">
                                {{ __('Password') }}
                            </label>

                            <input
                                id="delete_password"
                                name="password"
                                type="password"
                                class="form-control
                                @error('password', 'userDeletion') is-invalid @enderror"
                                placeholder="{{ __('Password') }}">

                            @error('password', 'userDeletion')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                            @enderror

                        </div>

                    </div>


                    {{-- FOOTER --}}
                    <div class="modal-footer">

                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">
                            {{ __('Cancel') }}
                        </button>

                        <button
                            type="submit"
                            class="btn btn-danger">
                            {{ __('Delete Account') }}
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>