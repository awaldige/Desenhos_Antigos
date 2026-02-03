📺 Desenhos Antigos — Banco de Dados + Catálogo Visual
📖 Visão Geral

Este projeto organiza informações sobre desenhos animados clássicos das décadas de 70, 80 e 90, permitindo armazenar e consultar dados sobre séries, temporadas, personagens e plataformas de streaming.

Além do banco de dados, o projeto agora possui uma interface visual estilo streaming, permitindo navegar pelos desenhos de forma moderna e intuitiva.

O objetivo é preservar e facilitar o acesso a informações sobre animações clássicas.

🏗️ Estrutura do Projeto

O repositório contém:

🗄️ Banco de Dados (MySQL)

Banco relacional contendo:

Estúdios

Criadores

Desenhos

Temporadas

Personagens

Premiações

Plataformas de streaming

Relacionamentos entre dados

Arquivo principal:

desenhos_antigos.sql

🌐 Interface Visual

Uma interface web permite visualizar os desenhos em formato de catálogo estilo streaming:

Banner de destaque

Lista de desenhos em cards

Navegação visual

Layout moderno escuro

Arquivos principais:

index.html
style.css
script.js

⚙️ API

Pequena API em PHP utilizada para ler os dados do banco e exibir no site.

api/desenhos.php

🔗 Modelo de Dados

O banco permite:

Um desenho possuir várias temporadas.

Cada desenho possuir vários personagens.

Um desenho estar disponível em várias plataformas.

Registro de premiações e criadores.

📊 Funcionalidades Atuais

✔️ Catálogo visual de desenhos
✔️ Banco relacional organizado
✔️ Consulta de dados via API
✔️ Projeto navegável para portfólio

🚀 Possíveis Evoluções

Planejado para futuras melhorias:

Página de detalhes do desenho

Lista de personagens

Temporadas e episódios

Busca por desenho

Favoritos

Painel administrativo

Versão responsiva para celular

🧪 Como usar

Importar o banco desenhos_antigos.sql no MySQL.

Configurar conexão no arquivo api/desenhos.php.

Abrir o projeto em um servidor local (XAMPP, WAMP etc).

Abrir index.html no navegador.

🎯 Objetivo do Projeto

Servir como:

Projeto de portfólio

Catálogo de animações clássicas

Base para sistemas de streaming retrô

Projeto educacional de banco + frontend

📜 Licença

Projeto livre para fins educacionais e experimentais.
