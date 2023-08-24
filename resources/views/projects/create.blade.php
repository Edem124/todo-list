<x-app-layout>
    <div style="background-color:black;padding: 30px; min-height: 100vh;">   
        <br>
        <div class="container mx-auto p-6" style="background-color: #333333; border-radius: 30px;">
            <!-- En-tête -->
            <h1 style="font-size:40px; font-family:Constantia; color:#ffffff ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                <!-- ... (votre icône) ... -->
                </svg> CREATE PROJECT
            </h1>
            <hr style="background-color:black "><br> 

            <!-- Contenu de la page -->
            <h1 class="text-gray-800 text-xl font-semibold mb-4" style="color: white; font-size: 30px;">
                Ajouter un nouveau projet
            </h1>
            <div class="max-w-2xl rounded-lg shadow-md bg-#333333 p-6">
                <form action="{{ route('projects.store') }}" method="post" class="flex items-center">
                    @csrf
                    <input type="text" name="project_name" placeholder="Nouveau projet" required class="flex-grow py-2 px-8 border rounded-l-lg">
                    <button type="submit" style="border-radius:10px; font-size:20px" class="ml-1 badge-ter " >
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
