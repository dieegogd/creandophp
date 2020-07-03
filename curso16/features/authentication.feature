# language: es
Característica: Autenticación
  Se necesita poder ingresar a un sistema mediante un usuario y contraseña

  Escenario: Ingreso al Sistema
    Dado que estoy en el inicio del sistema
    Cuando completo el campo "email" con "diegog368@gmail.com"
    Y completo el campo "password" con "support.dieegogd"
    Y presiono el botón "Entrar"
    Entonces debería ver "Inicio"
