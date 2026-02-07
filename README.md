# 📺 Desenhos Antigos — Streaming Retrô & Gestão ADM

## 📖 Visão Geral
Este é um projeto **Full Stack** que simula uma plataforma de streaming focada em desenhos clássicos. O sistema combina um banco de dados relacional robusto com uma interface moderna inspirada na Netflix, permitindo não apenas a visualização, mas também a gestão completa do catálogo.

O projeto foi desenvolvido para demonstrar habilidades em **CRUD, integração de APIs de vídeo (YouTube), autenticação e design responsivo.**

## 🏗️ Estrutura do Projeto
O repositório está organizado da seguinte forma:

### 🌐 Interface Frontend
* **Design Moderno:** Layout escuro (Dark Mode) com foco em UX.
* **Banner Dinâmico:** Destaque para o desenho selecionado com troca de fundo em tempo real.
* **Player Integrado:** Reprodução direta de vídeos do YouTube ou arquivos locais via modal e banner.

### ⚙️ Backend & API
* **PHP API:** Endpoints para listagem, cadastro, edição e exclusão de dados.
* **Sistema de Login:** Área restrita para administradores gerenciarem o catálogo.

### 🗄️ Banco de Dados (MySQL)
Modelagem relacional completa incluindo:
* **Desenhos:** Título, ano, sinopse e links de mídia.
* **Gestão:** Tabelas de Criadores, Estúdios, Personagens e Usuários (ADM).
* **Arquivo de exportação:** `banco.sql` (contém a estrutura e dados de exemplo).

## 📊 Funcionalidades Implementadas
- [x] **Catálogo Visual:** Cards interativos com capas e informações.
- [x] **Player de Vídeo:** Assista ao desenho selecionado sem sair da página.
- [x] **Painel Administrativo:** Interface protegida por login para gerenciar o conteúdo.
- [x] **Busca em Tempo Real:** Filtro inteligente por nome ou descrição.
- [x] **Upload de Imagens:** Suporte para capas personalizadas via formulário.
- [x] **CRUD Completo:** Adicionar, editar e remover desenhos diretamente pela interface.

## 🛠️ Tecnologias Utilizadas
* **Frontend:** HTML5, CSS3 (Flexbox/Grid), JavaScript (ES6+).
* **Backend:** PHP 8.x.
* **Database:** MySQL (MariaDB).
* **Ferramentas:** XAMPP, VS Code, Git/GitHub.

## 🧪 Como usar
1. Clone este repositório.
2. Importe o arquivo `banco.sql` no seu servidor MySQL (recomenda-se o uso do phpMyAdmin).
3. Certifique-se de que a conexão no diretório `api/` está configurada corretamente (porta `3308` ou `3306`).
4. Execute o projeto em um ambiente de servidor local (XAMPP, WAMP, etc.).
5. Acesse `index.html` via `localhost`.

> **Credenciais de Teste (ADM):**
> * **Usuário:** ``
> * **Senha:** `` (ou conforme configurado no dump do banco).

## 🚀 Futuras Evoluções
* Página individual para lista de episódios.
* Categorização por gêneros (Ação, Comédia, Hanna-Barbera).
* Sistema de "Favoritos" salvo no navegador.

## 🎯 Objetivo do Projeto
Este projeto foi desenvolvido como peça de **portfólio**, demonstrando a capacidade de integrar um banco de dados relacional a uma interface web funcional e segura, resolvendo problemas reais de manipulação de dados e entrega de conteúdo multimídia.

---
© 2026 - Desenvolvido por André waldige
