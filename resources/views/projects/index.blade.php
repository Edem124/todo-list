

<x-app-layout>
    <div style="background-color:black;padding: 30px; min-height: 100vh;">   
        <br>
        <div class="container mx-auto p-6" style=" background-color: #333333 ;border-radius: 30px;">
            
                <h1 style=" font-size:40px; font-family:Constantia; color:#ffffff ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
                </svg> Dashboard
                </h1><hr style="background-color:black "><br> 
            
            <h1 class="col-span-full font-semibold mb-4" style=" color: white;background-color: #333333;font-size:20px;">Liste de vos projets</h1>
            <div class="mt-6 grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                
                @foreach($ownedProjects as $project)
                    <div class="rounded-lg shadow-md p-6 m-2" style=" background-color: #4c4c4c;border-radius: 30px;">
                        <a href="{{ route('projects.show', $project) }}" style=" color:white;font-size:20px; font-family:Sitka;" class="text-lg font-semibold mb-2 hover:underline">{{ $project->name }}</a><hr style="background-color:black ">
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
                <h1 class="col-span-full  font-semibold mb-4" style=" color: white;background-color: #333333;font-size:20px;">Liste des autres projets</h1>
            <div class="mt-6 grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 ">
                
                @foreach($sharedProjects as $project)
                    <div class=" rounded-lg shadow-md p-6 m-2 " style=" background-color: #4c4c4c;border-radius: 30px;">
                        <a href="{{ route('projects.showt', $project) }}"style=" color:white;font-size:20px; font-family:Sitka;" class="text-lg font-semibold mb-2 hover:underline">{{ $project->name }}</a><hr style="background-color:black ">
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
