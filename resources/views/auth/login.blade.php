<x-auth-layout title="Connection" :action="route('login')" submitMessage="Connection">
    <x-input name="email" label="adresse e-mail" type="email" />
    <x-input name="password" label="Mot de passe" type="password" />
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <input id="remember" name="remember" type="checkbox"
                class="form-checkbox h-4 w-4 rounded border-gray-300 text-blue-700 focus:ring-blue-700">
            <label for="remember" class="ml-3 block text-sm leading-6 text-gray-900">
                Rester connecté
            </label>
        </div>
    </div>
</x-auth-layout>
