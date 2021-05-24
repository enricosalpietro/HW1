aggiornaPreferiti();

function gestionePreferiti(event){
  const titolo=event.currentTarget.parentNode.querySelector('h1');
  const pref=event.currentTarget.parentNode.querySelector('.preferiti');
  const imm=event.currentTarget.parentNode.querySelector('.image');
  const strcod= event.currentTarget.parentNode.querySelector('span').textContent.split(": ", 2);
  const codice= strcod[1];
  const divPiloti= event.currentTarget.parentNode;

  const form= divPiloti.parentNode;

  const inpt=document.createElement("input");
  inpt.type="hidden";
  inpt.name="codice";
  inpt.value=codice;
  divPiloti.appendChild(inpt);

  const form_data = {method: 'post', body: new FormData(form)};

  if(pref.src=== aggPreferiti){       //ALLORA DEVO AGGIUNGERE.
    fetch("http://localhost/HW1/add_preferiti.php", form_data).then(responseAddPreferiti);
  }else{                           //ALLORA DEVO RIMUOVERE.
    fetch("http://localhost/HW1/rimuovi_preferiti.php", form_data).then(responseAddPreferiti);

    const controlloIcona= document.querySelector("#grid");

    for (let j = 0; j < controlloIcona.childNodes.length; j++) {
      titoliTuttiProdotti= controlloIcona.childNodes[j].getElementsByTagName("h1")[0].textContent;
      if(titoliTuttiProdotti===titolo.textContent){
        controlloIcona.childNodes[j].getElementsByTagName("img")[0].classList.remove('hidden');
      }
    }
  }
}

function responseAddPreferiti(response){
    // Aggiorna eventi
    aggiornaPreferiti();
}

function aggiornaPreferiti(){
    // Richiedi lista eventi
    fetch("carica_piloti.php").then(responseAggiornaPreferiti).then(onJSONPreferiti);
}

function responseAggiornaPreferiti(response){
  console.log('Risposta ricevuta');
    return response.json();
}

function onJSONPreferiti(json){
    
  console.log(json);
  const sezPreferiti= document.querySelector("#sezPreferiti");
  const sezPiloti= document.querySelector("#grid");


      if(sezPreferiti.childNodes.length>0){
        const divCancel= document.getElementById("#sezPreferiti");
        for(let k=0; k<divCancel.childNodes.length; k++ ){
          divCancel.childNodes[k].classList.add('hidden');
        }
      }

  if (json.length != 0){
    const label=document.querySelector("#favorite");
    label.classList.remove('hidden');
  }else{
    const label=document.querySelector("#favorite");
    label.classList.add('hidden');
  }

  for (let i in json){
    for (let j = 0; j < sezPiloti.childNodes.length; j++) {
      titoliTuttiPiloti= sezPiloti.childNodes[j].getElementsByTagName("h1")[0].textContent;
      if(titoliTuttiPiloti===json[i].nome){
        // console.log(titoliTuttiProdotti);
        sezPiloti.childNodes[j].getElementsByTagName("img")[0].classList.add('hidden');
      }
    }

    const divPref= document.createElement("div");
    sezPreferiti.appendChild(divPref);

    divPref.classList.add('flex');

    const h1=document.createElement("h1");
    h1.textContent= json[i].nome;
    divPref.appendChild(h1);

    const car=document.createElement("img");
    car.src= rimPreferiti;
    divPref.appendChild(car);
    car.classList.add('preferiti');

    const img=document.createElement("img");
    img.src= json[i].immagine;
    divPref.appendChild(img);
    img.classList.add('image');

    const span=document.createElement("span");
    span.textContent= "Codice pilota: "+json[i].codice;
    divPref.appendChild(span);

    const p=document.createElement("p");
    p.textContent= json[i].descrizione;
    divPref.appendChild(p);
    p.classList.add('hidden');

    const didascalia=document.createElement("strong");
    didascalia.textContent='Più informazioni';
    divPref.appendChild(didascalia);

  }

  const grid=document.querySelectorAll("#sezPreferiti strong");
  for(let gr of grid){
    gr.addEventListener('click', details);
  }

  const preferito=document.querySelectorAll('.preferiti');
  for(let c of preferito){
    c.addEventListener('click', gestionePreferiti);
  }
}

function details (event){
  const details = event.currentTarget.parentNode.querySelector('p');
  const text = event.currentTarget.parentNode.querySelector('strong');
  if(text.textContent=== 'Più informazioni'){
    text.textContent='Meno informazioni';
    details.classList.remove('hidden');
  }else{
    details.classList.add('hidden');
    text.textContent='Più informazioni';
  }
}