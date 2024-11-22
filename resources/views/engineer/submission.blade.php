@extends('layouts.app')
@section('title', 'Submission')

@section('content')
    <h2>PERSONNEL AUTHORIZED QUALIFICATION RECORD</h2>
    <div class="container">
        <form action="{{ route('submission.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                            <input class="form-control d-none" type="file" id="formFile" accept="image/*">
                        </div>
                        <div class="w-100">
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Input your name">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="place_of_birth" class="col-sm-4 col-form-label">Place / Date of Birth</label>
                                <div class="col-sm-8">
                                    <div class="d-flex flex-wrap gap-2">
                                        <input type="text" class="form-control" name="place_of_birth" id="place_of_birth"
                                            placeholder="Input your place of birth">
                                        <input type="date" class="form-control" name="date_of_birth">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-4 col-form-label">Address</label>
                                <div class="col-sm-8">
                                    <textarea name="address" id="address" class="form-control" placeholder="Input your address"></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-4 col-form-label">Phone</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="phone" id="phone"
                                        placeholder="Input your phone">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="company_id_no" class="col-sm-4 col-form-label">Company ID No.</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="company_id_no" id="company_id_no"
                                        placeholder="Input your company ID no.">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="last_formal_education" class="col-sm-4 col-form-label">Last Formal
                                    Education</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="last_formal_education"
                                        id="last_formal_education" placeholder="Input your last formal education">
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
                            <input class="form-check-input" type="radio" id="initial" name="laca_type">
                            <label class="form-check-label" for="initial">Initial</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="additional" name="laca_type">
                            <label class="form-check-label" for="additional">Additional</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="renewal" name="laca_type">
                            <label class="form-check-label" for="renewal">Renewal</label>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no" class="col-sm-4 col-form-label">No.</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="no" id="no"
                                placeholder="Input your no">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="validy" class="col-sm-4 col-form-label">Validy</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="validy" id="validy"
                                placeholder="Input your validity">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="scope" class="col-sm-4 col-form-label">Scope</label>
                        <div class="col-sm-8 align-items-center d-flex">
                            <div class="d-flex flex-wrap gap-3 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="mr" value="MR">
                                    <label class="form-check-label" for="mr">MR</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rii" value="RII">
                                    <label class="form-check-label" for="rii">RII</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="etops" value="ETOPS">
                                    <label class="form-check-label" for="etops">ETOPS</label>
                                </div>
                            </div>
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
                                        <div data-repeater-item class=" mb-2  rounded">
                                            <div class="row align-items-center">
                                                <!-- Course -->
                                                <div class="col-md-7 mb-2 mb-md-0">
                                                    <div class="form-floating">
                                                        <input type="text" name="course" class="form-control "
                                                            id="course" placeholder="Input your course" required>
                                                        <label for="course">Course</label>
                                                    </div>
                                                </div>
                                                <!-- Year -->
                                                <div class="col-md-3 mb-2 mb-md-0">
                                                    <div class="form-floating">
                                                        <input type="number" name="year" class="form-control"
                                                            id="year" placeholder="Year" required>
                                                        <label for="year">Year</label>
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
                                        <div data-repeater-item class=" mb-2  rounded">
                                            <div class="row align-items-center">
                                                <!-- category -->
                                                <div class="col-md-5 mb-2 mb-md-0">
                                                    <div class="form-floating">
                                                        <input type="text" name="category" class="form-control"
                                                            id="category" placeholder="Input your category" required>
                                                        <label for="category">Category</label>
                                                    </div>
                                                </div>
                                                <!-- card_no -->
                                                <div class="col-md-5 mb-2 mb-md-0">
                                                    <div class="form-floating">
                                                        <input type="text" name="card_no" class="form-control"
                                                            id="card_no" placeholder="card_no" required>
                                                        <label for="card_no">Card No.</label>
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
                                <label for="ame_license_no" class="col-sm-4 col-form-label">AME LICENSE No.</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="ame_license_no" id="ame_license_no"
                                        placeholder="Input your ame license no">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="v_u_t" class="col-sm-4 col-form-label">V.U.T</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="v_u_t" id="v_u_t"
                                        placeholder="Input your ame license v.u.t">
                                </div>
                            </div>
                            <h3>Mandatory Training</h3>
                            <div class="mb-3 row">
                                <label for="last_performed_hft" class="col-sm-4 col-form-label">Human Factor
                                    Training</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="last_performed_hft"
                                        id="last_performed_hft" placeholder="Input your human factor training">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="last_performed_smstraining" class="col-sm-4 col-form-label">SMS
                                    TRAINING</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="last_performed_smstraining"
                                        id="last_performed_smstraining" placeholder="Input your sms training">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="last_performed_rvsm_pbn_trainig" class="col-sm-4 col-form-label">RVSM PBN
                                    TRAINING</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="last_performed_rvsm_pbn_trainig"
                                        id="last_performed_rvsm_pbn_trainig" placeholder="Input your sms training">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="last_performed_etops_training" class="col-sm-4 col-form-label">ETOPS TRAING
                                    (only
                                    for applicant for A/C type effective ETOPS)</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="last_performed_etops_training"
                                        id="last_performed_etops_training" placeholder="Input your etops training">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="last_performed_rii_training" class="col-sm-4 col-form-label">RII TRAINING
                                    (only
                                    for applicant RII)</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="last_performed_rii_training"
                                        id="last_performed_rii_training" placeholder="Input your etops training">
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
                                        <div data-repeater-item class=" mb-2  rounded">
                                            <div class="row align-items-center">
                                                <!-- category -->
                                                <div class="col-md-10 mb-2 mb-md-0">
                                                    <div class="form-floating">
                                                        <input type="text" name="category" class="form-control"
                                                            id="category" placeholder="Input your category" required>
                                                        <label for="category">Type</label>
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
                "rii": "last_performed_rii_training",
                "etops": "last_performed_etops_training",
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
