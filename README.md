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
