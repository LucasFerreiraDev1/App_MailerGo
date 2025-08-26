
# 📬 Formulário de Contato em PHP com PHPMailer

Este é um projeto simples de formulário de envio de E-mail desenvolvido com **HTML**, **CSS** e **PHP**, utilizando a biblioteca **PHPMailer** para envio de e-mails via **SMTP do Gmail**. Criado com fins educacionais para praticar envio de dados de formulário com validação e envio real de e-mails.

## ✨ Funcionalidades

- Formulário com campos: Para(Destinatário), Assunto e Mensagem
- Validação básica de dados com PHP
- Envio de mensagens via e-mail usando PHPMailer
- Configuração de envio com servidor SMTP do Gmail
- Estilo moderno e responsivo com CSS puro

## 📁 Estrutura do Projeto

```
📦 App_MailerGo/
├── index.php                 # Página inicial com o formulário
├── submit.php                # Redirecionamento para o script de validação na pasta privada
├── src/
│    └── css/
│         └── style.css       # Estilo do formulário e mensagens
├── assets/
│    └── favicon.ico
│    └── MailerGo.png
├── lib/
│    └── PHPMailer
├── private/                  # Pasta fora do diretório público (htdocs)
│   └── validate_submit.php   # Script PHP responsável pela validação e envio do e-mail
```

> A pasta `private/` deve estar **fora do diretório público** (`htdocs` do XAMPP) por questões de segurança. Apenas `index.php`, `style.css` e `validate_submit.php` (encaminhador) devem estar acessíveis ao navegador.

## 🚀 Como executar

1. Clone o repositório ou baixe os arquivos:
   ```bash
   git clone https://github.com/LuksDevs/App_MailerGo.git
   ```

2. Coloque os arquivos principais dentro da pasta pública do seu servidor (por exemplo, `htdocs` no XAMPP) e mova a pasta `private/` para fora do `htdocs`.

3. Configure o arquivo `private/validate_submit.php` com suas credenciais de SMTP do Gmail (usuário e senha de app).

4. Inicie o servidor Apache pelo XAMPP e acesse no navegador:
   ```
   http://localhost/App_MailerGo/index.php
   ```

5. Preencha o formulário e envie para testar.

## 📚 Tecnologias utilizadas

- HTML5
- CSS3
- PHP
- [PHPMailer](https://github.com/PHPMailer/PHPMailer)

## ⚙️ Configuração do Gmail SMTP

- Servidor SMTP: `smtp.gmail.com`
- Porta: `587` (TLS) ou `465` (SSL)
- Requer autenticação: **sim**
- Usuário: seu e-mail do Gmail
- Senha: **senha de aplicativo** (não use a senha principal da sua conta)

> É necessário ativar a verificação em duas etapas e gerar uma senha de aplicativo na sua conta Google.

## 📄 Licença

Este projeto é livre para uso educacional. Sem licença específica.

---

Desenvolvido com 💻 por **[Lucas Ferreira](https://github.com/LucasFerreiraDev1)**
