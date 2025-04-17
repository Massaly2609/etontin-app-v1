<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Accès Interdit</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg text-center">
        <!-- Titre -->
        <h1 class="text-4xl font-bold text-gray-800 mb-4">403 - Accès Interdit</h1>

        <!-- Message d'erreur -->
        <p class="text-gray-600 mb-6">
            Accés réserver uniquement au participant !!!.
        </p>

        <!-- Bouton de retour -->
        <a href="{{ route('participant.login') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
            Retour au tableau de bord
        </a>
    </div>
</body>
</html>
