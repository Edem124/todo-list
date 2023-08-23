<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\View\View;
use App\Notifications\AddedToTaskNotification;
use App\Notifications\TaskCompletedNotification;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Récupérer les tâches de l'utilisateur connecté
        $userTasks = $user->ownedTasks;

        // Récupérer les tâches partagées avec l'utilisateur
        $sharedTasks = $user->sharedTasks;

        return view('projects.show', compact('userTasks', 'sharedTasks'));
    }

    public function addTask(Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'task_name' => 'required|max:255',
        ]);

        // Assurez-vous qu'un utilisateur est authentifié
        $user = Auth::user();

        // Créez une nouvelle tâche associée au projet et à l'utilisateur
        $task = $user->ownedTasks()->create([
            'name' => $validatedData['task_name'],
            'created_at' => now(),
            'deadline' => now(), // Remplacez par la date de fin appropriée
        ]);

        // Ajoutez la tâche au projet
        $project->tasks()->save($task);

        return redirect()->route('projects.show', $project)->with('success', 'Tâche ajoutée avec succès.');
    }
    

    public function completeTask(Task $task, Project $project)
    {
        $user = Auth::user();

        // Marquer la tâche comme terminée et enregistrer l'utilisateur
        $task->update([
            'completed' => true,
            'completed_by' => $user->id,
        ]);

        // Charger les utilisateurs associés à la tâche
        $task->load('users');

        // Envoyer des notifications par e-mail aux utilisateurs associés à la tâche
        $associatedUsers = $task->users;
        foreach ($associatedUsers as $user) {
            $user->notify(new TaskCompletedNotification($task));
        }

        return redirect()->back()->with('success', 'Tâche marquée comme terminée.');
    }


    public function deleteTask(Task $task, Project $project)
    {
        $task->delete();

        return redirect()->route('projects.show', $project);
    }

    public function edit(Task $task, Project $project)
    {
        $users = $project->users;
        $users = User::all(); // Récupérez tous les utilisateurs
        return view('projects.edit_task', compact('task', 'users', 'project'));
    }

    public function update(Task $task, Request $request, Project $project)
    {
        $validatedData = $request->validate([
            'task_name' => 'required|max:255',
            'user_ids' => 'array', // Assurez-vous que user_ids est un tableau
            'user_ids.*' => 'exists:users,id', // Assurez-vous que les IDs des utilisateurs existent dans la table users
        ]);

        // Mettre à jour le nom de la tâche
        $task->update([
            'name' => $validatedData['task_name'],
        ]);

        // Mettre à jour les utilisateurs associés à la tâche
        if (isset($validatedData['user_ids'])) {
            $task->users()->attach($validatedData['user_ids']);
        } else {
            $task->users()->attach([]); // Synchroniser avec un tableau vide pour supprimer toutes les associations
        }

        return redirect()->route('projects.show', $task->project)->with('success', 'Tâche mise à jour avec succès.');
    }
    
    public function addUsers(Request $request, Task $task, Project $project)
    {
        // Récupérez le projet auquel appartient la tâche
        $project = $task->project;

        // Récupérez les utilisateurs associés à ce projet
        $projectUsers = $project->users;

        $validatedData = $request->validate([
            'user_ids' => 'array',
        ]);

        // Filtrer les IDs des utilisateurs pour s'assurer qu'ils font partie du projet
        $filteredUserIds = array_filter($validatedData['user_ids'], function ($userId) use ($projectUsers) {
            return $projectUsers->contains('id', $userId);
        });

        // Mettre à jour la relation users de la tâche avec les utilisateurs filtrés
        $task->users()->attach($filteredUserIds);

        // Envoyer des notifications par e-mail aux utilisateurs ajoutés
        foreach ($filteredUserIds as $userId) {
            $user = User::find($userId);
            if ($user) {
                $user->notify(new AddedToTaskNotification($task));
            }
        }

        return redirect()->back()->with('success', 'Utilisateurs ajoutés à la tâche.');
    }
    
    public function unassignUserFromTask(Project $project, Task $task, User $user)
    {
        // Vérifiez d'abord si l'utilisateur est bien assigné à la tâche dans ce projet
        if ($task->project_id === $project->id && $task->users->contains($user)) {
            // Désassignez l'utilisateur de la tâche
            $task->users()->detach($user);

            return redirect()->route('projects.show', $project)->with('success', 'Utilisateur désassigné de la tâche avec succès.');
        }

        return redirect()->route('projects.show', $project)->with('error', 'L\'utilisateur n\'est pas assigné à cette tâche dans ce projet.');
    }


}






