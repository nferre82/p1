anyoInicio=prompt("Introduce fecha inicio");
anyoInicio=new Date(anyoInicio,1,1,0,0,0,0);
if(isNaN(anyoInicio)){
    alert("anyo invalido");
}else{
    var segundos = Math.floor(new Date() - (anyoInicio)/1000);
    var minutos = (segundos/60);
    var horas = (minutos/60);
    var dias = (horas/24);
    html=`
    <p>${dias+" "+horas+" "+minutos+" "+segundos}</p>
`;

let app = document.querySelector('#mensaje');
app.innerHTML=html;
}
