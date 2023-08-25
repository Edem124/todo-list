<x-app-layout>
    <div class="bg-gray-950 p-7 min-h-screen">   
        <br>
        <div class="container mx-auto p-6 rounded-3xl text-gray-900" >
            <!-- En-tête -->
            <h1 class="text-white font-jetBrains text-4xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                <!-- ... (votre icône) ... -->
                </svg> CREATE PROJECT
            </h1>
            <hr class="bg-gray-500"><br> 

            <!-- Contenu de la page -->
            <h1 class="text-white font-jetBrains mb-4 text-3xl" >
                Ajouter un nouveau projet
            </h1>
            <div class="max-w-2xl rounded-lg shadow-md bg-gray-800 p-6">
                <form action="{{ route('projects.store') }}" method="post" class="flex items-center">
                    @csrf
                    <input type="text" name="project_name" placeholder="Nouveau projet" required class="flex-grow py-2 px-8 border rounded-l-lg">
                    <button type="submit" class="ml-1 badge-ter rounded-lg text-xl" >
                        <i class="fa fa-plus"></i> Ajouter
                    </button>
                </form>
                
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
