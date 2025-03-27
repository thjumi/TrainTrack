# 🏋️‍♂️ TrainTrack

## Descripción
TrainTrack es una aplicación web diseñada para ayudar a los usuarios a gestionar sus rutinas de ejercicio y reservar clases en un gimnasio. Proporciona un sistema de seguimiento del progreso, planificación de entrenamientos y gestión de horarios para optimizar la experiencia deportiva de los usuarios.

## Tecnologías utilizadas
- **PHP**: 8.2.12
- **Laravel**: : 5.13.0
- **MySQL**: Base de datos
- **Xampp**:  8.2.12

## Instalación y configuración
### Clonar el repositorio
```bash
git clone https://github.com/thjumi/TrainTrack.git
```

### Acceder al proyecto
```bash
cd TrainTrack
```

### Instalar dependencias
```bash
composer install
```

### Generar clave de la aplicación
```bash
php artisan key:generate
```

### Configurar el archivo .env
```bash
cp .env.example .env
```
Editar el archivo `.env` para ajustar la configuración de la base de datos.

### Ejecutar migraciones y seeders
```bash
php artisan migrate --seed
```

## Funcionalidades principales
### 🏋️‍♂️ Gestión de rutinas de ejercicio
- Creación y modificación de rutinas personalizadas
- Seguimiento del progreso del usuario

### 📅 Reserva de clases
- Sistema de reservas de clases con entrenadores

### 📊 Seguimiento del progreso
- Registro de avances en los entrenamientos

### 👤 Gestión de usuarios
- Registro e inicio de sesión seguro


## Requisitos previos
Asegúrate de tener instalado:
- **PHP** 8.2+
- **Composer**
- **Servidor web local** (XAMPP, Laragon, Laravel Valet, etc.)
- **MySQL**
