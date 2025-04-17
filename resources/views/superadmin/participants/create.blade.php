<!-- Exemple pour create.blade.php -->
<div class="max-w-3xl mx-auto py-8">
    <form method="POST" action="{{ route('superadmin.participants.store') }}">
        @csrf

        <div class="grid grid-cols-2 gap-4">
            <!-- Champs Prénom, Nom, Téléphone, Email, Password -->
            @include('superadmin.participants._form', ['btnText' => 'Créer'])
        </div>
    </form>
</div>
