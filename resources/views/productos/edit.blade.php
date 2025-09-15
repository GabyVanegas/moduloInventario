@extends('layouts.app')
@section('title','Editar producto')
@section('content')
<h1 class="h4 mb-3">Editar producto</h1>

<form method="post" action="{{ route('productos.update',$producto) }}" class="card p-3">
  @csrf
  @method('PUT')
  <div class="row g-3">
    <div class="col-md-4">
      <label class="form-label">Código</label>
      <input name="codigo" value="{{ old('codigo',$producto->codigo) }}" class="form-control @error('codigo') is-invalid @enderror" required>
      @error('codigo') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-8">
      <label class="form-label">Nombre</label>
      <input name="nombreProducto" value="{{ old('nombreProducto',$producto->nombreProducto) }}" class="form-control @error('nombreProducto') is-invalid @enderror" required>
      @error('nombreProducto') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">
      <label class="form-label">Precio</label>
      <input type="number" step="0.01" name="precio" value="{{ old('precio',$producto->precio) }}" class="form-control @error('precio') is-invalid @enderror" required>
      @error('precio') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">
      <label class="form-label">Unidades</label>
      <input type="number" name="unidades" value="{{ old('unidades',$producto->unidades) }}" class="form-control @error('unidades') is-invalid @enderror" required>
      @error('unidades') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-12">
      <label class="form-label">Descripción</label>
      <textarea name="descripcion" rows="3" class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion',$producto->descripcion) }}</textarea>
      @error('descripcion') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
  </div>
  <div class="mt-3">
    <a href="{{ route('productos.index') }}" class="btn btn-light">Cancelar</a>
    <button class="btn btn-primary">Actualizar</button>
  </div>
</form>
@endsection
