<x-guest-layout>
    <div class="max-w-lg mx-auto text-center mt-16 bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
            📩 Vérification de votre email requise
        </h1>

        <p class="mt-4 text-gray-600 dark:text-gray-300">
            Merci de vous être inscrit ! Avant de commencer, veuillez vérifier votre adresse e-mail en cliquant sur le lien que nous vous avons envoyé.
            Si vous n'avez pas reçu l'e-mail, nous pouvons vous en envoyer un autre.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="mt-4 p-3 bg-green-100 text-green-700 rounded-lg text-sm">
                ✅ Un nouveau lien de vérification a été envoyé à votre adresse e-mail.
            </div>
        @endif

        <div class="mt-6 flex flex-col md:flex-row items-center justify-between gap-4">
            <!-- Bouton de renvoi du mail -->
            <form method="POST" action="{{ route('verification.send') }}" class="w-full md:w-auto">
                @csrf
                <button type="submit"
                    class="w-full md:w-auto px-6 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-md transition-all">
                    📬 Renvoyer l'email
                </button>
            </form>

            <!-- Bouton de déconnexion -->
            <form method="POST" action="{{ route('logout') }}" class="w-full md:w-auto">
                @csrf
                <button type="submit"
                    class="w-full md:w-auto px-6 py-2 text-gray-600 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 rounded-lg shadow-md transition-all">
                    🚪 Se déconnecter
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
