# 🌐 API IFMaker - Backend Laravel

Backend robusto da plataforma IFMaker desenvolvido em **Laravel 10** com **PostgreSQL**, oferecendo autenticação, API REST completa e gerenciamento de dados.

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-336791?style=flat-square&logo=postgresql&logoColor=white)
![API](https://img.shields.io/badge/API-REST-000000?style=flat-square)

---

## 📋 Visão Geral

Backend profissional da plataforma IFMaker, fornecendo uma API REST segura com autenticação JWT, gerenciamento de usuários, produtos, pedidos e muito mais.

### ✨ Características

- ✅ Autenticação com JWT
- ✅ CRUD completo de recursos
- ✅ Autorização com Middleware
- ✅ Validação de dados
- ✅ Rate limiting
- ✅ CORS configurado
- ✅ Documentação automática
- ✅ Testes unitários
- ✅ Database migrations
- ✅ Seeders para dados de teste

---

## 🛠️ Tecnologias

- **Laravel 10** - Framework PHP
- **PHP 8.2+** - Linguagem
- **PostgreSQL** - Banco de dados
- **Composer** - Gerenciador de dependências
- **JWT** - Autenticação
- **Laravel Sanctum** - API tokens
- **PHPUnit** - Testes
- **Swagger/OpenAPI** - Documentação

---

## 📂 Estrutura

```
api-ifmaker/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   ├── UserController.php
│   │   │   ├── ProductController.php
│   │   │   └── OrderController.php
│   │   └── Middleware/
│   ├── Models/
│   │   ├── User.php
│   │   ├── Product.php
│   │   ├── Order.php
│   │   └── OrderItem.php
│   └── Requests/
│       ├── StoreUserRequest.php
│       ├── UpdateUserRequest.php
│       └── StoreProductRequest.php
├── database/
│   ├── migrations/
│   └── seeders/
├── routes/
│   ├── api.php
│   └── web.php
├── tests/
├── .env.example
├── composer.json
└── README.md
```

---

## 🚀 Como Usar

### 1️⃣ Clone

```bash
git clone https://github.com/ItaloGLS/api-ifmaker.git
cd api-ifmaker
```

### 2️⃣ Instale Dependências

```bash
composer install
```

### 3️⃣ Configure Arquivo .env

```bash
cp .env.example .env
php artisan key:generate
```

Edite `.env`:

```dotenv
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=ifmaker
DB_USERNAME=postgres
DB_PASSWORD=sua_senha

JWT_SECRET=sua_chave_jwt
```

### 4️⃣ Crie o Banco de Dados

```bash
# PostgreSQL
createdb ifmaker
```

### 5️⃣ Execute Migrations

```bash
php artisan migrate
php artisan migrate --seed  # Com dados de teste
```

### 6️⃣ Inicie o Servidor

```bash
php artisan serve
```

Servidor rodando em: `http://localhost:8000`

---

## 📡 Endpoints da API

### Autenticação

```bash
POST   /api/auth/register      # Registrar novo usuário
POST   /api/auth/login         # Login
POST   /api/auth/logout        # Logout
POST   /api/auth/refresh       # Renovar token
GET    /api/auth/me            # Dados do usuário autenticado
```

### Usuários

```bash
GET    /api/users              # Listar todos
GET    /api/users/{id}         # Detalhes
POST   /api/users              # Criar (admin)
PUT    /api/users/{id}         # Atualizar
DELETE /api/users/{id}         # Deletar (admin)
```

### Produtos

```bash
GET    /api/products           # Listar todos
GET    /api/products/{id}      # Detalhes
POST   /api/products           # Criar (admin)
PUT    /api/products/{id}      # Atualizar (admin)
DELETE /api/products/{id}      # Deletar (admin)
```

### Pedidos

```bash
GET    /api/orders             # Meus pedidos
GET    /api/orders/{id}        # Detalhes
POST   /api/orders             # Criar novo
PUT    /api/orders/{id}        # Atualizar
DELETE /api/orders/{id}        # Cancelar
```

---

## 📋 Modelos de Dados

### User

```php
class User extends Model {
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'role' // 'user', 'admin'
    ];
}
```

### Product

```php
class Product extends Model {
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'image_url',
        'category'
    ];
}
```

### Order

```php
class Order extends Model {
    protected $fillable = [
        'user_id',
        'status', // 'pending', 'confirmed', 'shipped', 'delivered'
        'total_price',
        'shipping_address',
        'payment_method'
    ];
    
    public function items() {
        return $this->hasMany(OrderItem::class);
    }
}
```

---

## 🔐 Autenticação JWT

### Login

```bash
POST /api/auth/login
Content-Type: application/json

{
  "email": "usuario@example.com",
  "password": "senha123"
}

# Response
{
  "token": "eyJhbGciOiJIUzI1NiIs...",
  "user": {
    "id": 1,
    "name": "João",
    "email": "joao@example.com"
  }
}
```

### Usar Token

```bash
GET /api/auth/me
Authorization: Bearer eyJhbGciOiJIUzI1NiIs...
```

---

## ✅ Validação de Dados

### StoreUserRequest

```php
class StoreUserRequest extends FormRequest {
    public function rules(): array {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'phone' => 'nullable|string',
            'address' => 'nullable|string'
        ];
    }
}
```

### StoreProductRequest

```php
class StoreProductRequest extends FormRequest {
    public function rules(): array {
        return [
            'name' => 'required|string|unique:products',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0.01',
            'quantity' => 'required|integer|min:0',
            'category' => 'required|string'
        ];
    }
}
```

---

## 📊 Migrations

### Create Users Table

```php
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->enum('role', ['user', 'admin'])->default('user');
    $table->rememberToken();
    $table->timestamps();
});
```

### Create Products Table

```php
Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->string('name')->unique();
    $table->text('description');
    $table->decimal('price', 10, 2);
    $table->integer('quantity')->default(0);
    $table->string('image_url')->nullable();
    $table->string('category');
    $table->timestamps();
});
```

---

## 🧪 Testes

```bash
# Rodar todos os testes
php artisan test

# Teste específico
php artisan test tests/Feature/AuthTest.php

# Com coverage
php artisan test --coverage
```

---

## 🔒 Segurança

- ✅ Hashing de senhas com bcrypt
- ✅ CSRF Protection
- ✅ SQL Injection Prevention
- ✅ XSS Protection
- ✅ Rate Limiting
- ✅ CORS Configurado
- ✅ API Token Validation

---

## 📊 Documentação da API

### Swagger/OpenAPI

```bash
# Gerar documentação
php artisan l5-swagger:generate
```

Acesse: `http://localhost:8000/api/documentation`

---

## 🐛 Troubleshooting

### Erro de Conexão ao Banco

```bash
# Verifique se PostgreSQL está rodando
psql -U postgres

# Recrie as migrations
php artisan migrate:refresh --seed
```

### Erro de Permissões

```bash
chmod -R 775 storage bootstrap/cache
```

---

## 📈 Melhorias Futuras

- [ ] Cache com Redis
- [ ] Queue Jobs
- [ ] Email notifications
- [ ] File upload com S3
- [ ] Webhooks
- [ ] API rate limiting avançado
- [ ] Analytics

---

## 🐛 Issues

Reporte bugs [aqui](https://github.com/ItaloGLS/api-ifmaker/issues).

---

## 📝 Licença

MIT License 📄

---

## 👨‍💻 Autor

**Ítalo GLS** - [@ItaloGLS](https://github.com/ItaloGLS)

---

<div align="center">

API IFMaker: Backend Profissional 🌐

*Desenvolvido com Laravel 10 e PostgreSQL*

</div>
