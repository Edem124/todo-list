<x-app-layout>
    <div class="container mx-auto p-6">
        <div class="max-w-2xl rounded-lg shadow-md mx-auto" style="background-color:#666666">
            <div class="p-6">
                <h2 class="text-white font-semibold mb-4">Ajouter un nouveau projet</h2>
                <form action="{{ route('projects.store') }}" method="post" class="flex items-center">
                    @csrf
                    <input type="text" name="project_name" placeholder="Nouveau projet" required class="flex-grow py-2 px-4 border rounded-l-lg focus:outline-none focus:ring focus:border-blue-300">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-r-lg">
                        <i class="fa fa-plus"></i> Ajouter
                    </button>
                </form>
                <!-- Alert -->
                <div class="alert-success mt-4 p-2 hidden" id="add-alert">
                    Projet ajouté avec succès!
                </div>
            </div>
        </div><br>
            <h1 class="col-span-full text-xl font-semibold mb-4">Liste de vos projets</h1>
        <div class="mt-6 grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            
            @foreach($ownedProjects as $project)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <a href="{{ route('projects.show', $project) }}" class="text-lg font-semibold mb-2 hover:underline">{{ $project->name }}</a>
                    <p>Date de création : {{ $project->created_at }}</p>
                    <p>Propriétaire : {{ $project->user->name }}</p>
                    <div class="flex items-center space-x-4"> 
                        <!-- Badge d'état -->
                        <span class="badge @if($project->completed) badge-success @else badge-warning @endif mt-2">
                            @if($project->completed)
                                Terminé
                            @else
                                En cours
                            @endif
                        </span>
                        
                        @if(!$project->completed)
                            <form action="{{ route('projects.complete', $project) }}" method="post" class="inline-block mr-2">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn-icon" style="color:#5dae79; background-color: white" >
                                    <i class="fa fa-check"></i>
                                </button>
                            </form>
                            
                            <a href="{{ route('projects.edit', $project) }}" class="btn-icon text-dark-500 hover:text-dark-600">
                                <i class="fa fa-pencil"></i>Modifier
                            </a>
                        @endif
                        
                        <form action="{{ route('projects.destroy', $project) }}" method="post" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-icon" style="color:#e24534; background-color: white">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div><br>
            <h1 class="col-span-full text-xl font-semibold mb-4">Liste des autres projets</h1>
        <div class="mt-6 grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            
            @foreach($sharedProjects as $project)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <a href="{{ route('projects.showt', $project) }}" class="text-lg font-semibold mb-2 hover:underline">{{ $project->name }}</a>
                    <p>Date de création : {{ $project->created_at }}</p>
                    <p>Propriétaire : {{ $project->user->name }}</p>
                    
                    <!-- Badge d'état -->
                    <span class="badge @if($project->completed) badge-success @else badge-warning @endif mt-2">
                        @if($project->completed)
                            Terminé
                        @else
                            En cours
                        @endif
                    </span>
                    
                    @if(!$project->completed)
                        <form action="{{ route('projects.complete', $project) }}" method="post" class="inline-block mr-2">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn-icon text-green-500 hover:text-green-600">
                                <i class="fa fa-check"></i>
                            </button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <style>
    .badge-success {
        background-color: #5dae79;
    }
    .badge-warning {
        background-color: #fdf1b8;
    }
</style>

</x-app-layout>
