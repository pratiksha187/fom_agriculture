<fieldset class="land-documents" data-enquiry-panel="land_registration" aria-describedby="land-documents-help">
    <legend>Register your land / जमीन नोंदणी</legend>
    <p class="form-help" id="land-documents-help">For land registration enquiries, add your land location and upload the documents you have available. All document uploads are optional. PDF, JPG or PNG, up to 2 MB each and 6 MB in total. Download links are shared with our team through WhatsApp and expire after 7 days.</p>
    <div class="land-field"><label for="land_location">Land location <span aria-hidden="true">*</span></label><input id="land_location" name="land_location" type="text" maxlength="250" placeholder="Village, taluka and district" value="{{ old('land_location') }}" aria-describedby="land-documents-help @error('land_location') land-location-error @enderror" @error('land_location') aria-invalid="true" @enderror>@error('land_location')<small class="field-error" id="land-location-error">{{ $message }}</small>@enderror</div>
    <div class="land-field"><label for="survey_number">Survey / Gat number <span class="optional">(optional)</span></label><input id="survey_number" name="survey_number" type="text" maxlength="100" placeholder="Survey or Gat number" value="{{ old('survey_number') }}" @error('survey_number') aria-invalid="true" aria-describedby="survey-number-error" @enderror>@error('survey_number')<small class="field-error" id="survey-number-error">{{ $message }}</small>@enderror</div>
    @error('documents')<p class="field-error" role="alert">{{ $message }} Please select your documents again.</p>@enderror
    @foreach(config('project.land_documents') as $key => $label)
        <div class="land-field">
            <label for="document_{{ $key }}">{{ $label }} <span class="optional">(optional)</span></label>
            <input id="document_{{ $key }}" name="documents[{{ $key }}]" type="file" accept=".pdf,.jpg,.jpeg,.png" aria-describedby="land-documents-help @error('documents.'.$key) document-{{ $key }}-error @enderror" @error('documents.'.$key) aria-invalid="true" @enderror>
            @error('documents.'.$key)<small class="field-error" id="document-{{ $key }}-error">{{ $message }} Please select this file again.</small>@enderror
        </div>
    @endforeach
    <p class="form-help">This submits a land enquiry to our team. Our team will contact you to discuss the next steps.</p>
</fieldset>
