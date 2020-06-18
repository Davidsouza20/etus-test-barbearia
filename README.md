# Barber Shop


## Projeto criado para teste de desenvolvimento na Etus

O projeto é desenvolver um sistema para agilizar o agendamento de serviços, e gerar um relatório de todos os serviços prestados pelos seus Profissionais. 


## Tecnologias utilizadas nesse projeto: 

### No Backend foi construida uma REST API

- Framework Laravel 7 
- PHP 7.4 
- MySql no banco de dados

### No Frontend foi construida uma SPA (Single Page Application) 

- Framework Vuejs
- JavaScript
- HTML 
- CSS

## Abaixo tem alguns prints mostrando as telas da aplicação

![home-screen](https://raw.githubusercontent.com/Davidsouza20/etus-test-barbearia/master/home.png)

![login](https://raw.githubusercontent.com/Davidsouza20/etus-test-barbearia/master/login.png)

![report](https://raw.githubusercontent.com/Davidsouza20/etus-test-barbearia/master/report.png)

![client](https://raw.githubusercontent.com/Davidsouza20/etus-test-barbearia/master/client.png)

![service](https://raw.githubusercontent.com/Davidsouza20/etus-test-barbearia/master/service.png)

![menu](https://raw.githubusercontent.com/Davidsouza20/etus-test-barbearia/master/menu.png)



## Como instalar o projeto ?

### Requisitos 

- Composer 
- PHP 7.4
- MySql
- Node 



Faça um clone do repositório

```
git clone https://github.com/Davidsouza20/etus-test-barbearia.git
```


### Configurando a API 

Vá para a pasta barberShopServer

```
cd barberShopServer
```

Instale todas as dependencias do projeto 

```
composer install
```

Copie o arquivo para guardar as variaveis de ambiente e gere uma key

```
cp .env.example .env
php artisan key:generate
```

Rode as migrations e seed com dados para iniciar o projeto

Antes de rodar o camando certifique-se de criar um banco de dados com o nome <b> barber_shop</b>

```
php artisan migrate
php artisan db:seed
```

Pronto para iniciar o servidor rode o comando 

```
php artisan serve
```

### Configurando a aplicação web 

Vá para a pasta barberShopFront

```
cd barberShopFront
```

Instale todas as dependencias do projeto 

```
npm install 
```

Pronto para iniciar a aplicação 

```
npm run serve
```

### Acesso padrão na aplicação 

Email para teste do ambiente de profissional
```
professional@test.com
```

Email para teste do ambiente de gestor
```
manager@test.com
```


