<x-app-layout>
    <div style="padding: 20px;">
        <h1 style="font-size: 24px; margin-bottom: 20px;">Modifier le projet</h1>
        <form action="{{ route('projects.update', $project) }}" method="post">
            @csrf
            @method('PUT')
            <label for="task_name" style="display: block; margin-bottom: 10px;">Nom de la tâche :</label>
            <input type="text" id="task_name" name="project_name" value="{{ $project->name }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 20px;">
            
            <button type="submit" style="background-color: #4CAF50; color: white; border: none; border-radius: 5px; padding: 8px 15px; cursor: pointer;">Mettre à jour</button>
            <a href="{{ route('projects.index') }}" style="color: #3498db; text-decoration: none; margin-left: 10px; cursor: pointer;">Annuler</a>
        </form>

        <form action="{{ route('projects.addUsers', $project) }}" method="post" style="margin-top: 20px;">
            @csrf
            <label for="user_ids" style="display: block; margin-bottom: 10px;">Ajouter des utilisateurs :</label>
            <select id="user_ids" name="user_ids[]" multiple style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 10px;">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <button type="submit" style="background-color: #3498db; color: white; border: none; border-radius: 5px; padding: 8px 15px; cursor: pointer;">Ajouter Utilisateurs</button>
        </form>

    </div>
</x-app-layout>
