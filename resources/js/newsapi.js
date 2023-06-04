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
  
      const container = document.getElementById('contenedorNoticias');
  
      noticia.forEach(article => {
        const title = article.name;
        const fecha = new Date(article.datePublished).toLocaleDateString('es-ES');
        const description = article.description;
        const imagen = article.image?.thumbnail?.contentUrl;
        const urlnoticia = article.url; 
  

        if (imagen) {
            const nuevaImagen = document.createElement('img');
            nuevaImagen.src = imagen;
            nuevaImagen.alt = title; 
            container.appendChild(nuevaImagen);
  
            const titulo = document.createElement('h2');
            titulo.textContent = title;
    
            const descripcion = document.createElement('p');
            descripcion.textContent = description;
    
            const leermas = document.createElement('a');
            leermas.href = urlnoticia;
            leermas.textContent = 'Leer más';
            leermas.target = '_blank';

            const date = document.createElement('p');
            date.textContent = 'Fecha de publicación: ' + fecha;
    
            // Agrega los elementos al contenedor en tu página
            container.appendChild(date);
            container.appendChild(titulo);
            container.appendChild(descripcion);
            container.appendChild(leermas);
        }
      });
    } catch (error) {
      console.error(error);
    }
  }
  
  fetchData();
  