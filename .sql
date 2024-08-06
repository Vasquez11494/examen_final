create table usuarios (
    usuario_id SERIAL PRIMARY KEY,
    usuario VARCHAR(100),
    NombreUsuario VARCHAR(100),
    pais VARCHAR(100),
    telefono VARCHAR(50),
    correo VARCHAR(100),
    situacion SMALLINT DEFAULT 1
)