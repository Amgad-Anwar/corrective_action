@extends('dashboard.layouts.app')
@push('headScripts')
@endpush
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-md-flex align-items-center mb-3">

                <div class="breadcrumb-title pr-3">
                    {{ isset($document) ? __('Edit :type', ['type' => $document->name]) : __('Create') }}</div>
                <div class="pl-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i>
                                    {{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('corrective_actions.index') }}"><i
                                        class="bx bx-shape-polygon"></i> {{ __('actions') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{  __('Create') }}</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->
            <div class="card radius-15 border-lg-top-primary">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-0">
                            {{  __('Create') }}
                        </h4>
                    </div>
                    <hr>
                    <form method="POST"
                        action="{{ isset($document) ? route('corrective_actions.update', $document->id) : route('corrective_actions.store') }}"
                        enctype="multipart/form-data">
                        @if (isset($document))
                            @method('PUT')
                        @endif
                        @csrf
                        <div class="row">



                 





                              

                            <!-- Document Name -->
<div class="form-group col-lg-12">
    <label>{{ __('Document Name') }}</label>
    <div class="input-group input-group-lg">
        <div class="input-group-prepend">
            <span class="input-group-text bg-transparent"><i class="lni lni-document"></i></span>
        </div>
        <input type="text" class="form-control @error('document_name') is-invalid @enderror border-left-0"
               name="document_name" id="document_name" required
               value="{{ isset($document) ? $document->document_name : old('document_name') }}"
               placeholder="{{ __('Enter Document Name') }}">
        @error('document_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<!-- Issue Date -->
<div class="form-group col-lg-12">
    <label>{{ __('Issue Date') }}</label>
    <input type="date" class="form-control @error('issue_date') is-invalid @enderror"
           name="issue_date" id="issue_date"
           value="{{ isset($document) ? $document->issue_date : old('issue_date') }}">
    @error('issue_date')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Revision Date -->
<div class="form-group col-lg-12">
    <label>{{ __('Revision Date') }}</label>
    <input type="date" class="form-control @error('revision_date') is-invalid @enderror"
           name="revision_date" id="revision_date"
           value="{{ isset($document) ? $document->revision_date : old('revision_date') }}">
    @error('revision_date')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Certificate Number -->
<div class="form-group col-lg-12">
    <label>{{ __('Certificate Number') }}</label>
    <input type="text" class="form-control @error('certificate_number') is-invalid @enderror"
           name="certificate_number" id="certificate_number"
           value="{{ isset($document) ? $document->certificate_number : old('certificate_number') }}"
           placeholder="{{ __('Enter Certificate Number') }}">
    @error('certificate_number')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Nonconformance Details -->
<div class="form-group col-lg-12">
    <label>{{ __('Nonconformance Details') }}</label>
    <textarea class="form-control @error('nonconformance_details') is-invalid @enderror" name="nonconformance_details" rows="4"
              placeholder="{{ __('Enter Nonconformance Details') }}">{{ isset($document) ? $document->nonconformance_details : old('nonconformance_details') }}</textarea>
    @error('nonconformance_details')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Action Required -->
<div class="form-group col-lg-12">
    <label>{{ __('Action Required') }}</label>
    <textarea class="form-control @error('action_required') is-invalid @enderror" name="action_required" rows="4"
              placeholder="{{ __('Enter Action Required') }}">{{ isset($document) ? $document->action_required : old('action_required') }}</textarea>
    @error('action_required')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Requested By -->
<div class="form-group col-lg-12">
    <label>{{ __('Requested By') }}</label>
    <input type="text" class="form-control @error('requested_by') is-invalid @enderror"
           name="requested_by" id="requested_by"
           value="{{ isset($document) ? $document->requested_by : old('requested_by') }}"
           placeholder="{{ __('Enter Requested By') }}">
    @error('requested_by')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Request Date -->
<div class="form-group col-lg-12">
    <label>{{ __('Request Date') }}</label>
    <input type="date" class="form-control @error('request_date') is-invalid @enderror"
           name="request_date" id="request_date"
           value="{{ isset($document) ? $document->request_date : old('request_date') }}">
    @error('request_date')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Factory Manager -->
<div class="form-group col-lg-12">
    <label>{{ __('Factory Manager') }}</label>
    <input type="text" class="form-control @error('factory_manager') is-invalid @enderror"
           name="factory_manager" id="factory_manager"
           value="{{ isset($document) ? $document->factory_manager : old('factory_manager') }}"
           placeholder="{{ __('Enter Factory Manager') }}">
    @error('factory_manager')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Operation Manager -->
<div class="form-group col-lg-12">
    <label>{{ __('Operation Manager') }}</label>
    <input type="text" class="form-control @error('operation_manager') is-invalid @enderror"
           name="operation_manager" id="operation_manager"
           value="{{ isset($document) ? $document->operation_manager : old('operation_manager') }}"
           placeholder="{{ __('Enter Operation Manager') }}">
    @error('operation_manager')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Production Manager -->
<div class="form-group col-lg-12">
    <label>{{ __('Production Manager') }}</label>
    <input type="text" class="form-control @error('production_manager') is-invalid @enderror"
           name="production_manager" id="production_manager"
           value="{{ isset($document) ? $document->production_manager : old('production_manager') }}"
           placeholder="{{ __('Enter Production Manager') }}">
    @error('production_manager')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- QAR Signature -->
<div class="form-group col-lg-12">
    <label>{{ __('QAR Signature') }}</label>
    <input type="text" class="form-control @error('qar_signature') is-invalid @enderror"
           name="qar_signature" id="qar_signature"
           value="{{ isset($document) ? $document->qar_signature : old('qar_signature') }}"
           placeholder="{{ __('Enter QAR Signature') }}">
    @error('qar_signature')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<!-- Follow-up Corrective -->
<div class="form-group col-lg-12">
    <label>{{ __('Follow-up Corrective') }}</label>
    <input type="checkbox" name="follow_up_corrective" id="follow_up_corrective" value="1"
           {{ isset($document) && $document->follow_up_corrective ? 'checked' : '' }}>
</div>

<!-- Follow-up Preventive -->
<div class="form-group col-lg-12">
    <label>{{ __('Follow-up Preventive') }}</label>
    <input type="checkbox" name="follow_up_preventive" id="follow_up_preventive" value="1"
           {{ isset($document) && $document->follow_up_preventive ? 'checked' : '' }}>
</div>

<!-- Additional Notes -->
<div class="form-group col-lg-12">
    <label>{{ __('Additional Notes') }}</label>
    <textarea class="form-control @error('additional_notes') is-invalid @enderror" name="additional_notes" rows="4"
              placeholder="{{ __('Enter Additional Notes') }}">{{ isset($document) ? $document->additional_notes : old('additional_notes') }}</textarea>
    @error('additional_notes')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


                     

                                <div class=" form-group col-lg-12 text-center">
                                    <button type="submit" class="btn btn-danger px-5">{{ __('Save') }}</button>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footerScripts')
    <script src="{{ asset('js/permissions_table.js') }}"></script>
@endpush
