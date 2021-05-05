# Instalação


### Configurando

Pré-requisitos:
-- Apache ou servidor de preferência
-- Banco de Dados: MySQL/MariaDB
-- PHP >= 7.2
-- Composer
-- Git


------
1 - Baixe/Clone o projeto no servidor e execute o comando no terminal:

```
composer install
```


2 - Atualizar o arquivo *.env*  na raiz do projeto com as informações do seu servidor, como url e acesso ao banco e as configurações do envio de e-mail.

3 - Instale o banco rodando os comandos:

```
php artisan migrate
php aritsan db:seed
```

O servidor estará pronto para uso com o usuário padrão: admin@admin.com e senha 123456.# WebServiceFICABEM
