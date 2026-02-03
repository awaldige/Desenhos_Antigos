# 📌 Banco de Dados: Desenhos MIT (Anos 70 a 90)

## 📖 Visão Geral
Este banco de dados foi projetado para armazenar e gerenciar informações sobre **desenhos animados clássicos das décadas de 1970, 1980 e 1990**.  
Ele permite organizar dados sobre séries, temporadas, episódios, plataformas de streaming e avaliações dos usuários.

O objetivo é facilitar consultas e preservar informações sobre produções icônicas da animação.

---

## 🏗️ Estrutura do Banco de Dados

O banco de dados é composto pelas seguintes tabelas:

### 🎬 desenhos
Armazena informações principais sobre cada desenho:
- Título
- Ano de lançamento
- Descrição

### 📅 temporadas
Registra as temporadas de cada desenho:
- Ano de lançamento
- Quantidade total de episódios

### 📺 episodios
Contém detalhes de cada episódio:
- Título
- Número do episódio
- Duração

### 🌐 plataformas
Lista as plataformas de streaming disponíveis.

### 📡 streaming
Tabela de relacionamento indicando em quais plataformas cada desenho está disponível.

### ⭐ avaliacoes
Armazena avaliações e notas fornecidas pelos usuários para cada desenho.

---

## 🔗 Relacionamentos

O modelo de dados permite:

- Um desenho possuir várias temporadas.
- Cada temporada conter múltiplos episódios.
- Um desenho estar disponível em várias plataformas.
- Usuários registrarem avaliações para cada desenho.

---

## 📊 Funcionalidades Principais

✔️ Consultar desenhos clássicos das décadas de 70, 80 e 90.  
✔️ Verificar em quais plataformas assistir aos desenhos.  
✔️ Visualizar e inserir avaliações de usuários.  
✔️ Organizar informações históricas sobre animações.

---

## 🚀 Uso

Este banco de dados pode ser utilizado por:

- Fãs de animações retrô
- Pesquisadores e colecionadores
- Projetos educacionais
- Sites ou aplicativos sobre cultura pop e animações clássicas

Seu propósito é facilitar o armazenamento e consulta de dados sobre produções marcantes da animação mundial.

---

## 📜 Licença
Projeto de uso livre para fins educacionais e organizacionais.
