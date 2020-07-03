# language: es
Característica: Autenticación
  Se necesita poder ingresar a un sistema mediante un usuario y contraseña

  Escenario: Ingreso al Sistema permitido
    Dado que estoy en el inicio del sistema
    Cuando completo el campo "email" con "diegog368@gmail.com"
    Y completo el campo "password" con "support.dieegogd"
    Y presiono el botón "Entrar"
    Entonces debería ver "Inicio"

  Escenario: Ingreso al Sistema denegado
    Dado que estoy en el inicio del sistema
    Cuando completo el campo "email" con "diegog368@gmail.com"
    Y completo el campo "password" con "123456789"
    Y presiono el botón "Entrar"
    Entonces debería ver "Estas credenciales no coinciden con nuestros registros"
