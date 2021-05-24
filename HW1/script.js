
caricaPiloti();
const aggPreferiti= 'https://image.flaticon.com/icons/png/128/116/116286.png?ga=GA1.2.1746131912.1618099200';
const rimPreferiti= 'https://image.flaticon.com/icons/png/128/56/56786.png?ga=GA1.2.1623233742.1618704000';

function caricaPiloti(){
    fetch("carica_piloti.php").then(onResponsePilota).then(onJSONPilota);
}

function onResponsePilota(response){
    console.log('Risposta ricevuta');
    return response.json();
}

function onJSONPilota(json){
    
    console.log(json);
    const sezPiloti= document.querySelector("#grid");
    const form_data = {method: 'post', body: new FormData(sezPiloti)};
  
    for (let i in json){
      const divPilota= document.createElement("div");
      sezPiloti.appendChild(divPilota);  
      divPilota.classList.add('flex');
  
      const h1=document.createElement("h1");   
      const car=document.createElement("img");  
      const img=document.createElement("img");
      const span=document.createElement("span");
      const des=document.createElement("p");
      const info=document.createElement("strong");
      
      const index=json[i].id_pilota;
      divPilota.setAttribute("data-index",index);
      h1.textContent= json[i].nome;
      divPilota.appendChild(h1);      
      img.src= json[i].immagine;
      divPilota.appendChild(img);
      img.classList.add('image');
      car.src= aggPreferiti;
      divPilota.appendChild(car);
      car.classList.add('preferiti');
      info.textContent='Più informazioni';
      divPilota.appendChild(info);
      span.textContent= "Codice Pilota: "+json[i].id_pilota;
      divPilota.appendChild(span);
      span.classList.add('hidden');
      des.textContent= json[i].descrizione;
      divPilota.appendChild(des);
      des.classList.add('hidden');
  
    }
  
    const grid=document.querySelectorAll("#grid strong");
    for(let gr of grid){
      gr.addEventListener('click', mostra);
    }
  
    const preferito=document.querySelectorAll('.preferiti');
    for(let c of preferito){
      c.addEventListener('click', gestionePreferiti);
    }
  }
  
  function mostra (event){
    const dettagli = event.currentTarget.parentNode.querySelector('p');
    const text = event.currentTarget.parentNode.querySelector('strong');
    if(text.textContent=== 'Più informazioni'){
      text.textContent='Meno informazioni';
      dettagli.classList.remove('hidden');
    }else{
      dettagli.classList.add('hidden');
      text.textContent='Più informazioni';
    }
  }
  
