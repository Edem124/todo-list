<?php
namespace App\Http\Controllers;

use App\Models\User;
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

        return view('tasks.index', compact('userTasks', 'sharedTasks'));
    }

    public function addTask(Request $request)
    {
        $validatedData = $request->validate([
            'task_name' => 'required|max:255',
            
        ]);

        auth()->user()->ownedTasks()->create([
            'name' => $validatedData['task_name'],
            'created_at' => now(),
            'deadline' => now(), // Remplacez par la date de fin appropriée
        ]);
        /*auth()->user()->sharedTasks()->create([
            'name' => $validatedData['task_name'],
            'created_at' => now(),
            //'deadline' => now(), // Remplacez par la date de fin appropriée
        ]);*/
        
        

        return redirect()->route('tasks.index');
    }

    public function completeTask(Task $task)
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


    public function deleteTask(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        $users = User::all(); // Récupérez tous les utilisateurs
        return view('tasks.edit', compact('task', 'users'));
    }

    public function update(Task $task, Request $request)
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
        
        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour avec succès.');
    }


    
    public function addUsers(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'user_ids' => 'array',
        ]);

        // Mettre à jour la relation users avec les utilisateurs sélectionnés
        $task->users()->attach($validatedData['user_ids']);

        // Envoyer des notifications par e-mail aux utilisateurs ajoutés
        foreach ($task->users as $user) {
            $user->notify(new AddedToTaskNotification($task));
        }

        return redirect()->back()->with('success', 'Utilisateurs ajoutés à la tâche.');
    }


}






