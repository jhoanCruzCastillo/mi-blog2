# Mini Blog — Docker

## Requisitos
- Docker Desktop corriendo

---

## Levantar los contenedores

```powershell
docker compose up --build
```

Primera vez tarda unos minutos. Las siguientes veces sin `--build`:

```powershell
docker compose up
```

---

## Verificar que todo está corriendo

| Servicio      | URL                    |
|---------------|------------------------|
| CodeIgniter   | http://localhost:8080  |
| Vue.js        | http://localhost:5173  |
| PostgreSQL    | localhost:5432         |

---

## Apagar los contenedores

```powershell
# Apagar (conserva los datos)
docker compose down

# Apagar y borrar la base de datos
docker compose down -v
```

---

## Migraciones y seeders

```powershell
# Crear las tablas
docker exec blog_php php spark migrate

# Cargar datos de prueba
docker exec blog_php php spark db:seed PostSeeder

# Revertir migraciones
docker exec blog_php php spark migrate:rollback
```

git remote remove origin
git remote add origin https://github.com/jhoanCruzCastillo/mi-blog2.git