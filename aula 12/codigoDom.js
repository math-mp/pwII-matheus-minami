let titulo = document.getElementById("titulo-aula");

titulo.innerText = "DOM dominado!";

titulo.style.color = "red";
titulo.style.textAlign = "center";

let paragrafo = document.querySelector(".texto-aula");
paragrafo.style.backgroundColor = "yellow";

paragrafo.style.fontWeight ="bold";

let botao = document.getElementById("meu-botao");

botao.addEventListener("click",function(){
alert("Incrivel! o javascript ouviu seu clique!");
});

let lista = document.getElementById ("lista-aula");

let novoItem = document.createElement ("li");

novoItem.innerText = "nasci do javascript ao vivo!";
novoItem.style.color = "green";

lista.appendChild(novoItem);
