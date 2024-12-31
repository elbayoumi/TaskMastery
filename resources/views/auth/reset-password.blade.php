<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <div class="relative">
                <x-text-input id="password" class="block mt-1 w-full pr-20" type="password" name="password" required autocomplete="new-password" />

                <!-- أيقونة عرض/إخفاء كلمة المرور -->
                <div class="absolute inset-y-0  flex right-10 ">
                    <span id="toggle-password" class=" flex items-center cursor-pointer text-gray-500 text-lg">
                        👁
                    </span>

                    <!-- زر توليد كلمة مرور -->
                    <button type="button" id="generate-password" class="  right-2 bg-blue-500 text-white text-xs px-2 py-1 rounded hover:bg-blue-600">
                        Generate
                    </button>
                </div>

            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        // زر توليد كلمة مرور قوية
        document.getElementById('generate-password').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const confirmPasswordField = document.getElementById('password_confirmation');

            // توليد كلمة مرور قوية
            const strongPassword = generateStrongPassword();
            passwordField.value = strongPassword;
            confirmPasswordField.value = strongPassword;
        });

        // زر عرض/إخفاء كلمة المرور
        document.getElementById('toggle-password').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;

            // تغيير الأيقونة
            this.textContent = type === 'password' ? '👁' : '🙈';
        });

        // دالة لتوليد كلمة مرور قوية
        function generateStrongPassword() {
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+';
            const passwordLength = 12;
            let password = '';
            for (let i = 0; i < passwordLength; i++) {
                const randomIndex = Math.floor(Math.random() * characters.length);
                password += characters[randomIndex];
            }
            return password;
        }
    </script>
</x-guest-layout>
