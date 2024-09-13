<x-default-layout title="Ajouter une classe">
    <div class="container my-10">
        <div class="app-content pt-3 p-md-3 p-lg-4">
        <h1 class="flex justify-center">Ajouter une classe</h1>
        <form action="{{ route('admin.classes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <x-input name="nom_classe" label="Nom de la classe" /> --}}
            {{-- <div class="form-group">
                <label for="nom_classe">Nom de la classe</label>
                <select name="nom_classe" id="nom_classe" class="form-control" required>
                    @foreach($specialites as $specialites)
                        <option value="{{ $specialites }}">{{ $specialites }}</option>
                    @endforeach
                </select>
            </div> --}}
            <div class="form-group">
                <label>Nom complet de la classe :</label>
                <div id="class_name_display" class="alert alert-info"></div>
            </div>
            <div class="form-group">
                <label for="option_id">option</label>
                <select name="option_id" id="option_id" class="form-control" required>
                    @foreach($options as $option)
                        <option value="{{ $option->id }}">{{ $option->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="niveau_id">Niveau</label>
                <select name="niveau_id" id="niveau_id" class="form-control" required>
                    @foreach($niveaux as $niveau)
                        <option value="{{ $niveau->id }}">{{ $niveau->nom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="rounded-md bg-blue-800 px-3 py-2 text-sm
font-semibold text-white shadow-sm hover:bg-blue-700 focus-visible:outline focus-
visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-800 m-3">Ajouter</button>
        </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const optionSelect = document.getElementById('option_id');
            const niveauSelect = document.getElementById('niveau_id');
            const classNameDisplay = document.getElementById('class_name_display');
    
            function updateClassName() {
                const optionName = optionSelect.options[optionSelect.selectedIndex].text;
                const niveauName = niveauSelect.options[niveauSelect.selectedIndex].text;
                classNameDisplay.textContent = optionName + ' ' + niveauName;
            }
    
            optionSelect.addEventListener('change', updateClassName);
            niveauSelect.addEventListener('change', updateClassName);
    
            // Initialiser le nom complet de la classe
            updateClassName();
        });
    </script>
</x-default-layout>
