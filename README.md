<h2 align="center">Shop Smart</h2>

<p align="center">
    <a href="#">
        <img alt="License" src="https://img.shields.io/github/license/Weavous/ShopSmart">
    </a>
    <a href="#">
        <img alt="Languages" src="https://img.shields.io/github/languages/count/Weavous/ShopSmart">
    </a>
    <a href="#">
        <img alt="Last Commit" src="https://img.shields.io/github/last-commit/Weavous/ShopSmart">
    </a>
</p>

<p align="center">The application aims to make shopping a more efficient and enjoyable experience by providing users with the information they need to make informed decisions and save money</p>

<h4 align="center">Instructions</h4>

<p align="center">Instructions for developing the application can be found in the icon below</p>

<h4 align="center">Installation ⚙️</h4>

<h6 align="center"><a href="https://iconscout.com">✔️</a> Requirements</h6>

<p align="center">
    <a href="https://www.php.net">
        <img width="10%" src="https://raw.githubusercontent.com/MagicalStrangeQuark/MagicalStrangeQuark/master/assets/php.svg" alt="PHP Logo">
    </a>
    <a href="https://laravel.com">
        <img width="10%" src="https://cdn.iconscout.com/icon/free/png-256/laravel-2038872-1720085.png" alt="Laravel Logo">
    </a>
    <a href="https://www.mysql.com">
        <img width="10%" src="https://cdn.iconscout.com/icon/free/png-256/mysql-3628940-3030165.png" alt="MySQL Logo">
    </a>
    <a href="https://git-scm.com">
        <img width="10%" src="https://raw.githubusercontent.com/MagicalStrangeQuark/MagicalStrangeQuark/master/assets/git.svg" alt="Git Logo">
    </a>
    <a href="https://getcomposer.org">
        <img width="10%" src="https://cdn.iconscout.com/icon/free/png-256/composer-285363.png" alt="Composer Logo">
    </a>
    <a href="https://www.docker.com">
        <img width="10%" src="https://cdn.iconscout.com/icon/free/png-256/docker-10-1175197.png" alt="Docker Logo">
    </a>
</p>

```typescript
    return [
        {
            dependency: "PHP",
            url: "https://www.php.net",
            version: 8.1.10,
            img: "https://raw.githubusercontent.com/MagicalStrangeQuark/MagicalStrangeQuark/master/assets/php.svg"
        },
        {
            dependency: "MySQL",
            url: "https://www.mysql.com",
            version: 8.0.25,
            img: "https://cdn.iconscout.com/icon/free/png-256/mysql-3628940-3030165.png"
        },
        {
            dependency: "Git",
            url: "https://git-scm.com",
            version:  2.37.3,
            img: "https://raw.githubusercontent.com/MagicalStrangeQuark/MagicalStrangeQuark/master/assets/git.svg"
        },
        {
            dependency: "Composer",
            url: "https://getcomposer.org",
            version: 2.4.1,
            img: "https://cdn.iconscout.com/icon/free/png-256/composer-285363.png"
        },
        {
            dependency: "Docker",
            url: "https://www.docker.com",
            version: 20.10.20,
            img: "https://cdn.iconscout.com/icon/free/png-256/composer-285363.png"  
        }
    ];
```

<h5 align="center">Instruções sobre como executar a aplicação</h5>

##### Clonar os repositórios

1. Abra o terminal e crie um diretóro chamado Workspace: `mkdir Workspace`
2. Clone o repositório backend: `git clone https://github.com/ShoppingSmart/backend`
2. Clone o repositório frontend: `git clone https://github.com/ShoppingSmart/frontend`

##### Executando a aplicação Nuxt.js

1. Abra o terminal e navegue até o diretório frontend: cd frontend
2. Certifique-se de que todas as dependências estão instaladas: `npm install`
3. Copie o arquivo `.env.example` para `.env` e certifique-se de que o valor de `APP_URL` é o mesmo iniciado para a aplicação PHP. Certifique-se desse valor ao executar o passo __4__ para a execução da aplicação PHP
3. Execute o servidor de desenvolvimento do Nuxt.js: `npm run dev`
4. Acesse a aplicação Nuxt.js no seu navegador em http://localhost:3000

##### Abrindo uma conexão com o PostgreSQL usando o terminal
Abra o terminal e digite o seguinte comando para acessar o shell do PostgreSQL:

```sql
psql -U postgres
```

Agora você está no shell do PostgreSQL. Para criar um usuário e um banco de dados, use o seguinte comando SQL:

```sql
CREATE USER smartshopuser WITH PASSWORD 'pass@root';
CREATE DATABASE smartshop;
GRANT ALL PRIVILEGES ON DATABASE smartshop TO smartshopuser;
ALTER ROLE smartshopuser WITH LOGIN;
ALTER ROLE smartshopuser superuser;
```

Agora você pode fechar a conexão usando `\q` e acessar novamente usando o usuário criado anteriormente:

```sql
psql -U smartshopuser -d smartshop
```

##### Executando a aplicação PHP

1. Abra uma nova janela do terminal e navegue até o diretório backend: `cd backend`
2. Certifique-se de que todas as dependências estão instaladas: `composer install`
3. Certifique-se de que o __PHP 8__ está instalado em seu sistema, assim como o __PostgreSQL__
4. Copie o arquivo __.env.example__ para __.env__ e configure o banco de dados corretamente usando o usuário criado no passo anterior
4. Execute os comandos para criação das tabelas e regitros no banco de dados: 

```bash
php cli migrate:fresh && php cli db:seed
```

4. Inicie o servidor PHP: `php -S 127.0.0.1:8888 -t public`
5. Acesse a aplicação PHP no seu navegador em http://localhost:8888

Lembre-se de que, para a aplicação PHP, é necessário ter um servidor web configurado para hospedar a aplicação em produção. Este exemplo é apenas para executar a aplicação em seu ambiente de desenvolvimento local.

<h5 align="center">Noções básicas sobre a aplicação</h5>

<h6 align="center">Product</h6>

| Method | Uri | Description | Code |
| --- | --- | -- | -- |
| GET | /api/v1/products?__page__=n&__perPage__=n | Retorna uma listagem de produtos | 200 / 404 |
| POST | /api/v1/products | Cadastra um novo produto | 201 / 400 |

<h6 align="center">Category</h6>

| Method | Uri | Description | Code |
| --- | --- | -- | -- |
| GET | /api/v1/orders?__page__=n&__perPage__=n | Retorna uma listagem de categorias | 200 / 404 |
| POST | /api/v1/categories | Cadastra uma nova categoria de produto | 201 / 400 |

<h6 align="center">Order</h6>

| Method | Uri | Description | Code |
| --- | --- | -- | -- |
| GET | /api/v1/orders?__page__=n&__perPage__=n | Retorna uma listagem de pedidos | 200 / 404 |
| POST | /api/v1/orders | Cadastra um novo pedido | 201 / 400 |


<h6>
   4 folder structures to organize your React & React Native project <a href="https://reboot.studio/blog/folder-structures-to-organize-react-project">💾</a>
</h6>

<h6>⚠️ Atenção - Possívels Erros</h6>

<a href="https://github.com/MagicalStrangeQuark/MagicalStrangeQuark/blob/master/guides/FAQ.md">Link</a>

<h6>Dúvidas ❔</h6>

* Quaisquer dúvidas ou sugestões quanto ao projeto, entrar em contato com <wesleyfloresterres@gmail.com>
