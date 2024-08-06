<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXAMEN FINAL ING SOFT II</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>

    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-7">
                <h1 class="text-center border border-1 border-dark shadow mt-3 text-primary p-2">Formulario para Ingresar Usuarios</h1>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <form class="form col-lg-7 border border-dark shadow p-4 bg-ligth" id="FormularioUsuario">
                <h3 class="text-center">Ingrese los datos del usuario</h3>
                <div class="mb-3">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="Usuario" class="form-label">Ingrese el Usuario de Github</label>
                            <input type="text"  name="usuario" class="form-control border border-dark" id="Usuario">
                        </div>
                        <div class="col">
                            <label for="NombreUsuario" class="form-label">Nombre del Usuario</label>
                            <input type="text" name="nombreUsuario" class="form-control border border-dark" id="NombreUsario" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="pais" class="form-label">Pais de Origen</label>
                            <select name="pais" id="Pais">
                                <option>Seleccione...</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" name="Telefono"  class="form-control border border-dark" id="Telefono">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-7">
                            <label for="Correo" class="form-label">correo electronico</label>
                            <input type="email" name="correo" class="form-control border border-dark" id="Correo">
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-center text-center">
                        <div class="col">
                            <button type="submit" id="BtnEnviar" class="btn btn-primary w-50">ENVIAR</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-7 table-wrapper">
                <h4 class="text-center text-warning">Usuarios Ingresados</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="UsuariosIngresados">
                        <thead class="table-warning text-center">
                            <tr class="border border-dark">
                                <th>No.</th>
                                <th>Usuario</th>
                                <th>Nombres</th>
                                <th>Pais</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="6" class="text-center">No hay Usuarios Ingresados</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../src/Inicio/index.js"></script>

</body>

</html>