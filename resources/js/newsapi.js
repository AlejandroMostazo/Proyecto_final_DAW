async function fetchData() {
    const url = 'https://bing-news-search1.p.rapidapi.com/news?count=5&category=Sports&cc=GB&safeSearch=Off&textFormat=Raw';
    const options = {
      method: 'GET',
      headers: {
        'Accept-Language': 'es, en',
        'X-BingApis-SDK': 'true',
        'X-RapidAPI-Key': '40f7934902msh9bf35b5558b21d4p1a5e77jsn139ef20ebcdb',
        'X-RapidAPI-Host': 'bing-news-search1.p.rapidapi.com'
      }
    };
  
    try {
      const response = await fetch(url, options);
      const data = await response.json();
      const noticia = data.value;
      cargando.style.display = 'block';
  
      const container = document.getElementById('contenedorNoticias');
  
      noticia.forEach(article => {
        const title = article.name;
        const fecha = new Date(article.datePublished).toLocaleDateString('es-ES');
        const description = article.description;
        const imagen = article.image?.thumbnail?.contentUrl;
        const urlnoticia = article.url; 
  

        if (imagen) {
            const card = document.createElement('div');
            card.className = "card";

            const nuevaImagen = document.createElement('img');
            nuevaImagen.className = "imgnew";
            nuevaImagen.src = imagen;
            nuevaImagen.alt = title; 
            
  
            const titulo = document.createElement('p');
            titulo.className = "titles";
            titulo.textContent =  title;
    
            const descripcion = document.createElement('p');
            descripcion.textContent = description;
    
            const leermas = document.createElement('a');
            leermas.href = urlnoticia;
            leermas.className = "btn";
            leermas.textContent = '+ Info';
            leermas.target = '_blank';

            const date = document.createElement('p');
            date.textContent = "Publicado: " + fecha;
    
            const contentimg = document.createElement('div');
            contentimg.className = "contentimg";
            contentimg.appendChild(nuevaImagen);
            contentimg.appendChild(date);

            card.appendChild(contentimg);
            card.appendChild(titulo);
            card.appendChild(descripcion);
            card.appendChild(leermas);
            container.appendChild(card);
        }
      });
      cargando.style.display = 'none';
    } catch (error) {
      console.error(error);
    }
  }
  
  fetchData();
  