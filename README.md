📺 Desenhos Antigos — Streaming Retrô & Cloud Architecture

📖 Visão Geral
Este é um projeto Full Stack que simula uma plataforma de streaming focada em desenhos clássicos. O sistema evoluiu de um ambiente local para uma arquitetura baseada em nuvem, utilizando integração entre múltiplas plataformas para garantir persistência de dados e alta disponibilidade de mídia.

O projeto demonstra competências avançadas em CRUD, manipulação de APIs de terceiros, segurança SSL/TLS e otimização de interface com Vanilla JavaScript.

🏗️ Arquitetura do Projeto
O sistema foi desenhado para operar de forma distribuída e resiliente:

Frontend & Backend (Hospedagem): Render (Ambiente de execução PHP).

Banco de Dados Remoto: Aiven (Instância MySQL Gerenciada com conexão via SSL).

Storage de Mídia (CDN): Cloudinary (Armazenamento permanente e otimização de imagens).

📊 Funcionalidades Implementadas
☁️ Infraestrutura & Cloud

[x] Arquitetura Cloud: Sistema totalmente hospedado e funcional em ambiente de produção.

[x] Persistência de Imagens: Integração com API do Cloudinary para evitar perda de arquivos em servidores efêmeros.

[x] Banco de Dados Remoto: Conexão segura via TLS/SSL com banco MySQL externo, garantindo integridade dos dados.

🎮 Experiência do Usuário (UX)

[x] Modo "Surpreenda-me" (Shuffle): Algoritmo de seleção aleatória que escolhe e reproduz um desenho instantaneamente, simulando a experiência de sintonizar uma TV antiga.

[x] Notificações Toast: Sistema de feedback visual moderno que confirma ações (Login, Cadastro, Edição, Exclusão) sem interromper a navegação.

[x] Curadoria por Décadas: Agrupamento dinâmico no Front-end que organiza o catálogo cronologicamente (Anos 60, 70, 80, 90).

[x] Busca em Tempo Real: Filtro inteligente via JavaScript que percorre nomes e descrições instantaneamente.

🔐 Administração & Gestão
[x] Painel Administrativo: Interface protegida por autenticação para gestão em tempo real do catálogo.

[x] Player de Vídeo Híbrido: Suporte inteligente para embeds do YouTube e arquivos MP4 diretos.

[x] Gestão de Erros: Sistema de "Cache Busting" e sanitização de strings para garantir que caracteres especiais não quebrem a interface.

🛠️ Tecnologias Utilizadas
Frontend: HTML5, CSS3 (Modern UI/Responsive), JavaScript (ES6+ / Fetch API).

Backend: PHP 8.x (Arquitetura de API JSON).

Database: MySQL (Hospedado no Aiven).

Cloud & Integrações: Cloudinary API (Imagens), cURL (PHP), Render (PaaS).

🚀 Fluxo de Dados (Upload de Mídia)
O usuário ADM faz upload de uma capa e preenche os dados.

O Backend PHP recebe a imagem e a envia via cURL para o Cloudinary.

O Cloudinary processa e retorna uma URL segura (HTTPS).

O PHP salva essa URL e os metadados do desenho no banco Aiven.

O Frontend consome a API e renderiza os cards utilizando as URLs otimizadas da CDN.

🚀 Próximos Passos & Melhorias Futuras

🛠️ Evoluções Técnicas

[ ] Autenticação JWT: Substituir a validação simples por JSON Web Tokens para maior segurança.

[ ] Refatoração para POO: Migrar o código PHP procedural para o padrão MVC (Model-View-Controller).

[ ] Dockerização: Criar um docker-compose para facilitar o setup do ambiente de desenvolvimento.

🎨 Experiência & Interface

[ ] PWA (Progressive Web App): Transformar o site em uma aplicação instalável no celular.

[ ] Skeleton Screens: Placeholder de carregamento elegante enquanto os dados são puxados da API.

[ ] Filtro VHS/CRT: Efeito visual opcional de "TV de Tubo" para aumentar a imersão retrô.

🧪 Acesso ao Projeto

O projeto está em produção e pode ser acessado pelo link abaixo:

👉 https://streaming-desenhos-antigos.onrender.com/

© 2026 — Desenvolvido por André Waldige
