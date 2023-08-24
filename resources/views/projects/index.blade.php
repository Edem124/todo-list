

<x-app-layout>
    <div style="background-color:black;padding: 30px; min-height: 100vh;">   
        <br>
        <div class="container mx-auto p-6" style=" background-color: #333333 ;border-radius: 30px;">
            
                <h1 style=" font-size:40px;font-family: jetBrains Mono; color:#ffffff ">
                 Dashboard
                </h1><hr style="background-color:black "><br> 
            
            <h1 class="col-span-full font-jetBrains mb-4" style=" color: white;background-color: #333333;font-size:20px;">Liste de vos projets</h1>
            <div class="mt-6 grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                
                @foreach($ownedProjects as $project)
                    <div class="rounded-lg shadow-md p-6 m-2" style=" background-color: #4c4c4c;border-radius: 30px;">
                        <a href="{{ route('projects.show', $project) }}" style=" color:white;font-size:20px; font-family:jetBrains Mono;" class="text-lg font-jetBrains mb-2 hover:underline">{{ $project->name }}</a><hr style="background-color:black ">
                        <p style=" color:white;">Date de création : {{ $project->created_at }}</p>
                        <p style=" color:white;">Propriétaire : {{ $project->user->name }}</p>
                        <div class="flex items-center space-x-4"> 
                            <!-- Badge d'état -->
                            <span class="badge @if($project->completed) badge-success @else badge-warning @endif mt-2" style=" color:#4c4c4c;">
                                @if($project->completed)
                                    Terminé
                                @else
                                    En cours
                                @endif
                            </span>
                            
                            @if(!$project->completed)
                                <form action="{{ route('projects.complete', $project) }}" method="post" class="inline-block ml-2 mr-2 mt-2">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="badge badge-ter" style="" >
                                        Accomplir
                                    </button>
                                </form>
                                
                                <a style=" color:white;" href="{{ route('projects.edit', $project) }}" class="badge badge-success mt-2 ">
                                    Modifier
                                </a>
                            @endif
                            
                            <form action="{{ route('projects.destroy', $project) }}" method="post" class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="badge badge-del mt-2" style=" color:white;" >
                                    DELETE
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div><br>
                <h1 class="col-span-full  font-jetBrains mb-4" style=" color: white;background-color: #333333;font-size:20px;">Liste des autres projets</h1>
            <div class="mt-6 grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 ">
                
                @foreach($sharedProjects as $project)
                    <div class=" rounded-lg shadow-md p-6 m-2 " style=" background-color: #4c4c4c;border-radius: 30px;">
                        <a href="{{ route('projects.showt', $project) }}"style=" color:white;font-size:20px; font-family:jetBrains Mono;" class="text-lg font-jetBrains mb-2 hover:underline">{{ $project->name }}</a><hr style="background-color:black ">
                        <p style=" color:white;">Date de création : {{ $project->created_at }}</p>
                        <p style=" color:white;">Propriétaire : {{ $project->user->name }}</p>
                        
                        <!-- Badge d'état -->
                        <span class="badge @if($project->completed) badge-success @else badge-warning @endif mt-2"  style=" color:#4c4c4c;">
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
                                <button type="submit" class="badge badge-ter mt-2" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" >
                                    Accomplir
                                </button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
        <style>
            
            .badge-success {
                background-color: #99ff99;
            }
            .badge-warning {
                background-color: #ffff7f;
            }
            .badge-ter {
                background-color: #9fcbfe;
            }
            .badge-del {
                background-color: #ff7e70;
            }
        </style>

</x-app-layout>
