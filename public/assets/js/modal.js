let formulario = document.querySelector('.form');
let del = document.querySelector('.delete');
let modal = document.querySelector('.confirm');
let voltar = document.querySelector('.voltar');
let action = document.querySelector('.action');



del.addEventListener("click", (event) =>{

    del.classList.add('des');
    formulario.classList.add('des');
    modal.classList.add('apa');
});

voltar.addEventListener("click", (event) =>{

    del.classList.remove('des');
    formulario.classList.remove('des');
    modal.classList.remove('apa');
});
