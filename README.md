<p align="center">
  <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a>
  <h1 align="center">Nome do Projeto</h1>
</p>

<p align="center">
  <em>Sistema de cadastro de currículo com Laravel</em>
</p>

---

## 🚀 Sobre o Projeto

-   Sistema de cadastros de currículos

---

## 🛠 Tecnologias Utilizadas

-   **Laravel 10.x** (PHP 8.1+)
-   MySQL
-   Bootstrap 5

---

## 📋 Pré-requisitos

-   PHP 8.1+
-   Composer 2.5+
-   Node.js 18.x e npm 9.x
-   Banco de dados (MySQL 8.x)
-   Servidor web (Apache/Nginx) ou PHP CLI Server

---

## 🔧 Instalação e Configuração

1. **Clonar o repositório**

    ```bash
    git clone https://github.com/leobarreto/projeto-curriculo.git
    cd projeto-curriculo

    ```

2. **Instalar dependências**

    ```bash
    composer install
    npm install

    ```

3. **Configurando ambiente**

    ```bash
    cp .env.example .env
    php artisan key:generate

    ```

4. **Configurar Banco de dados no .env**

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=projeto_curriculos
    DB_USERNAME=root
    DB_PASSWORD=

    ```

5. **Executar as migrations**

    ```bash
    php artisan migrate
    ```

## 🖥 Executando o Projeto

---

1. **Iniciando o Servidor de desenvolvimento**

    ```bash
    php artisan serve

    ```

2. **Acessar o navegador**
   http://127.0.0.1:8000
