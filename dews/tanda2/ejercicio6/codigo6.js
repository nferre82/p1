fechaNac=prompt("Introduce la fecha de nacimiento");
myArr=fechaNac.split("/");
data=new Date();
data=new Date(myArr[0],myArr[1],myArr[2]);
function diaMesValido(){
    switch(myArr[2]){
        case 1,3,5,7,8,10,12:
            if(myArr[2]>31){
                return false;
            }
        break;
        case 4,6,9,11:
            if(myArr[2]>30){
                return false;
            }
        break;
    }
    return true;
}
function anyoBisiesto(variable){
    if(variable%400==0){
        return true;
    }else if(variable%4==0&&variable%100!=0){
        return true;
    }
    return false;
}
function validar_fecha(){
    if(isNaN(data)){
        return false;
    }else if(myArr[1]<1||myArr[1]>12){
        return false;
    }else if(myArr[0]<0){
        return false;
    }else if(anyoBisiesto(myArr[0])&&myArr[2]>29&&myArr[1]==2){
        return false;
    }else if(!(anyoBisiesto(myArr[0]))&&myArr[2]>28&&myArr[1]==2){
        return false;
    }else if(!diaMesValido){
        return false;
    }e
    return true;
}
if(!validar_fecha()){
    alert("fecha Invalida");
}else{
    
hoy = new Date();

anyo_Hoy=hoy.getFullYear();
anyos_Antes=data.getFullYear();
if((hoy.getMonth()<hoy.getMonth())||((hoy.getMonth()==data.getMonth())&&hoy.getDate()<data.getMonth())){
    diff_anyos=anyo_Hoy-anyos_Antes-1;
}else{
    diff_anyos=anyo_Hoy-anyos_Antes;
}
html=`
    <p>Has nacido en ${data.getDate()+"/"+data.getMonth()+"/"+data.getFullYear()}</p>
    <p>Tienes ${diff_anyos} años</p>
`;

let app = document.querySelector('#mensaje');
app.innerHTML=html;
}
