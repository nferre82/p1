cadena=prompt("Introduce una cadena");
html = `
    <p>La longitud de la cadena introducida es: ${cadena.length}</p>
`;
let app = document.querySelector('#mensaje');
app.innerHTML = html;