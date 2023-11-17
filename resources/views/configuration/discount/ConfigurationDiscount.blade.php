@extends('TemplateAdmin');
@section('content')
    <div class="container-fluid">
        <div class="row center py-2">
            <div class="col-md-9">
                <div class="my-4">
                    <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje']=='Creado'){
        ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Creado</strong> Descuento con exito..
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
            }
        ?>
                    <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje']=='Eliminado'){
        ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Eliminado</strong> Descuento con exito..
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
            }
        ?>

                    <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje']=='Error'){
        ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Error</strong> vuelve a intentarlo..
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
            }
        ?>

                    <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje']=='Actualizado'){
        ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Actualizacion</strong> se hizo con exito..
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
            }
        ?>
                </div>
                <div class="card" style="width: 50rem; margin-left: 200px">
                    <div style="display: flex; justify-content: Right;">
                        <a href="{{ route('discount.create') }}" class="btn btn-primary">añadir

                        </a>
                    </div>
                    <div class="card-header">
                        Descuento
                    </div>

                    <div class="p-4">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th style="text-align: center" scope="col">Arl %</th>
                                    <th style="text-align: center" scope="col">Salud %</th>
                                    <th style="text-align: center" scope="col">Pension %</th>
                                    <th style="text-align: center" scope="col">Parafiscales %</th>
                                    <th style="text-align: center" scope="col">Fecha</th>
                                    <th style="text-align: center" scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($descuento)
                                    @foreach ($descuento as $descu)
                                        <tr>
                                            <td style="text-align: center">{{ $descu->arl }}</td>
                                            <td style="text-align: center">{{ $descu->salud }}</td>
                                            <td style="text-align: center">{{ $descu->pension }}</td>
                                            <td style="text-align: center">{{ $descu->parafiscal }}</td>
                                            <td style="text-align: center">{{ $descu->fechaRegistro }}
                                            <td style="text-align: center">
                                                <a class='text-success' href="{{ route('discount.edit', $descu) }}">
                                                    <i class='bi bi-pencil-square'></i>
                                                </a>
                                                <a class='text-danger' href="{{ route('discount.destroy', $descu) }}"><i
                                                        class='bi bi-trash'></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    @endsection