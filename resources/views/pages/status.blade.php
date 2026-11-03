@extends('main')

@section('title', __('status.meta_title'))
@section('description', __('status.meta_description'))

@push('head')
    <style>
        .status-header-card {
            background: #fff;
            border-radius: 24px;
            border: 1px solid rgba(40, 167, 69, 0.1);
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
            padding: 40px;
            margin-top: 50px;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }
        .status-header-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: #28a745;
        }
        .pulse-indicator {
            width: 20px;
            height: 20px;
            background-color: #28a745;
            border-radius: 50%;
            display: inline-block;
            position: relative;
            vertical-align: middle;
            margin-right: 12px;
        }
        .pulse-indicator::after {
            content: '';
            width: 100%;
            height: 100%;
            background-color: #28a745;
            border-radius: 50%;
            position: absolute;
            top: 0;
            left: 0;
            animation: pulse-ring 1.8s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
        }
        @keyframes pulse-ring {
            0% { transform: scale(0.95); opacity: 0.8; }
            50% { transform: scale(1.6); opacity: 0; }
            100% { transform: scale(0.95); opacity: 0; }
        }
        .system-row {
            background: #fff;
            border: 1px solid rgba(114, 97, 247, 0.08);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.01);
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.3s ease;
        }
        .system-row:hover {
            border-color: rgba(114, 97, 247, 0.18);
            box-shadow: 0 6px 18px rgba(114, 97, 247, 0.04);
        }
        .badge-operational {
            background-color: rgba(40, 167, 69, 0.1);
            color: #28a745;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 30px;
            font-size: 0.9rem;
        }
        .incident-card {
            background: #fff;
            border-radius: 20px;
            border: 1px solid rgba(114, 97, 247, 0.1);
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
            padding: 30px;
            margin-top: 40px;
        }
    </style>
@endpush

@section('page')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <!-- Global Status Card -->
            <div class="status-header-card text-center">
                <div class="mb-3">
                    <span class="pulse-indicator"></span>
                    <h2 class="d-inline-block fw-bold align-middle mb-0 text-success">@lang('status.all_systems_operational')</h2>
                </div>
                <p class="text-muted mb-0">@lang('status.checked_ago') {{ date('H:i') }} GMT. @lang('status.latency_ok')</p>
            </div>

            <!-- Systems List -->
            <h3 class="fw-bold mb-4">@lang('status.system_status')</h3>
            
            <!-- System 1 -->
            <div class="system-row">
                <div>
                    <h5 class="fw-bold mb-1">@lang('status.sys1_title')</h5>
                    <span class="text-muted small">@lang('status.sys_latency'): 125ms</span>
                </div>
                <span class="badge-operational"><i class="fas fa-check-circle me-1"></i>@lang('status.operational')</span>
            </div>

            <!-- System 2 -->
            <div class="system-row">
                <div>
                    <h5 class="fw-bold mb-1">@lang('status.sys2_title')</h5>
                    <span class="text-muted small">@lang('status.sys_latency'): 112ms</span>
                </div>
                <span class="badge-operational"><i class="fas fa-check-circle me-1"></i>@lang('status.operational')</span>
            </div>

            <!-- System 3 -->
            <div class="system-row">
                <div>
                    <h5 class="fw-bold mb-1">@lang('status.sys3_title')</h5>
                    <span class="text-muted small">@lang('status.sys_latency'): 98ms</span>
                </div>
                <span class="badge-operational"><i class="fas fa-check-circle me-1"></i>@lang('status.operational')</span>
            </div>

            <!-- System 4 -->
            <div class="system-row">
                <div>
                    <h5 class="fw-bold mb-1">@lang('status.sys4_title')</h5>
                    <span class="text-muted small">@lang('status.sys_latency'): 145ms</span>
                </div>
                <span class="badge-operational"><i class="fas fa-check-circle me-1"></i>@lang('status.operational')</span>
            </div>

            <!-- System 5 -->
            <div class="system-row">
                <div>
                    <h5 class="fw-bold mb-1">@lang('status.sys5_title')</h5>
                    <span class="text-muted small">@lang('status.sys_latency'): 134ms</span>
                </div>
                <span class="badge-operational"><i class="fas fa-check-circle me-1"></i>@lang('status.operational')</span>
            </div>

            <!-- Incident History -->
            <div class="incident-card">
                <h4 class="fw-bold mb-3"><i class="fas fa-history me-2" style="color: #7261f7;"></i>@lang('status.incident_history')</h4>
                <p class="text-muted mb-0">@lang('status.no_incidents')</p>
            </div>

        </div>
    </div>
</div>
@endsection
