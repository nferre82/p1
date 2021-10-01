window.status = "Bienvenido a JavaScript";
window.open("http://google.com","myVentana","_blank","menubar=1,directories=0,toolbar=0,status=0,resizable=0,scrollbars=0,height=400,width=600,top=50,left=150");
html=`
        <div style="border:solid #0000FF">
                <h3 style="text-decoration:underline;">
                <strong>Objeto Screen</strong></h3>
                <p>La resolucion de pantalla es ${screen.width}x${screen.height}</p>
        </div>
        <div style="border:solid #FF0000">
                <h3 style="text-decoration:underline;">
                <strong>Objeto Navigator</strong></h3>
                <p>La resolucion de pantalla es ${screen.width}x${screen.height}</p>
                <p>El nombre del navegador que usas es: ${navigator.appName}</p>
                <p>Usas el siguiente sistema operativo: ${navigator.appCodeName}</p>
                <p>La version del navegador que usas es: ${navigator.userAgent}</p>
                </div>
                <div style="border:solid #008000">
                <h3 style="text-decoration:underline;">
                <strong>Objeto Document</strong></h3>
                <p>La url del documento es:  ${window.location}</p>
                </div>
                <div style="border:solid #FF0">
                <h3 style="text-decoration:underline;">
                <strong>Objeto Location</strong></h3>
                <p>El protocolo usado para acceder a esta página a sido: ${location.protocol}</p>
                </div>         
        `;
        let app = document.querySelector('#mensaje');
        app.innerHTML = html;