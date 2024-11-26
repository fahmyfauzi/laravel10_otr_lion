@extends('layouts.app')
@section('title', 'Submission')

@section('content')
    <div class="container">
        <h2 class="mb-3">PERSONNEL AUTHORIZED QUALIFICATION RECORD</h2>
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
                <div class="col-md-12">
                    <div class="d-flex flex-column flex-md-row gap-3">
                        <div class="border text-white p-2 text-center flex-shrink-0"
                            style="min-width: 150px; cursor: pointer;" id="fileUploadBox">
                            <!-- Image Preview -->
                            <img id="imagePreview" src="#" alt="Image Preview" class="img-fluid d-none"
                                style="max-width: 100px; ">

                            <!-- Placeholder for No Image -->
                            <span id="placeholderText" class="text-black">Click to upload an image</span>

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

                <!-- TYPE OF RATING TRAINING & BASIC LICENSE -->
                <div class="col-12">
                    <div class="row">
                        <!-- TYPE OF RATING TRAINING -->
                        <div class="col-md-6 ">
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
                                                            value="{{ old('type_of_rating_training.*.course') }}">
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
                                                            value="{{ old('type_of_rating_training.*.year') }}">
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
                                <span class="text-muted">maximum 6 Type of Rating Training</span>

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
                                                <!-- Category -->
                                                <div class="col-md-5 mb-2 mb-md-0">
                                                    <div class="form-floating">
                                                        <input type="text" name="category"
                                                            class="form-control @error('basic_license.*.category') is-invalid @enderror"
                                                            id="category" placeholder="Input your category"
                                                            value="{{ old('basic_license.*.category') }}">
                                                        <label for="category">Category</label>
                                                        @error('basic_license.*.category')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!-- Card No -->
                                                <div class="col-md-5 mb-2 mb-md-0">
                                                    <div class="form-floating">
                                                        <input type="text" name="card_no"
                                                            class="form-control @error('basic_license.*.card_no') is-invalid @enderror"
                                                            id="card_no" placeholder="Card No."
                                                            value="{{ old('basic_license.*.card_no') }}">
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

                                <span class="text-muted">maximum 6 Basic License</span>
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

                        </div>

                        <!-- Lion Air Aircraft Type -->
                        <div class="col-md-6">
                            <h3 class="mb-4">Lion Air Aircraft Type</h3>
                            <!-- Repeater Section -->
                            <div class="repeater">
                                <div class="form-group">
                                    <div data-repeater-list="lion_air_aircraft_type">
                                        <!-- Item Template -->
                                        <div data-repeater-item class="mb-2 rounded">
                                            <div class="row align-items-center">
                                                <!-- Type -->
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

                                <span class="text-muted">maximum 6 Lion Air Aircraft Type</span>
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
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('d-none');
                    placeholderText.classList.add('d-none');
                };

                // Read the file as a data URL
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '#';
                imagePreview.classList.add('d-none');
                placeholderText.classList.remove('d-none');
            }
        });
    </script>
@endpush
