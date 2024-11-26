  <div class="d-flex flex-column flex-md-row gap-3">
      <div class="border text-white p-2 text-center flex-shrink-0" style="min-width: 150px;" id="fileUploadBox">
          <!-- Image Preview -->
          <img id="imagePreview" src="{{ asset('storage/uploads/photos/' . $submission->personnel->photo) }}"
              alt="Image Preview" class="img-fluid" style="max-width: 100px; ">
      </div>
      <div class="w-100">
          <div class="row">
              <label for="name" class="col-sm-4 col-form-label">Name</label>
              <div class="col-sm-8">
                  {{ $submission->personnel->name }}
              </div>

          </div>
          <div class=" row">
              <label for="place_of_birth" class="col-sm-4 col-form-label">Place / Date of Birth</label>
              <div class="col-sm-8">
                  <div class="d-flex flex-wrap gap-2">
                      {{ $submission->personnel->place_of_birth }},
                      {{ $submission->personnel->date_of_birth }}
                  </div>
              </div>
          </div>

          <div class=" row">
              <label for="address" class="col-sm-4 col-form-label">Address</label>
              <div class="col-sm-8">
                  {{ $submission->personnel->address }}
              </div>
          </div>

          <div class=" row">
              <label for="phone" class="col-sm-4 col-form-label">Phone</label>
              <div class="col-sm-8">
                  {{ $submission->personnel->phone }}
              </div>
          </div>

          <div class=" row">
              <label for="company_no_id" class="col-sm-4 col-form-label">Company ID No.</label>
              <div class="col-sm-8">
                  {{ $submission->personnel->company_no_id }}
              </div>
          </div>

          <div class=" row">
              <label for="last_formal_education" class="col-sm-4 col-form-label">Last Formal
                  Education</label>
              <div class="col-sm-8">
                  {{ $submission->personnel->last_formal_education }}
              </div>
          </div>

      </div>
  </div>
