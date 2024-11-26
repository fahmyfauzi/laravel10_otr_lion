@extends('layouts.app')
@section('title', 'Assessment')

@section('content')

    @if (session('error'))
        @component('components.alert', ['type' => 'danger', 'message' => session('success')])
        @endcomponent
    @endif

    <div class="container">
        <form action="{{ route('quality-inspector.store', $submission->id) }}" method="POST">
            @csrf
            @include('quality-inspector.partials.form-control')
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

        <!-- signature -->
        <div class="justify-content-between text-center">
            @include('partials.signature')
        </div>

        <div class="d-flex ">
            <div class="col-md-6">
                @include('partials.note')
            </div>
            <div class="col-md-6 text-center ">
                <span class="fw-semibold fs-1 bg-success py-2 px-4 rounded text-white d-none" id="resultPass">PASS</span>
                <span class="fw-semibold fs-1 bg-danger py-2 px-4 rounded text-white d-none" id="resultFail">Fail</span>
            </div>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const inputs = document.querySelectorAll(
                'input[name^="assessment_material_"]'); // Ambil semua input material
            // Ambil input Total Result
            const totalResultInput = document.getElementById("total_result");

            // Fungsi untuk menghitung total hasil
            function calculateTotal() {
                let total = 0;
                let countFilled = 0;

                inputs.forEach(input => {
                    const value = parseFloat(input.value);
                    if (!isNaN(value)) {
                        total += value;
                        countFilled++;
                    }
                });

                // Jika semua nilai telah diisi, hitung rata-rata dan tampilkan
                if (countFilled === inputs.length) {
                    // Hitung rata-rata (2 desimal)
                    const average = (total / inputs.length).toFixed(2);
                    totalResultInput.value = average;

                    // Tampilkan status berdasarkan nilai
                    if (average >= 70) {
                        document.getElementById("resultPass").classList.remove("d-none");
                        document.getElementById("resultFail").classList.add("d-none");
                    } else {
                        document.getElementById("resultFail").classList.remove("d-none");
                        document.getElementById("resultPass").classList.add("d-none");
                    }
                } else {
                    // Kosongkan jika belum semua terisi
                    totalResultInput.value = "";
                }
            }

            // Tambahkan event listener ke setiap input material
            inputs.forEach(input => {
                input.addEventListener("input", calculateTotal);
            });
        });
    </script>
    <script>
        // Select all elements with the class 'value-assessment'
        document.querySelectorAll('.value-assessment').forEach(function(element) {
            element.addEventListener('input', function() {
                let value = this.value;

                // Ensure there are only two decimal places
                if (value.indexOf('.') !== -1) {
                    let parts = value.split('.');
                    parts[1] = parts[1].substring(0, 2);
                    value = parts.join('.');
                }

                // Ensure the value does not exceed 100
                if (parseFloat(value) > 100) {
                    value = 100;
                }

                // Set the value back to the input field
                this.value = value;
            });
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

            // Fungsi untuk menampilkan atau menyembunyikan elemen berdasarkan checkbox
            const toggleFieldVisibility = (checkbox) => {
                const fieldId = mappings[checkbox.id];

                if (fieldId) {
                    const field = document.getElementById(fieldId)?.closest(".row");

                    if (field) {
                        // Tampilkan elemen jika checkbox dicentang
                        field.style.display = checkbox.checked ? "flex" : "none";
                    }
                }
            };

            // Menambahkan event listener untuk setiap checkbox
            checkboxes.forEach((checkbox) => {
                // Atur visibilitas saat halaman dimuat
                toggleFieldVisibility(checkbox);

                // Tambahkan event listener untuk perubahan status
                checkbox.addEventListener("change", function() {
                    toggleFieldVisibility(this);
                });
            });
        });
    </script>
@endpush
