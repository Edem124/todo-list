<x-app-layout>
    <div style="display: flex; justify-content: center; align-items: center; min-height: 100vh; background-color: #f8f9fa;">
        <div style="width: 80%; max-width: 600px; background-color: #fff; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
            <div style="padding: 30px; text-align: center;">
                <h1 style="font-size: 28px; margin-bottom: 20px; color: #333;">Modifier la tâche</h1>
                <form action="{{ route('tasks.update', ['task' => $task, 'project' => $project]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="task_name" style="display: block; margin-bottom: 10px; font-size: 16px; color: #666;">Nom de la tâche :</label>
                    <input type="text" id="task_name" name="task_name" value="{{ $task->name }}" required class="input-field">
                    
                    <div class="button-group">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> Mettre à jour
                        </button>
                        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
                            <i class="fa fa-times"></i> Annuler
                        </a>
                    </div>
                </form>
            </div>

            <div style="padding: 30px; text-align: center; background-color: #f2f3f4; border-top: 1px solid #ddd;">
                <form action="{{ route('tasks.addUsers', ['task' => $task, 'project' => $project]) }}" method="post">
                    @csrf
                    <label for="user_ids" class="label-text">Ajouter des utilisateurs :</label>
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


<style>
    /* Styles for input fields */
    .input-field {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    /* Styles for button group */
    .button-group {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    /* Styles for label text */
    .label-text {
        display: block;
        margin-bottom: 10px;
        font-size: 16px;
        color: #666;
    }

    /* Styles for select field */
    .select-field {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
        font-size: 14px;
    }

    /* Customize button styles */
    .btn {
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-success {
        background-color: #4CAF50;
        color: white;
    }

    .btn-secondary {
        background-color: #be2010;
        color: white;
        margin-left: 10px;
    }

    .btn-primary {
        background-color: #3498db;
        color: white;
    }

    /* Customize icon colors */
    .btn i {
        margin-right: 5px;
        color: white;
    }
</style>

</x-app-layout>
