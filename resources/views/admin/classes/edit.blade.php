<x-default-layout title="editer une classe">
    <div class="flex flex-col justify-center py-12 sm:px-6 lg:px-8">
            <h1 class="text-xl flex justify-center text-sky-700">Modifier la Classe</h1>
            <form action="{{ route('admin.classes.update', $class->id) }}" method="POST">
                @csrf
                @method('PUT')
                {{-- <x-input label="nom" name="nom_classe" id="nom" value="{{ $class->nom_classe }}" required /> --}}
                    <div class="form-group">
                        <label>Nom complet de la classe :</label>
                        <div id="class_name_display" class="alert alert-info"></div>
                    </div>
                    <div class="form-group">
                        <label for="option_id">Option</label>
                        <select name="option_id" id="option_id" class="form-control" required>
                            @foreach($options as $option)
                                <option value="{{ $option->id }}" {{ $option->id == $class->option_id ? 'selected' : '' }}>{{ $option->nom }}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="form-group">
                        <label for="niveau_id">Niveau</label>
                        <select name="niveau_id" id="niveau_id" class="form-control" required>
                            @foreach($niveaux as $niveau)
                                <option value="{{ $niveau->id }}" {{ $niveau->id == $class->niveau_id ? 'selected' : '' }}>{{ $niveau->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                <button type="submit" class="rounded-md bg-blue-800 px-3 py-2 text-sm
font-semibold text-white shadow-sm hover:bg-blue-700 focus-visible:outline focus-
visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-800 m-3">Mettre à jour</button>
            </form>
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
