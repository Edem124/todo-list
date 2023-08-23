<x-app-layout>
    <div style="background-color:black">   
        <br>
        <div class="container mx-auto p-6" style="background-color: #333333; border-radius: 30px;">
            <!-- En-tête -->
            <h1 style="font-size:40px; font-family:Constantia; color:#ffffff ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                    <!-- ... (votre icône) ... -->
                </svg> Dashboard
            </h1>
            <hr style="background-color:black "><br> 

            <!-- Contenu de la page -->
            <div class="flex justify-center items-center min-h-screen">
                <div style="width: 80%; max-width: 600px; background-color: #4c4c4c; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                    <div style="padding: 30px; text-align: center;">
                        <h1 style="font-size: 28px; margin-bottom: 20px; color: #ffffff;">Modifier la tâche</h1>
                        <form action="{{ route('tasks.update', ['task' => $task, 'project' => $project]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <label for="task_name" style="display: block; margin-bottom: 10px; font-size: 16px; color: #ffffff;">Nom de la tâche :</label>
                            <input type="text" id="task_name" name="task_name" value="{{ $task->name }}" required class="input-field">
                            
                            <div class="button-group">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i> Mettre à jour
                                </button>
                                <a href="{{ route('projects.show', $project) }}" class="btn btn-secondary">
                                    <i class="fa fa-times"></i> Annuler
                                </a>
                            </div>
                        </form>
                    </div>

                    <div style="padding: 30px; text-align: center; background-color: #4c4c4c; border-top: 1px solid #ddd;">
                        <form action="{{ route('tasks.addUsers', ['task' => $task, 'project' => $project]) }}" method="post">
                            @csrf
                            <label for="user_ids" class="label-text" style="color: #ffffff;">Ajouter des utilisateurs :</label>
                            <select id="user_ids" name="user_ids[]" multiple class="select-field">
                                @foreach($project->users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <div class="button-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-user-plus"></i> Ajouter Utilisateurs
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
