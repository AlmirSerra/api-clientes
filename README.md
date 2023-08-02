# API Clientes

Este é um projeto de API REST desenvolvido em PHP usando o framework Laravel e o banco de dados MySQL. A API permite a inserção e consulta de informações de clientes.

## Tecnologias utilizadas:

- PHP
- Laravel
- MySQL

## Configuração do Projeto

1. Clone o repositório:

```
git clone https://github.com/AlmirSerra/api-clientes.git
cd api-clientes
```
2. Instale as dependências do Composer:

```
composer install
```

3. Copie o arquivo .env.example e renomeie para .env:

```
cp .env.example .env
```

4. Configure o banco de dados no arquivo .env:

```
DB_CONNECTION=mysql
DB_HOST=seu-host-do-banco
DB_PORT=seu-port-do-banco
DB_DATABASE=seu-nome-do-banco
DB_USERNAME=seu-usuario-do-banco
DB_PASSWORD=sua-senha-do-banco
```

5. Gere a chave da aplicação:

```
php artisan key:generate
```

6. Rode as migrations para criar as tabelas do banco de dados:

```
php artisan migrate
```

7. Popule o banco de dados com clientes fictícios para teste:

```
php artisan db:seed --class=ClientesSeeder
```

8. Inicie o servidor de desenvolvimento:

```
php artisan serve
```

O servidor estará disponível em http://localhost:8000.

## Uso da API

A API possui dois endpoints principais:

1. POST /api/clientes: Utilize este endpoint para inserir um novo cliente no banco de dados. Envie um JSON com os seguintes campos obrigatórios:
   - nome_completo
   - data_nascimento
   - tipo_pessoa
   - cpf_cnpj
   - email
   - endereco
   - cep
   - latitude
   - longitude

2. GET /api/clientes: Utilize este endpoint para consultar todos os clientes cadastrados no banco de dados.

