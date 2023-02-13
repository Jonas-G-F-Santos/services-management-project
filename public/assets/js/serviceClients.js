let select = document.querySelector('.select-btn');
let list = document.querySelector('.list');
let angle = document.querySelector('.uil-angle-down');
let add = document.querySelector('.add-client');
let input = document.querySelectorAll('.input');
let inputName = document.querySelector('.input-name');
let textarea = document.querySelector('.textarea');
let desc = document.querySelector('.desc');
let option = document.querySelectorAll(".option");
let options = document.querySelector(".options");
let none = document.querySelector(".none");
let link = document.querySelector(".link");
let optSearch = document.querySelector(".opt-search");
let optionsS = document.querySelector(".options-search");
let clientId = document.querySelector(".client-id");
textarea.innerHTML = desc.value;

console.log(clientId.value);

// ------------ client-id old value when reloaded form error ------------------

if(typeof clientId.value !== "" && clientId.value !== 0) {
    option.forEach(option => {
        if(clientId.value === option.getAttribute('data-key')){
            select.innerHTML = "Cliente Selecionado: <strong>" + option.innerHTML + "</strong>";
            select.style.color = "#000";
            select.style.justifyContent = "center";
            list.style.display = "none";
        }
    });
}

// ----------------- new client old action -------------

input.forEach(input => {
    
    let count = 0;

    if (input.value !== "") {

        count = 1;

    }

    if (count === 1) {

        add.style.display = "flex";
        select.innerHTML = link.innerHTML;
        select.style.color = "#000";
        select.style.justifyContent = "center";
        list.style.display = "none";
    }

});

// ---------- Clients Options Search -------------------

let is = options.getAttribute('data-key');

if(is == 0){
    options.style.overflowY = "hidden";
    optionsS.style.display = "none";
    list.style.padding = "1px";
}

optSearch.addEventListener("input", (event) => {

    let val = optSearch.value;
   
    let trim = val.trim();

    let trimLower = trim.toLowerCase();

    let leng = trim.length;

    let names = [];

    option.forEach(option => {
        let opt = option.innerHTML;
        let lowerOpt = opt.toLowerCase();
        option.style.display = "block";
        names.push(lowerOpt);
    });

    none.style.display = "none";

    if(leng > 0){
        option.forEach(option => {
            let opt = option.innerHTML;
            let lowerOpt = opt.toLowerCase();
            let slice = lowerOpt.slice(0,leng);
            if(trimLower != slice) {
                option.style.display = "none";
                names = names.filter(element => element !== lowerOpt);
                let namesLen = names.length;
                if(namesLen < 1){
                    none.style.display = "block";
                }
            }
        });
    }
});

// ------------- text area transfer to desc ---------------

textarea.addEventListener("input", (event) => {
    
    desc.value = textarea.value;


});

// ------------------- Select / List Action -------------------
  
select.addEventListener("click", (event) => {

    if (list.style.display === "none") {

        list.style.display = "flex";
        add.style.display = "none";
        optSearch.value = "";
        input.forEach(input => {
            input.value = "";
        });
        option.forEach(option => {
            option.style.display = "block";
        });
        none.style.display = "none";
        select.innerHTML = '<span>Selecione o Cliente</span>' + '<i class="uil uil-angle-up"></i>';

    } else {
        list.style.display = "none";
        select.innerHTML = '<span>Selecione o Cliente</span>' + '<i class="uil uil-angle-down"></i>';
    }
    select.style.justifyContent = "space-between";
    select.style.color = "#5a5a5a";
    clientId.value = "";
    console.log(clientId.value);
});

// ----------------- Client Selecting Action ---------------------

option.forEach(option => {
    option.addEventListener("click", (event) => {
        select.innerHTML = "Cliente Selecionado: <strong>" + option.innerHTML + "</strong>";
        select.style.color = "#000";
        select.style.justifyContent = "center";
        add.style.display = "none";
        list.style.display = "none";
        clientId.value = option.getAttribute('data-key');
        console.log(clientId.value);
        option.forEach(option => {
            option.style.display = "block";
        });
        none.style.display = "none";
    });
});

// ----------- add-client button link action ----------------------

link.addEventListener("click", (event) => {
    
    list.style.display = "none";
    select.innerHTML = link.innerHTML;
    select.style.color = "#000";
    select.style.justifyContent = "center";
    add.style.display = "flex";
    

});



