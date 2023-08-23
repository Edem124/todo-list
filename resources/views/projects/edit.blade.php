<x-app-layout>
    <div class="container mx-auto py-8">
        <div class="bg-white rounded-lg shadow-lg p-6 md:p-8 max-w-xl mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 mb-6">Modifier le projet</h1>
            <form action="{{ route('projects.update', $project) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="task_name" class="block text-gray-600 text-sm font-medium mb-2">Nom du projet :</label>
                    <input type="text" id="task_name" name="project_name" value="{{ $project->name }}" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 text-gray-700">
                </div>

                <div class="flex justify-center mt-6">
                    <button type="submit" class="px-4 py-2 hite rounded-md  transition duration-300" style="color:#5dae79; background-color: white">
                        <i class="fa fa-check mr-2"></i> Mettre à jour
                    </button>
                    <a href="{{ route('projects.index') }}" class="ml-4 px-4 py-2 transition duration-300" style="color:#e24534; background-color: white">
                        <i class="fa fa-times mr-2"></i> Annuler
                    </a>
                </div>
            </form>

            <div class="bg-gray-100 p-6 mt-8 rounded-lg">
                <form action="{{ route('projects.addUsers', $project) }}" method="post">
                    @csrf
                    <label for="user_ids" class="block text-gray-600 text-sm font-medium mb-2">Ajouter des utilisateurs :</label>
                    <select id="user_ids" name="user_ids[]" multiple class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 text-gray-700 select2">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <div class="flex justify-center mt-4">
                        <button type="submit" class="px-4 py-2   transition duration-300" style="color:white; background-color: blue">
                            <i class="fa fa-user-plus mr-2"></i> Ajouter Utilisateurs
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.select2').select2(); // Initialise Select2 sur tous les éléments avec la classe "select2"
        });
    </script>
</x-app-layout>
