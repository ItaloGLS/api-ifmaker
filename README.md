# IFmaker

## 🚀 Início Rápido

Este projeto é desenvolvido usando Laravel 10, com utilização dos bancos de dados PostgreSQL
### 📋 Pré-requisitos

Antes de começar, você precisa ter o Laravel, PHP, composer e postgressql  instalados em seu sistema. Visite.

### 🛠 Instalação

1. Clone o repositório
```bash
git clone https://github.com/ItaloGLS/api-ifmaker
cd api-ifmaker
```
2. Navegue até o diretorio baixado
```bash
cd api-ifmaker
```

## 🖥️ Configure o ambiente
### Variaveis de ambiente
Crie um arquivo `.env` baseando-se no arquivo de exemplo `.env.example` incluído no projeto. Certifique-se de configurar as variáveis de ambiente relacionadas às conexões de banco de dados.

```dotenv


DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=ifmaker
DB_USERNAME=postgres
DB_PASSWORD=senha do seu postgres

```
### intalando o projeto

1. Instalação das Dependências

Com os containers em execução, instale as dependências do PHP usando o Composer:
```bash
composer install
```
2. Geração da Chave da Aplicação

Gere a chave da aplicação Laravel:
```bash
php artisan key:generate
```
3. Migrações e Seeders

Para criar as tabelas no banco de dados e popular com dados de teste, execute:
```bash
php artisan migrate --seed
```
4. iniciando a api:

Para iniciar a api, execute:
```bash
php artisan serve
```