@extends('layouts.app')
@section('title', 'Submission')

@section('content')
    <h2>PERSONNEL AUTHORIZED QUALIFICATION RECORD</h2>
    <div class="container">
        <form action="{{ route('submission.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if (session('error'))
                @component('components.alert', ['type' => 'danger', 'message' => session('error')])
                @endcomponent
            @endif
            @if ($errors->any())
                @component('components.alert', ['type' => 'danger', 'message' => $errors->first()])
                @endcomponent
            @endif
            <div class="row g-4">
                <!-- Biodata -->
                <div class="col-md-8">
                    <h3>Biodata</h3>
                    <div class="d-flex flex-column flex-md-row gap-3">
                        <div class="border text-white p-2 text-center flex-shrink-0"
                            style="min-width: 150px; cursor: pointer;" id="fileUploadBox">
                            <!-- Image Preview -->
                            <img id="imagePreview" src="#" alt="Image Preview" class="img-fluid d-none"
                                style="max-width: 100px; ">

                            <!-- Placeholder for No Image -->
                            <span id="placeholderText">Click to upload an image</span>

                            <!-- File Input (Hidden) -->
                            <input class="form-control d-none" name="photo" type="file" id="formFile"
                                accept="image/*">
                        </div>
                        <div class="w-100">
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="name" placeholder="Input your name"
                                        value="{{ old('name') }}">

                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="mb-3 row">
                                <label for="place_of_birth" class="col-sm-4 col-form-label">Place / Date of Birth</label>
                                <div class="col-sm-8">
                                    <div class="d-flex flex-wrap gap-2">
                                        <input type="text"
                                            class="form-control @error('place_of_birth') is-invalid @enderror"
                                            name="place_of_birth" id="place_of_birth"
                                            placeholder="Input your place of birth" value="{{ old('place_of_birth') }}">
                                        @error('place_of_birth')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <input type="date"
                                            class="form-control @error('date_of_birth') is-invalid @enderror"
                                            name="date_of_birth" value="{{ old('date_of_birth') }}">
                                        @error('date_of_birth')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="address" class="col-sm-4 col-form-label">address</label>
                                <div class="col-sm-8">
                                    <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror"
                                        placeholder="Input your address">{{ old('address') }}</textarea>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-4 col-form-label">Phone</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" id="phone" placeholder="Input your phone"
                                        value="{{ old('phone') }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="company_no_id" class="col-sm-4 col-form-label">Company ID No.</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('company_no_id') is-invalid @enderror"
                                        name="company_no_id" id="company_no_id" placeholder="Input your company ID no."
                                        value="{{ old('company_no_id') }}">
                                    @error('company_no_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="last_formal_education" class="col-sm-4 col-form-label">Last Formal
                                    Education</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control @error('last_formal_education') is-invalid @enderror"
                                        name="last_formal_education" id="last_formal_education"
                                        placeholder="Input your last formal education"
                                        value="{{ old('last_formal_education') }}">
                                    @error('last_formal_education')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Authorization LACA -->
                <div class="col-md-4">
                    <h3>Authorization LACA</h3>
                    <div class="d-flex flex-wrap gap-3 mb-3">
                        <div class="form-check">
                            <input class="form-check-input " type="radio" id="initial" name="type" value="initial">
                            <label class="form-check-label" for="initial">Initial</label>

                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="additional" name="type"
                                value="additional">
                            <label class="form-check-label" for="additional">Additional</label>

                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" id="renewal" name="type"
                                value="renewal">
                            <label class="form-check-label" for="renewal">Renewal</label>
                        </div>
                        @error('type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 row">
                        <label for="no" class="col-sm-4 col-form-label">No.</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('no') is-invalid @enderror" name="no"
                                id="no" placeholder="Input your laca no" value="{{ old('no') }}">
                            @error('no')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="validy" class="col-sm-4 col-form-label">Validy</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('validy') is-invalid @enderror"
                                name="validy" id="validy" placeholder="Input your validity"
                                value="{{ old('validy') }}">
                            @error('validy')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="scope" class="col-sm-4 col-form-label">Scope</label>
                        <div class="col-sm-8 align-items-center ">
                            <div class="d-flex flex-wrap gap-3">
                                <div class="form-check">
                                    <input class="form-check-input " type="checkbox" id="mr" name="mr"
                                        value="1">
                                    <label class="form-check-label" for="mr">MR</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input " type="checkbox" id="rii" name="rii"
                                        value="1">
                                    <label class="form-check-label" for="rii">RII</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input " type="checkbox" id="etops" name="etops"
                                        value="1">
                                    <label class="form-check-label" for="etops">ETOPS</label>
                                </div>
                            </div>

                            <span class="text-danger">please choose one</span>

                        </div>
                    </div>

                </div>

                <!-- TYPE OF RATING TRAINING &  -->
                <div class="col-12">
                    <div class="row">
                        <!-- TYPE OF RATING TRAINING -->
                        <div class="col-md-6">
                            <h3 class="mb-4">Type of Rating Training</h3>
                            <!-- Repeater Section -->
                            <div class="repeater">
                                <div class="form-group">
                                    <div data-repeater-list="type_of_rating_training">
                                        <!-- Item Template -->
                                        <div data-repeater-item class="mb-2 rounded">
                                            <div class="row align-items-center">
                                                <!-- Course -->
                                                <div class="col-md-7 mb-2 mb-md-0">
                                                    <div class="form-floating">
                                                        <input type="text" name="course"
                                                            class="form-control @error('type_of_rating_training.*.course') is-invalid @enderror"
                                                            id="course" placeholder="Input your course"
                                                            value="{{ old('type_of_rating_training.0.course') }}">
                                                        <label for="course">Course</label>
                                                        @error('type_of_rating_training.*.course')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- Year -->
                                                <div class="col-md-3 mb-2 mb-md-0">
                                                    <div class="form-floating">
                                                        <input type="number" name="year"
                                                            class="form-control @error('type_of_rating_training.*.year') is-invalid @enderror"
                                                            id="year" placeholder="Year"
                                                            value="{{ old('type_of_rating_training.0.year') }}">
                                                        <label for="year">Year</label>
                                                        @error('type_of_rating_training.*.year')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- Delete Button -->
                                                <div class="col-md-2 text-md-end">
                                                    <button type="button" data-repeater-delete
                                                        class="btn btn-sm btn-danger d-block w-100">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Item Template -->
                                    </div>
                                </div>

                                <!-- Add Button -->
                                <div class="form-group mt-4">
                                    <button type="button" data-repeater-create
                                        class="btn btn-primary d-flex align-items-center">
                                        <i class="bi bi-plus-circle me-2"></i> Add
                                    </button>
                                </div>
                            </div>

                            <!-- End Repeater Section -->
                        </div>

                        <!-- TYPE OF BASIC LICENSE -->
                        <div class="col-md-6">
                            <h3 class="mb-4">BASIC LICENSE</h3>
                            <!-- Repeater Section -->
                            <div class="repeater">
                                <div class="form-group">
                                    <div data-repeater-list="basic_license">
                                        <!-- Item Template -->
                                        <div data-repeater-item class="mb-2 rounded">
                                            <div class="row align-items-center">
                                                <!-- category -->
                                                <div class="col-md-5 mb-2 mb-md-0">
                                                    <div class="form-floating">
                                                        <input type="text" name="category"
                                                            class="form-control @error('basic_license.*.category') is-invalid @enderror"
                                                            id="category" placeholder="Input your category"
                                                            value="{{ old('basic_license.0.category') }}">
                                                        <label for="category">Category</label>
                                                        @error('basic_license.*.category')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- card_no -->
                                                <div class="col-md-5 mb-2 mb-md-0">
                                                    <div class="form-floating">
                                                        <input type="text" name="card_no"
                                                            class="form-control @error('basic_license.*.card_no') is-invalid @enderror"
                                                            id="card_no" placeholder="Card No."
                                                            value="{{ old('basic_license.0.card_no') }}">
                                                        <label for="card_no">Card No.</label>
                                                        @error('basic_license.*.card_no')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- Delete Button -->
                                                <div class="col-md-2 text-md-end">
                                                    <button type="button" data-repeater-delete
                                                        class="btn btn-sm btn-danger d-block w-100">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Item Template -->
                                    </div>
                                </div>

                                <!-- Add Button -->
                                <div class="form-group mt-4">
                                    <button type="button" data-repeater-create
                                        class="btn btn-primary d-flex align-items-center">
                                        <i class="bi bi-plus-circle me-2"></i> Add
                                    </button>
                                </div>
                            </div>

                            <!-- End Repeater Section -->
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>AME LICENSE</h3>
                            <div class="mb-3 row">
                                <label for="license_no" class="col-sm-4 col-form-label">AME LICENSE No.</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('license_no') is-invalid @enderror"
                                        name="license_no" id="license_no" placeholder="Input your ame license no"
                                        value="{{ old('license_no') }}">
                                    @error('license_no')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="vut" class="col-sm-4 col-form-label">V.U.T</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('vut') is-invalid @enderror"
                                        name="vut" id="vut" placeholder="Input your ame license v.u.t"
                                        value="{{ old('vut') }}">
                                    @error('vut')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <h3>Mandatory Training</h3>
                            <div class="mb-3 row">
                                <label for="human_factory" class="col-sm-4 col-form-label">Human Factor
                                    Training</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control @error('human_factory') is-invalid @enderror"
                                        name="human_factory" id="human_factory"
                                        placeholder="Input your last performed year" value="{{ old('human_factory') }}">
                                    @error('human_factory')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="sms_training" class="col-sm-4 col-form-label">SMS
                                    TRAINING</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control @error('sms_training') is-invalid @enderror"
                                        name="sms_training" id="sms_training"
                                        placeholder="Input your last performed year" value="{{ old('sms_training') }}">
                                    @error('sms_training')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="rvsm_pbn_training" class="col-sm-4 col-form-label">RVSM PBN
                                    TRAINING</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control @error('rvsm_pbn_training') is-invalid @enderror"
                                        name="rvsm_pbn_training" id="rvsm_pbn_training"
                                        placeholder="Input your last performed year"
                                        value="{{ old('rvsm_pbn_training') }}">
                                    @error('rvsm_pbn_training')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="etops_training" class="col-sm-4 col-form-label">ETOPS TRAINING
                                    (only for applicant for A/C type effective ETOPS)</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control @error('etops_training') is-invalid @enderror"
                                        name="etops_training" id="etops_training"
                                        placeholder="Input your last performed year" value="{{ old('etops_training') }}">
                                    @error('etops_training')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="rii_training" class="col-sm-4 col-form-label">RII TRAINING
                                    (only for applicant RII)</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control @error('rii_training') is-invalid @enderror"
                                        name="rii_training" id="rii_training"
                                        placeholder="Input your last performed year" value="{{ old('rii_training') }}">
                                    @error('rii_training')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Lion Air Aircraft Type -->
                            <h3 class="mb-4">Lion Air Aircraft Type</h3>
                            <!-- Repeater Section -->
                            <div class="repeater">
                                <div class="form-group">
                                    <div data-repeater-list="lion_air_aircraft_type">
                                        <!-- Item Template -->
                                        <div data-repeater-item class="mb-2 rounded">
                                            <div class="row align-items-center">
                                                <!-- type -->
                                                <div class="col-md-10 mb-2 mb-md-0">
                                                    <div class="form-floating">
                                                        <input type="text" name="air_craft_type"
                                                            class="form-control @error('lion_air_aircraft_type.*.air_craft_type') is-invalid @enderror"
                                                            id="type" placeholder="Input your type"
                                                            value="{{ old('lion_air_aircraft_type.*.air_craft_type') }}">
                                                        <label for="type">Type</label>
                                                        @error('lion_air_aircraft_type.*.air_craft_type')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- Delete Button -->
                                                <div class="col-md-2 text-md-end">
                                                    <button type="button" data-repeater-delete
                                                        class="btn btn-sm btn-danger d-block w-100">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Item Template -->
                                    </div>
                                </div>

                                <!-- Add Button -->
                                <div class="form-group mt-4">
                                    <button type="button" data-repeater-create
                                        class="btn btn-primary d-flex align-items-center">
                                        <i class="bi bi-plus-circle me-2"></i> Add
                                    </button>
                                </div>
                            </div>

                            <!-- End Repeater Section -->
                        </div>

                    </div>

                </div>

                <div class="text-end">
                    <button class="btn btn-primary ">Submit</button>
                </div>
            </div>
        </form>

    </div>
    </div>
@endsection

@push('styles')
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- repeater -->
    <script src="{{ asset('assets/js/jquery-repeater.js') }}"></script>
    <script>
        $('.repeater').repeater({
            initEmpty: false,


            defaultValues: {
                'text-input': ''
            },

            show: function() {
                // Cek jumlah item saat ini
                const maxItems = 7; // Maksimal 6 item
                const currentItems = $(this).closest('.repeater').find('[data-repeater-item]')
                    .length;

                if (currentItems < maxItems) {
                    $(this).slideDown();
                } else {
                    alert('You can only add up to 6 items.');
                }

            },
            isFirstItemUndeletable: true,
            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    </script>

    <!-- image preview -->
    <script>
        const fileUploadBox = document.getElementById('fileUploadBox');
        const formFile = document.getElementById('formFile');
        const imagePreview = document.getElementById('imagePreview');
        const placeholderText = document.getElementById('placeholderText');

        // Trigger input file when clicking on the box
        fileUploadBox.addEventListener('click', function() {
            formFile.click();
        });

        // Show image preview when a file is selected
        formFile.addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result; // Set image source to preview
                    imagePreview.classList.remove('d-none'); // Show the image preview
                    placeholderText.classList.add('d-none'); // Hide the placeholder text
                };

                reader.readAsDataURL(file); // Read the file as a data URL
            } else {
                imagePreview.src = '#';
                imagePreview.classList.add('d-none'); // Hide the image preview
                placeholderText.classList.remove('d-none'); // Show the placeholder text
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const checkboxes = document.querySelectorAll(".form-check-input");

            // Mapping antara checkbox ID dengan elemen yang akan ditampilkan
            const mappings = {
                "rii": "rii_training",
                "etops": "etops_training",
            };

            // Menambahkan event listener pada setiap checkbox
            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener("change", function() {
                    const fieldId = mappings[this.id];

                    if (fieldId) {
                        const field = document.getElementById(fieldId).closest(".row");

                        // Tampilkan atau sembunyikan field berdasarkan checkbox status
                        if (this.checked) {
                            field.style.display = "flex";
                        } else {
                            field.style.display = "none";
                        }
                    }
                });
            });

            // Menyembunyikan semua elemen terkait pada awal
            for (const fieldId in mappings) {
                const field = document.getElementById(mappings[fieldId]).closest(".row");
                if (field) {
                    field.style.display = "none";
                }
            }
        });
    </script>
@endpush
