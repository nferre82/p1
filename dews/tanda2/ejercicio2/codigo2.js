anchura=prompt("Introduce la anchura de tu pantalla");
altura=prompt("Introduce la altura de tu pantalla");
html = `
    <p>El diagonal de la pantalla es: ${Math.sqrt(Math.pow(anchura,2)+Math.pow(altura,2))}</p>
`;
let app = document.querySelector('#mensaje');
app.innerHTML = html;