

### Hi there, My name is ATTILA  SAMUELL TABORY, I love technology 👋

[![LinkedIn ](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/attila-samuell-98291216b/)
[![You Tube](https://img.shields.io/badge/YouTube-FF0000?style=for-the-badge&logo=youtube&logoColor=white)](https://www.youtube.com/channel/UCuX9fZZa3eR4LACYTPVZg5A/videos)
[![Play Store](https://img.shields.io/badge/Google_Play-414141?style=for-the-badge&logo=google-play&logoColor=white)](https://play.google.com/store/apps/details?id=attila.QRCodeGeradorLeitor)


# Desafio - Sistema Escola ATTILA - Laravel - Vue Js
Desenvolvimento de um sistema do zero, desde, o back-end ao front-end

---
## 🔧 Stack utilizada
**Front-end:** VueTify - Vue Js

**Back-end:** Laravel 8*

---
## 📚 Requisitos
Versão do *PHP* maior ou igual a 7.2.5

---
##  Clone do projeto 
### Clone
```bash
git@github.com:ATTILASAMUELL/sistema-laravel-vuejs-escolar.git
```
## 🚀 Instalação

### Configurando `.env` da aplicação
```bash
cp .env.example .env
```

### Rodando comandos do composer, npm e artisan
```bash
composer install
```
```bash
php artisan key:generate
```
```bash
php artisan jwt:secret
```
```bash
php artisan storage:link
```


###  Banco de dados
Sete as configurações de acesso ao banco de dados no seu `.env` de acordo com seu ambiente.
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=escola-desafio
DB_USERNAME=root
DB_PASSWORD=
```
Rode o seguinte comando para executar as migrations:
```bash
php artisan migrate
```

---
## 💡 Serviços externos
Referente ao serviço de envio de email, disponibilizado no front-end
```bash
MAIL_MAILER=smtp
MAIL_HOST=smtp-relay.sendinblue.com
MAIL_PORT=587
MAIL_USERNAME=testandodesafio@gmail.com
MAIL_PASSWORD=gatcMwRHEs7n2C4V
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
```