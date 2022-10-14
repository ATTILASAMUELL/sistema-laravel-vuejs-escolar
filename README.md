

### Hi there, My name is ATTILA  SAMUELL TABORY, I love technology 👋

[![LinkedIn ](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/attila-samuell-98291216b/)
[![You Tube](https://img.shields.io/badge/YouTube-FF0000?style=for-the-badge&logo=youtube&logoColor=white)](https://www.youtube.com/channel/UCuX9fZZa3eR4LACYTPVZg5A/videos)
[![Play Store](https://img.shields.io/badge/Google_Play-414141?style=for-the-badge&logo=google-play&logoColor=white)](https://play.google.com/store/apps/details?id=attila.QRCodeGeradorLeitor)


## Desafio - Sistema Escola ATTILA - Laravel - Vue Js
Desenvolvimento de um sistema do zero, desde, o back-end ao front-end
 + Segurança JWT.
 + Envio de email pelo ususario(professor) aos alunos.
 + Upload de imagem.

---
## 🔧 Stack utilizada
**Front-end:** VueTify - Vue Js

**Back-end:** Laravel 8*

---
## 📚 Requisitos
**Versão do *PHP* php ^8.0 **


**Composer Instalado**


**Xampp ou Wampp Instalado**


**Git instalado (Opcional), pode baixar o zip do projeto**
## 📚 Acesso ao Sistema
**Usuário: testandodesafio@gmail.com**


**Senha: 12345**

---
##  Clone do projeto 
### Clone
```bash
git clone https://github.com/ATTILASAMUELL/sistema-laravel-vuejs-escolar.git
```
## 🚀 Instalação

### Configurando `.env` da aplicação
```bash
cp .env.example .env
```

### Rodando comandos do composer, artisan
Entrar dentro da pasta 'sistema-escolar-laravel-mysql'
```bash
 cd sistema-escolar-laravel-mysql
```
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
Sete as configurações de acesso ao banco de dados no seu `.env` de acordo com seu ambiente. Lembre-se de usar 'collation' => 'utf8mb4_unicode_ci'.
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
Rode o seguinte comando para subir o servidor local:
```bash
php artisan serve
```
## 💡 Front-End - Vue Js
Como utilizei a CDN Vuetifyjs, então, não tem necessidade de instalar nada, para o front-end funcionar.
Clique duas vezes no arquivo dentro da pasta:
```bash
frontEndSistema/index.html
```
## 💡 Imagem de partes do sistema:
![adm](https://user-images.githubusercontent.com/76443540/181694001-0a395d6f-f1f3-4bbd-a6fa-bae7263b924d.png)
![principal](https://user-images.githubusercontent.com/76443540/181694024-e70d24f3-49c1-4eed-b770-26d7783e3ad1.png)

