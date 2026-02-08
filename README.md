📺 Desenhos Antigos — Streaming Retrô & Cloud Architecture
📖 Visão Geral
Este é um projeto Full Stack que simula uma plataforma de streaming focada em desenhos clássicos. O sistema evoluiu de um ambiente local para uma arquitetura baseada em nuvem, utilizando integração entre múltiplas plataformas para garantir persistência de dados e alta disponibilidade de mídia.

O projeto demonstra competências avançadas em CRUD, manipulação de APIs de terceiros, segurança SSL e armazenamento em nuvem.

🏗️ Arquitetura do Projeto
O sistema foi desenhado para operar de forma distribuída:

Frontend & Backend (Hospedagem): Render (Ambiente de execução PHP).

Banco de Dados Remoto: Aiven (Instância MySQL Gerenciada com conexão via SSL).

Storage de Mídia (CDN): Cloudinary (Armazenamento permanente e otimização de imagens).

📊 Funcionalidades Implementadas
[x] Arquitetura Cloud: Sistema hospedado e funcional em ambiente de produção.

[x] Persistência de Imagens: Integração com API do Cloudinary para evitar perda de arquivos em servidores efêmeros.

[x] Banco de Dados Remoto: Conexão segura via TLS/SSL com MySQL externo.

[x] Painel Administrativo: Interface protegida para gestão em tempo real do catálogo.

[x] Player de Vídeo Híbrido: Suporte para embeds do YouTube e arquivos MP4 diretos.

[x] Busca em Tempo Real: Filtro inteligente por nome ou descrição via JavaScript.

🛠️ Tecnologias Utilizadas
Frontend: HTML5, CSS3 (Modern UI), JavaScript (ES6+ / Fetch API).

Backend: PHP 8.x (Arquitetura de API JSON).

Database: MySQL (Hospedado no Aiven).

Cloud & Integrações: Cloudinary API (Imagens), cURL (PHP), Render (PaaS).

🚀 Como o Projeto Funciona (Fluxo de Dados)
O usuário ADM faz upload de uma capa e preenche os dados do desenho.

O Backend PHP recebe a imagem e a envia via cURL para o Cloudinary.

O Cloudinary processa e retorna uma URL segura (HTTPS).

O PHP salva essa URL e os dados do desenho no banco Aiven.

O Frontend consome a API e renderiza os cards utilizando as URLs otimizadas da CDN.

🧪 Como usar
Como o projeto está em produção, você pode acessá-lo diretamente pelo link:

(https://streaming-desenhos-antigos.onrender.com/)

Para rodar localmente:

Clone este repositório.

Configure as variáveis de conexão (Host, Porta, Senha SSL) em api/ para apontar para seu banco.

Certifique-se de ter a extensão php-curl ativa para os uploads.

Configure seu Cloud Name e Upload Preset nos arquivos de API.

© 2026 - Desenvolvido por André Waldige
