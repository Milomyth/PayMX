@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Lista de Clientes</h4>
      <p class="card-description"> Click en el Nombre del cliente para editar</p>
        <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th> # </th>
              <th> Nombre </th>
              <th> Correo </th>
              <th> Adeudo </th>
              <th> Pago de </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($clientes as $cliente)
              <tr>
                <td> {{$loop->iteration}} </td>
                <td> {{ $cliente->full_name}} </td>
                <td> {{ $cliente->email }} </td>
                <td>
                  @if ($cliente->debit == null)
                    $0.00
                  @else
                    ${{ number_format($cliente->debit,2)}}
                  @endif
                </td>
                <td> $50.00</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
