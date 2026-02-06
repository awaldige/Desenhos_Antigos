const capasPadrao = {
    "he-man": "imagens/he-man.png",
    "scooby-doo": "imagens/scooby-doo.png",
    "tom & jerry": "imagens/tom-e-jerry.png",
    "pica-pau": "imagens/pica-pau.png"
};

function normalizarTexto(txt) {
    return txt.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "").trim();
}

async function carregarDesenhos() {
    try {
        const resposta = await fetch("api/desenhos.php");
        const desenhos = await resposta.json();
        const lista = document.getElementById("lista");
        lista.innerHTML = "";

        desenhos.forEach((d, index) => {
            const nomeNorm = normalizarTexto(d.nome);
            let capa = d.imagem ? `imagens/${d.imagem}` : (capasPadrao[nomeNorm] || `https://picsum.photos/seed/${index}/300/450`);

            // Escapar aspas simples para não quebrar o onclick do botão
            const nomeEscapado = d.nome.replace(/'/g, "\\'");
            const descEscapada = (d.descricao || "").replace(/'/g, "\\'");

            const card = document.createElement("div");
            card.className = "card";
            card.innerHTML = `
                <img src="${capa}" alt="${d.nome}">
                <div class="info">
                    <h3>${d.nome}</h3>
                    <p>${d.ano_lancamento}</p>
                    <div class="acoes">
                        <button onclick="event.stopPropagation(); editarDesenho(${d.id_desenho}, '${nomeEscapado}', '${d.ano_lancamento}', '${descEscapada}')">✏️</button>
                        <button onclick="event.stopPropagation(); excluirDesenho(${d.id_desenho})">🗑️</button>
                    </div>
                </div>
            `;

            card.addEventListener("click", () => atualizarBanner(capa, d));
            lista.appendChild(card);
            if (index === 0) atualizarBanner(capa, d);
        });
    } catch (erro) {
        console.error("Erro ao carregar desenhos:", erro);
    }
}

// NOVA FUNÇÃO: EDITAR
async function editarDesenho(id, nomeAntigo, anoAntigo, descAntiga) {
    const novoNome = prompt("Editar Nome:", nomeAntigo);
    if (novoNome === null) return; // Cancela se o usuário desistir

    const novoAno = prompt("Editar Ano:", anoAntigo);
    const novaDesc = prompt("Editar Descrição:", descAntiga);

    const formData = new FormData();
    formData.append("id", id);
    formData.append("nome", novoNome);
    formData.append("ano", novoAno);
    formData.append("descricao", novaDesc);

    try {
        const res = await fetch("api/editar.php", {
            method: "POST",
            body: formData
        });
        const dados = await res.json();

        if (dados.sucesso) {
            alert("Atualizado com sucesso!");
            carregarDesenhos();
        } else {
            alert("Erro ao atualizar: " + dados.erro);
        }
    } catch (erro) {
        alert("Erro na conexão com o servidor.");
    }
}

function atualizarBanner(capa, desenho) {
    const banner = document.getElementById("banner");
    if (!banner) return;
    banner.style.opacity = 0.5;
    setTimeout(() => {
        banner.style.backgroundImage = `linear-gradient(to top, #141414, transparent), url(${capa})`;
        document.getElementById("banner-titulo").textContent = desenho.nome;
        document.getElementById("banner-desc").textContent = desenho.descricao || "";
        banner.style.opacity = 1;
    }, 300);
}

document.getElementById("formDesenho").addEventListener("submit", async (e) => {
    e.preventDefault();
    const formData = new FormData();
    formData.append("nome", document.getElementById("nome").value);
    formData.append("ano", document.getElementById("ano").value);
    formData.append("descricao", document.getElementById("descricao").value);
    
    const foto = document.getElementById("imagem").files[0];
    if (foto) formData.append("imagem", foto);

    try {
        const res = await fetch("api/adicionar.php", { method: "POST", body: formData });
        const dados = await res.json();

        if (dados.sucesso) {
            alert("Salvo com sucesso!");
            e.target.reset();
            carregarDesenhos();
        } else {
            alert("Erro ao salvar: " + dados.erro);
        }
    } catch (erro) {
        alert("Erro ao processar cadastro.");
    }
});

async function excluirDesenho(id) {
    if (!confirm("Deseja excluir este desenho?")) return;
    
    const formData = new FormData();
    formData.append("id", id);

    try {
        const res = await fetch("api/excluir.php", { method: "POST", body: formData });
        const dados = await res.json();
        
        if (dados.sucesso) {
            carregarDesenhos();
        } else {
            alert("Erro ao excluir.");
        }
    } catch (erro) {
        alert("Erro na conexão.");
    }
}

carregarDesenhos();
