1. la fecha de la cita se asigna en el momento en que se registra 
    (hora del server), de momento porq todavía no jala el calendario

2. los signos vitales no estan relacionados con el paciente directamente,
    están relacionados con la cita y la cita con el paciente.

# modelos
+ medicamento:
    + nombre
    + cantidad
    + precio

+ servicio:
    + nombre
    + descripción
    + precio

+ paciente:
    + nombre
    + apellidos
    + email
    + telefono
    + edad
    + genero
    + fecha de nacimiento

+ cita:
    + fecha
    + paciente
    + cuenta?
    + factura
    + pagó?
    + estado: en curso / finalizada
    + signos vitales
    + motivo
    + retroalimentación


# comandos
- Iniciar el server
``` bash
php artisan serve &
npm run dev
```

- Correr una migración
``` bash
php artisan migrate
```

- Crear un modelo/controlador/migracion
    - migration
    - model
    - controller

``` bash
php artisan make:{aqui puede ir cualquiera de la lista}
```

- correr migración
``` bash
php artisan migrate
```

- correr estilos
``` bash
# local
npm run dev

# servidor
npm run build
```

# documentacion
- https://laravel.com/docs/11.x/
- plantillas de tailwind: https://flowbite.com/docs/components/buttons/
