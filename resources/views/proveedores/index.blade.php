@extends('layouts.app')

@section('content')
<div class="container-fluid py-4 px-xl-5">
    <div class="card shadow-sm border-0 rounded-lg">
        <div class="card-header bg-light-subtle d-flex justify-content-between align-items-center py-3">
            <div class="d-flex align-items-center">
                <svg class="text-primary me-2" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="8.5" cy="7" r="4"></circle>
                    <polyline points="17 11 19 13 23 9"></polyline>
                </svg>
                <h2 class="h5 mb-0 fw-bold text-primary">Lista de Proveedores</h2>
            </div>
            <a href="{{ route('proveedores.create') }}" class="btn btn-primary btn-sm d-flex align-items-center">
                <svg class="me-1" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Agregar Proveedor
            </a>
        </div>

        <div class="card-body p-0">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-0 border-0 border-start border-5 border-success m-0" role="alert" style="border-left-width: 5px !important;">
                    <div class="d-flex align-items-center">
                        <svg class="text-success me-2" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <span class="fw-medium">{{ session('success') }}</span>
                    </div>
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3 text-uppercase text-secondary fw-semibold" style="font-size: 0.8rem;">Nombre</th>
                            <th class="px-4 py-3 text-uppercase text-secondary fw-semibold" style="font-size: 0.8rem;">Email</th>
                            <th class="px-4 py-3 text-uppercase text-secondary fw-semibold" style="font-size: 0.8rem;">Teléfono</th>
                            <th class="px-4 py-3 text-uppercase text-secondary fw-semibold" style="font-size: 0.8rem;">Dirección</th>
                            <th class="px-4 py-3 text-uppercase text-secondary fw-semibold text-center" style="font-size: 0.8rem;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($proveedors as $proveedor)
                        <tr class="border-top">
                            <td class="px-4 py-3 fw-medium">{{ $proveedor->nombre }}</td>
                            <td class="px-4 py-3">
                                <div class="d-flex align-items-center text-muted">
                                    <svg class="me-2 flex-shrink-0" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                    {{ $proveedor->email }}
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="d-flex align-items-center text-muted">
                                    <svg class="me-2 flex-shrink-0" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    </svg>
                                    {{ $proveedor->telefono ?? '-' }}
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <div class="d-flex align-items-center text-muted">
                                    <svg class="me-2 flex-shrink-0" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    {{ $proveedor->direccion ?? '-' }}
                                </div>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="d-flex justify-content-center align-items-center gap-5">
                                    <a href="{{ route('proveedores.edit', $proveedor) }}" class="text-decoration-none text-dark" title="Editar">
                                        <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                            <path d="M12 20h9"></path>
                                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19.5 3 21l1.5-4L16.5 3.5z"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn p-0 border-0 bg-transparent align-middle" title="Eliminar" style="line-height:1;">
                                            <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <svg class="mx-auto mb-3" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line>
                                    <line x1="12" y1="12" x2="6" y2="9"></line><line x1="12" y1="12" x2="18" y2="9"></line>
                                    <line x1="12" y1="12" x2="12" y2="6"></line>
                                </svg>
                                <p class="mb-0">Aún no tienes proveedores, click en Agregar Proveedor.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-light-subtle py-3">
            <small class="text-muted">Mostrando registros del {{ $proveedors->firstItem() }} al {{ $proveedors->lastItem() }} de un total de {{ $proveedors->total() }} registros.</small>
            <div class="float-end">
                {{ $proveedors->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card-header, .card-footer {
        border-color: #e9ecef;
    }
    .table th {
        font-weight: 600;
        color: #6c757d;
    }
    .btn-group .btn {
        border-radius: 0.2rem;
        margin-left: 0.25rem;
    }
    .btn-group .btn:first-child {
        margin-left: 0;
    }
    .btn-sm {
        padding: 0.3rem 0.6rem;
        font-size: 0.8rem;
    }
    .alert {
        font-size: 0.9rem;
    }
    .page-link {
        font-size: 0.85rem;
        padding: 0.4rem 0.75rem;
    }
    .pagination {
        margin-bottom: 0;
    }
</style>
@endpush