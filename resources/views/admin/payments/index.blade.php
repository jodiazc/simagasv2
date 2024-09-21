@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de Pagos</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            @can('admin.payments.export')
                <a href="{{ route('admin.payments.export') }}" class="btn btn-success mb-3">Exportar a CSV</a>    
            @endcan
            <table class="table table-striped">
                <thead>
                     <tr>
                        <th>Id</th>
                        <th>tipo_link</th>
                        <th>dlectura</th>
                        <td>cliente</td>
                        <td>pedido</td>
                        <td>importe</td>
                        <td>estatus</td>
                        <td>fecha_expiracion</td>
                        <td>fecha_elaboracion</td>
                        <td>insercion_al_modulo</td>                        
                        <th colspan="2"></th>
                     </tr>   
                </thead>
                <tbody>
                    
                    @foreach ($paymentLinks as $paymentLink)
                        <tr>
                            <td>{{ $paymentLink->id }}</td>
                            <td>{{ $paymentLink->tipo_liga }}</td>
                            <td>{{ $paymentLink->dlectura }}</td>
                            <td>{{ $paymentLink->cliente }}</td>
                            <td>{{ $paymentLink->pedido }}</td>
                            <td>{{ $paymentLink->importe }}</td>
                            <td>{{ $paymentLink->estaus }}</td>
                            <td>{{ $paymentLink->fecha_expiracion }}</td>
                            <td>{{ $paymentLink->fecha_elaboracion }}</td>
                            <td>{{ $paymentLink->insercion_al_modulo }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>   
            
            {{ $paymentLinks->links('vendor.pagination.bootstrap-4') }}
        </div>        
    </div>    
@stop

