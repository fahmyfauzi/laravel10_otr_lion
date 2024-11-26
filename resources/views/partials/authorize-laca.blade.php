 <span>Date:
     @if ($submission->assessment)
         {{ \Carbon\Carbon::parse($submission->assessment->authorizeLaca->created_at)->translatedFormat('l, d F Y') }}
     @endif
 </span>

 <div class="border ">
     <div class=" text-center text-allign-center bg-light">
         <span class=" text-black d-block fs-5 fw-semibold">Authorization LACA</span>
         <span class=" text-muted ">(fill by quality inspector)</span>
     </div>
     <hr class="my-0">
     <div class="p-2">
         <div class="d-flex flex-wrap gap-3">
             @php
                 $typeChecked = optional($submission->assessment->authorizeLaca)->type;
             @endphp
             <div class="form-check">
                 <input class="form-check-input" type="checkbox" id="initial" name="type" value="initial"
                     {{ $typeChecked === 'initial' ? 'checked' : '' }}>
                 <label class="form-check-label" for="initial">Initial</label>
             </div>
             <div class="form-check">
                 <input class="form-check-input" type="checkbox" id="additional" name="type" value="additional"
                     {{ $typeChecked === 'additional' ? 'checked' : '' }}>
                 <label class="form-check-label" for="additional">Additional</label>
             </div>
             <div class="form-check">
                 <input class="form-check-input" type="checkbox" id="renewal" name="type" value="renewal"
                     {{ $typeChecked === 'renewal' ? 'checked' : '' }}>
                 <label class="form-check-label" for="renewal">Renewal</label>
             </div>
         </div>

         <div class="row align-items-center mt-3">
             <label for="no" class="col-sm-4 col-form-label">No.</label>
             <div class="col-sm-8">
                 {{ optional($submission->assessment->authorizeLaca)->no ?? '-' }}
             </div>
         </div>

         <div class="row align-items-center mt-3">
             <label for="validy" class="col-sm-4 col-form-label">Validity</label>
             <div class="col-sm-8">
                 {{ optional($submission->assessment->authorizeLaca)->validy ?? '-' }}
             </div>
         </div>

         <div class="row  mt-3">
             <label for="scope" class="col-sm-4 col-form-label">Scope</label>
             <div class="col-sm-8 mt-2">
                 @php
                     $scope = optional($submission->assessment->authorizeLaca);
                 @endphp
                 <div class="d-flex flex-wrap gap-4">
                     <div class="form-check">
                         <input class="form-check-input" type="checkbox" id="mr" name="scope[mr]" value="1"
                             {{ $scope->mr ? 'checked' : '' }}>
                         <label class="form-check-label" for="mr">MR</label>
                     </div>
                     <div class="form-check">
                         <input class="form-check-input" type="checkbox" id="rii" name="scope[rii]" value="1"
                             {{ $scope->rii ? 'checked' : '' }}>
                         <label class="form-check-label" for="rii">RII</label>
                     </div>
                     <div class="form-check">
                         <input class="form-check-input" type="checkbox" id="etops" name="scope[etops]"
                             value="1" {{ $scope->etops ? 'checked' : '' }}>
                         <label class="form-check-label" for="etops">ETOPS</label>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
