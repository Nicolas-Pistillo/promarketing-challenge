# Promarketing Challenge

Desafio técnico para proceso de selección.

### Introducción
El challenge fue desarrollado con Laravel 12.53.0, PHP 8.5.3, composer 2.9.5 y Livewire 4.2.1.

Utilicé laravel sail como entorno de desarrollo local para aprovechar el wrapper dockerizado del framework sin necesidad de instalar cada dependencia por separada.

## Instalación y setup del proyecto
1. Copiar el archivo .env.example a .env
```
cp .env.example .env
```
2. Correr el contenedor de composer para instalar las dependencias
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/opt" \
    -w /opt \
    laravelsail/php85-composer:latest \
    composer install --ignore-platform-reqs
```
3. Levantar los contenedores de la aplicación con sail (asumiendo que se tiene el alias sail=vendor/bin/sail)
```
sail up -d
```
4. Instalar las dependencias de frontend con npm usando sail
```
sail npm i
```
5. Correr las migraciones y seeders
```
sail artisan migrate --seed
```
6. Iniciar el servidor vite
```
sail npm run dev
```

La aplicación ya deberia estar servida en http://localhost

Con los seeders se generarán 3 usuarios de tipo SupportAgent (que serán los que se utilizarán para iniciar sesión), estos son:

#### Agente viewer
- Email: viewer-agent@gmail.com
- Password: password
- Es un tipo de agente de soporte que solo tiene accesos de lectura para los recursos

#### Agente operativo
- Email: operative-agent@gmail.com
- Password: password
- Es un tipo de agente de soporte que tiene accesos de lectura y escritura

#### Agente administrador
- Email: administrator-agent@gmail.com
- Password: password
- Es un tipo de agente con acceso total a los recursos, funciona como un superadministrador

7. (Opcional) Ejecutar el test para verificar que un agente de soporte efectivamente pueda agregar una nota a un jugador (usuario)
```
sail pest
```
