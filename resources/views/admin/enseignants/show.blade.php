<x-default-layout title="Information sur le pr. {{ $enseignant->nom }}" >
    <div class="mt-[3%] col-12 col-lg-6 mx-auto">
        <div class="app-card app-card-account bg-gray-300 shadow-sm d-flex flex-column align-items-center text-center">
            <div class="app-card-header p-3 border-bottom-0 w-100">
                <div class="row flex justify-start items-center gx-3">
                    <div class="col-auto">
                        <div class="app-icon-holder d-flex justify-center items-centre" style="width: 50px; height: 50px; border-radius: 50%;">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z">
                                </path>
                            </svg>
                        </div><!--//icon-holder-->
                    </div><!--//col-->
                    <div class="col-auto">
                        <h4 class="app-card-title">Profile</h4>
                    </div><!--//col-->
                </div><!--//row-->
            </div><!--//app-card-header-->
            <div class="app-card-body px-4 w-100">
                <div class="item border-bottom py-3">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-auto">
                            <div class="item-label mb-2"><strong>Photo</strong></div>
                            <div class="item-data">
                                <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                </svg>
                            </div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//item-->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Name</strong></div>
                            <div class="item-data">{{ $enseignant->nom }} {{ $enseignant->prenom }}</div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//item-->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Email</strong></div>
                            <div class="item-data">{{ $enseignant->email }}</div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//item-->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Numéro de téléphone</strong></div>
                            <div class="item-data">{{ $enseignant->telephone }}</div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//item-->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Website</strong></div>
                            <div class="item-data">
                                https://{{ $enseignant->nom }}website.com
                            </div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//item-->
                <div class="item border-bottom py-3">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-auto">
                            <div class="item-label"><strong>Location</strong></div>
                            <div class="item-data">Bafoussam Ier</div>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//item-->
            </div><!--//app-card-body-->
            <div class="app-card-footer p-4 mt-auto">
                <a class="btn app-btn-secondary" href="{{ route('admin.enseignants.edit', $enseignant->id) }}">Manage Profile</a>
            </div><!--//app-card-footer-->
        </div><!--//app-card-->
    </div><!--//col-->
    
</x-default-layout>