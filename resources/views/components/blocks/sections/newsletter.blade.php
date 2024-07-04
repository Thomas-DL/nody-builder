@props(['data' => []])

<div class="bg-white py-16 sm:py-24">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="relative isolate overflow-hidden bg-gray-900 px-6 py-24 shadow-2xl sm:rounded-3xl sm:px-24 xl:py-32">
            <h2 class="mx-auto max-w-2xl text-center text-3xl font-bold tracking-tight text-white sm:text-4xl">
                {{ $data['title'] }}
            </h2>
            <p class="mx-auto mt-2 max-w-xl text-center text-lg leading-8 text-gray-300">
                {{ $data['subtitle'] }}
            </p>
            <div x-data="formHandler()">
                <form @submit.prevent="submitForm" class="mx-auto mt-10 flex max-w-md gap-x-4">
                    <label for="email-address" class="sr-only">Email address</label>
                    <input id="email-address" name="email" type="email" autocomplete="email"
                        x-model="formData.email" required
                        class="min-w-0 flex-auto rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-white sm:text-sm sm:leading-6"
                        placeholder="Enter your email">
                    <button type="submit" :disabled="loading"
                        class="flex-none rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                        S'abonner
                        <span x-show="loading">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </span>
                    </button>
                </form>
            </div>
            <p x-show="success" x-text="successMessage" style="color: green;"></p>
            <p x-show="error" x-text="errorMessage" style="color: red;"></p>
            <svg viewBox="0 0 1024 1024" class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-x-1/2"
                aria-hidden="true">
                <circle cx="512" cy="512" r="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)"
                    fill-opacity="0.7" />
                <defs>
                    <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641" cx="0" cy="0" r="1"
                        gradientUnits="userSpaceOnUse" gradientTransform="translate(512 512) rotate(90) scale(512)">
                        <stop stop-color="#7775D6" />
                        <stop offset="1" stop-color="#E935C1" stop-opacity="0" />
                    </radialGradient>
                </defs>
            </svg>
        </div>
    </div>
</div>

<script>
    function formHandler() {
        return {
            formData: {
                email: '',
            },
            loading: false,
            success: false,
            error: false,
            successMessage: '',
            errorMessage: '',
            submitForm() {
                this.loading = true;
                this.success = false;
                this.error = false;

                axios.post('https://api.brevo.com/v3/contacts', this.formData)
                    .then(response => {
                        this.success = true;
                        this.successMessage = response.data.message || 'Formulaire envoyé avec succès !';
                        this.formData = {
                            email: '',
                        }; // Reset form
                    })
                    .catch(error => {
                        this.error = true;
                        this.errorMessage = error.response.data.message ||
                            'Une erreur est survenue. Veuillez réessayer.';
                    })
                    .finally(() => {
                        this.loading = false;
                    });
            }
        }
    }
</script>
