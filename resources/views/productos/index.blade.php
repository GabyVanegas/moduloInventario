@extends('layouts.app')
@section('title','Productos')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 m-0">Productos</h1>
  <a href="{{ route('productos.create') }}" class="btn btn-primary">Nuevo</a>
</div>

<div class="card">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>Codigo</th><th>Nombre</th><th>Unidad</th><th class="text-end">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @forelse($productos as $p)
            <tr>
              <td>{{ $p->codigo }}</td>
              <td>{{ $p->nombreProducto }}</td>
              <td>{{ $p->unidades }}</td>
              <td class="text-end">
                <a href="{{ route('productos.edit',$p) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
                <form action="{{ route('productos.destroy',$p) }}" method="post" class="d-inline"
                      onsubmit="return confirm('¿Eliminar producto?');">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="5" class="text-center text-muted p-3">Sin productos</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  @if($productos->hasPages())
  <div class="card-footer">
    {{ $productos->links() }}
  </div>
  @endif
</div>
@endsection
