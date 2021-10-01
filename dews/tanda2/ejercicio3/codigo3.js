
html = `
    <form action="">
        <input type="button" value="rojo" id="rojo" onclick="document.body.style.backgroundColor='red'">
        <input type="button" value="azul" id="azul" onclick="document.body.style.backgroundColor='blue'">
        <input type="button" value="verde" id="verde" onclick="document.body.style.backgroundColor='green'">
        <input type="button" value="amarillo" id="amarillo" onclick="document.body.style.backgroundColor='yellow'">
        <input type="button" value="rosa" id="rosa" onclick="document.body.style.backgroundColor='pink'">
    </form>
`;

let app = document.querySelector('#mensaje');
app.innerHTML = html;