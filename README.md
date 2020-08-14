<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">

## Explicando a instalação 

Para usar o sistema, basta apenas fazer clone deste repositorio:

Edite o arquivo .env que esta na raiz do sistema substituido os seguintes campos: 

DB_HOST=SEU_HOST_DO_BD

DB_PORT=3306

DB_DATABASE = [[SUA_DATABASE]]

DB_USERNAME = [[SEU_USUARIO_BANCO]]

DB_PASSWORD = [[SUA_SENHA_BANCO]]


Em seguida rodar os seguintes comandos:
 - php artisan migrate
 - php artisan config:cache
 - php artisan serve 
 
Seu sistema de cadastro de urls estara funcionado na urls htt://localhost:8000
