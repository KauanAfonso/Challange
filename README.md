# LifeStyle

# Backend
app using react native


# 🚀 Passo a passo para rodar um projeto Laravel clonado via Git

> Este guia assume que você **ainda não tem nada instalado** e está rodando em um ambiente **Windows, Linux ou macOS**.

---

## ✅ Pré-requisitos

Antes de começar, você precisa ter:

- [PHP 8.1 ou superior](https://www.php.net/downloads)
- [Composer](https://getcomposer.org/)
- [MySQL](https://dev.mysql.com/downloads/mysql/) ou usar SQLite
- [Git](https://git-scm.com/)

---

## Instalar tudo

'''bash

# Run as administrator on windows powershell...
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.4'))

'''

## 📥 1. Clonar o projeto

```bash
git clone https://github.com/UNASP-TECH/hackathon-2025-Crisnelly.git
cd backend
```

---

## 📦 2. Instalar as dependências

```bash
composer install
```

---

## 🔑 3. Criar o arquivo `.env`

```bash
cp .env.example .env
```

> No Windows, use:

```bash
copy .env.example .env
```

---

## 🗝️ 4. Gerar a chave da aplicação

```bash
php artisan key:generate
```

---

## ⚙️ 5. Configurar variáveis de ambiente

Abra o arquivo `.env` e configure conforme seu banco de dados:

### Para MySQL:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=root
DB_PASSWORD=sua_senha
```

### Para SQLite:

```dotenv
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

E crie o arquivo SQLite vazio:

```bash
touch database/database.sqlite
```

---

## 🧱 6. Rodar as migrations

```bash
php artisan migrate
```

Se quiser popular com dados fictícios (seeders):

```bash
php artisan migrate --seed
```

---

## 🚀 7. Iniciar o servidor local

```bash
php artisan serve
```

Acesse no navegador:

```
http://localhost:8000
```

---

## 🎉 Pronto!

A aplicação Laravel está rodando localmente com sucesso!

---


# Fron end (não funcionando)

# 📱 Passo a passo para rodar um projeto React Native localmente

> Este guia assume que você acabou de fazer `git clone` e ainda não tem nada instalado.

---

## ✅ Pré-requisitos

Você precisa ter instalado:

- [Node.js (recomendado: 18+)](https://nodejs.org/)
- [npm](https://www.npmjs.com/) ou [yarn](https://yarnpkg.com/)
- [Expo CLI](https://docs.expo.dev/) **(se o projeto for Expo)**
- Emulador Android/iOS ou celular com o app do Expo Go

---

## 🛠️ Instalar o Expo CLI (caso use Expo)

```bash
npm install -g expo-cli
```

---

## 📦 1. Clonar o projeto

```bash
git clone https://github.com/seu-usuario/seu-projeto-react-native.git
cd seu-projeto-react-native
```

---

## 📁 2. Instalar as dependências

```bash
npm install
# ou
yarn install
```

---

## ▶️ 3. Rodar o projeto

# 📱 Instruções para rodar o Frontend (React Native com Expo)

> Este guia assume que você já fez o `git clone` do projeto e que o backend (Laravel) está rodando corretamente.

---

## ✅ Pré-requisitos

Certifique-se de que você já tem instalado:

- [Node.js](https://nodejs.org/) (recomendado: versão 18 ou superior)
- **npm** (vem junto com Node.js) ou **Yarn**
- **Expo CLI** globalmente instalado
- Um celular com o **Expo Go** ou emulador Android/iOS configurado

---

## 1️⃣ Entrar na pasta my-app

```bash
cd my-app
```

---

## 2️⃣ Instalar dependências

```bash
npm install
# ou
yarn install
```

---

## 3️⃣ Configurar a URL da API

Abra o arquivo onde está a URL base da API (geralmente `api.js`, `config.js` ou `.env` se estiver usando biblioteca como dotenv) e aponte para o endereço correto da sua API Laravel:

```js
// Exemplo (api.js ou config.js)
export const BASE_URL = "http://192.168.0.10:8000/api"; // IP da máquina com o backend rodando
```

> 🧠 **Dica**: use seu IP local (não `localhost`) se for testar pelo celular.

---

## 4️⃣ Iniciar o projeto com Expo

```bash
npx expo start
```

Isso abrirá uma aba no navegador com um QR Code. Agora:

- Escaneie o QR com o **app Expo Go**
- Ou pressione:
  - `a` para abrir no emulador Android
  - `i` para abrir no emulador iOS (somente macOS)

---

## 🔁 (Opcional) Limpar o cache

Se encontrar erros estranhos, use:

```bash
npx expo start -c
```

---

## 📝 Observações

- O backend deve continuar rodando com:

```bash
php artisan serve
```

- Verifique se o backend está acessível via IP dentro da rede local.
- Certifique-se de que o celular e o computador estão na **mesma rede Wi-Fi**.

---

# 🧪 Prototipação

[👉 Clique aqui para acessar o protótipo no Figma](https://www.figma.com/design/wVRON2EIdB5HtryhfjpKgU/Untitled?node-id=4-34&t=khrAgHymlJtvqEPr-1)
