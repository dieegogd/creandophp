# language: es
Característica: Autenticación
    Se necesita poder ingresar a un sistema mediante un ususario y contraseña

    @auth @success
    Escenario: Ingreso al Sistema permitido
        Dado que estoy en el inicio del sistema
        Cuando completo el campo "email" con "diego@yopmail.com"
        Y completo el campo "password" con "diego"
        Y presiono el botón "Acceder"
        Entonces debería ver "Home"

    @auth @error
    Escenario: Ingreso al Sistema denegado
        Dado que estoy en el inicio del sistema
        Cuando completo el campo "email" con "diego@yopmail.com"
        Y completo el campo "password" con "algomal"
        Y presiono el botón "Acceder"
        Entonces debería ver "Estas credenciales no coinciden con nuestros registros."
