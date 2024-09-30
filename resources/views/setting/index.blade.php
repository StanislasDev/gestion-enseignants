<x-default-layout>
    <div class="">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <h1 class="app-page-title">Settings</h1>
                <hr class="mb-4" />

                <div class="container">
                    <h1 class="flex justify-center text-2xl text-blue-500">Liste des Enseignants</h1>
                    <a href="{{ route('admin.enseignants.create') }}" class="btn btn-primary mb-2">Ajouter un Enseignant</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($enseignants as $enseignant)
                                <tr>
                                    <td>{{ $enseignant->id }}</td>
                                    <td>{{ $enseignant->nom }}</td>
                                    <td>{{ $enseignant->prenom }}</td>
                                    <td>{{ $enseignant->email }}</td>
                                    <td>{{ $enseignant->telephone }}</td>
                                    <td>
                                        <a href="{{ route('admin.enseignants.edit', $enseignant->id) }}" class="btn btn-warning" target="blank">Modifier</a>
                                        <form x-ref="delete" action="{{ route('admin.enseignants.destroy', $enseignant->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" @click.prevent="$ref.delete.submit()" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enseignant?');">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!--//row-->
                <hr class="my-4" />
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-4">
                        <h3 class="section-title">Plan</h3>
                        <div class="section-intro">
                            Ici ce passe la gestion des séances de chaque enseignant dans chaque spécialité. <a href="{{ route('admin.seances.index') }}">Learn more</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <div class="mb-2"><strong>Current Plan:</strong> Pro</div>
                                <div class="mb-2">
                                    <strong>Status:</strong>
                                    <span class="badge bg-success">Active</span>
                                </div>
                                <div class="mb-2"><strong>Expires:</strong> 2030-09-24</div>
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <a class="btn app-btn-primary" href="{{ route('admin.seances.create') }}" target="blank">Créer une seance</a>
                                    </div>
                                    <div class="col-auto">
                                        <a class="btn app-btn-secondary" href="{{ route('home') }}">Cancel Plan</a>
                                    </div>
                                </div>
                            </div>
                            <!--//app-card-body-->
                        </div>
                        <!--//app-card-->
                    </div>
                </div>
                <!--//row-->
                <hr class="my-4" />
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-4">
                        <h3 class="section-title">Data &amp; Privacy</h3>
                        <div class="section-intro">
                            Ce lien vous dirigera vers la page de gestion des séances. Une fois sur la page, cliquez sur le titre d'une séance pour pouvoir affecter une présence à l'enseignant concerné.
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <form class="settings-form">
                                    <div class="mt-3">
                                        <button type="submit" class="btn app-btn-primary">
                                            <a href="{{ route('admin.seances.index') }}">Créer une présences</a>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!--//app-card-body-->
                        </div>
                        <!--//app-card-->
                    </div>
                </div>
                <!--//row-->
                <hr class="my-4" />
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-4">
                        <h3 class="section-title">Notifications</h3>
                        <div class="section-intro">
                            Settings section intro goes here. Duis velit massa, faucibus non
                            hendrerit eget.
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <form class="settings-form">
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="settings-switch-1"
                                            checked />
                                        <label class="form-check-label" for="settings-switch-1">Project
                                            notifications</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="settings-switch-2" />
                                        <label class="form-check-label" for="settings-switch-2">Web browser push
                                            notifications</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="settings-switch-3"
                                            checked />
                                        <label class="form-check-label" for="settings-switch-3">Mobile push
                                            notifications</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="settings-switch-4" />
                                        <label class="form-check-label" for="settings-switch-4">Lorem ipsum
                                            notifications</label>
                                    </div>
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" id="settings-switch-5" />
                                        <label class="form-check-label" for="settings-switch-5">Lorem ipsum
                                            notifications</label>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn app-btn-primary">
                                            Save Changes
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!--//app-card-body-->
                        </div>
                        <!--//app-card-->
                    </div>
                </div>
                <!--//row-->
                <hr class="my-4" />
            </div>
            <!--//container-fluid-->
        </div>
        <!--//app-content-->

        <footer class="app-footer">
            <div class="container text-center py-3">
                <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart"
                        style="color: #fb866a"></i> by
                    <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a>
                    for developers</small>
            </div>
        </footer>
        <!--//app-footer-->
    </div>
    <!--//app-wrapper-->
</x-default-layout>
