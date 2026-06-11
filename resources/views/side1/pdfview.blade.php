@extends('side1.layout')

@section('title', 'Company Profile | Kasimbagu Consultancy Agency — Tanzania')
@section('description', 'View Kasimbagu Consultancy Agency company profile document. Learn about our services, expertise, and commitment to excellence in legal, research, and organizational management services.')

@section('content')
<style>
    body { background: #0a1c38; }
</style>
<div class="container-fluid py-4" style="min-height:100vh;background:linear-gradient(140deg,#0a1c38 0%,#112644 60%,#0e2040 100%);">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="rounded-4 overflow-hidden" style="background:rgba(255,255,255,0.03);border:1px solid rgba(201,153,58,0.2);box-shadow:0 20px 60px rgba(0,0,0,0.4);">
                <div style="height:calc(100vh - 100px);">
                    <object data="{{ url('KASIMBAGU COMPANY PROFILE.pdf') }}"
                            type="application/pdf"
                            width="100%"
                            height="100%"
                            style="border:none;">
                        <div style="padding:40px;text-align:center;color:#94a3b8;">
                            <i class="bi bi-file-earmark-pdf-fill" style="font-size:3rem;color:var(--gold);margin-bottom:20px;display:block;"></i>
                            <p style="font-size:1.1rem;margin-bottom:20px;">Your browser does not support PDF viewing.</p>
                            <a href="{{ url('KASIMBAGU COMPANY PROFILE.pdf') }}" download
                               class="btn btn-lg rounded-0 px-5 fw-bold text-dark"
                               style="background:var(--gold);">
                                <i class="bi bi-download me-2"></i>Download PDF
                            </a>
                        </div>
                    </object>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ asset('KASIMBAGU COMPANY PROFILE.pdf') }}" download
                   class="btn btn-lg rounded-0 px-5 fw-bold text-dark"
                   style="background:rgba(201,153,58,0.15);border:1px solid rgba(201,153,58,0.4);color:var(--gold);">
                    <i class="bi bi-download me-2"></i>Download Company Profile
                </a>
                <a href="{{ route('consultacy') }}#contact" class="btn btn-lg rounded-0 px-5 fw-bold text-dark ms-3" style="background:var(--gold);">
                    <i class="bi bi-chat-dots me-2"></i>Contact Us
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
