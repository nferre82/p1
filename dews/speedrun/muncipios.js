var provincias = new Array("Araba", "Bizkaia", "Gipuzkoa", "Nafarroa", "Lapurdi", "Zuberoa", "Nafarroa Beherea")

var municipios_1 = new Array("Seleccione Municipio", "Vitoria-Gasteiz", "Amurrio", "El Ciego", "La Guardia");
var municipios_2 = new Array("Seleccione Municipio", "Bilbao", "Barakaldo", "Durango", "Elorrio", "Muzkiz");
var municipios_3 = new Array("Seleccione Municipio", "Donostia-San Sebastián", "Arrasate-Mondragón", "Eibar");
var municipios_4 = new Array("Seleccione Municipio", "Iruña", "Burlada", "Estella-Lizarra", "Tafalla");
var municipios_5 = new Array("Seleccione Municipio", "Baiona", "Bastida", "Hendaya", "Miarritze");
var municipios_6 = new Array("Seleccione Municipio", "Maule", "Barkoxe", "Sohüta");
var municipios_7 = new Array("Seleccione Municipio", "Baigorri", "Garazi", "Oztibarre");

var todosMunicipios = [
    [],
    municipios_1,
    municipios_2,
    municipios_3,
    municipios_4,
    municipios_5,
    municipios_6,
    municipios_7,
];
function establecerProvincia(){
    for(let cont=1;cont<=provincias.length;cont++){
        let provincia=document.f1.provincia[cont];
        provincia.innerHTML=provincias[cont-1];
}
}
function cambia_provincia() {
    document.getElementById("mensaje").innerHTML = "";

    //tomo el valor del select del pais elegido 
    var provincia;
    provincia = document.f1.provincia[document.f1.provincia.selectedIndex].value;

    //miro a ver si el pais está definido 
    if (provincia != 0) {
        //si estaba definido, entonces coloco las opciones de la provincia correspondiente. 
        //selecciono el array de muncipio adecuado 
        mis_municipios = todosMunicipios[provincia]
            //calculo el numero de municipios 
        num_municipios = mis_municipios.length;
            //marco el número de provincias en el select 
        document.f1.municipio.length = num_municipios;
            //para cada provincia del array, la introduzco en el select 
        for (i = 0; i < num_municipios; i++) {
            document.f1.municipio.options[i].value = mis_municipios[i]
            document.f1.municipio.options[i].text = mis_municipios[i]
        }
    } else {
        //si no había provincia seleccionada, elimino las provincias del select 
        document.f1.municipio.length = 1; 
            //coloco un guión en la única opción que he dejado 
        document.f1.municipio.options[0].value = "-";
        document.f1.municipio.options[0].text = "Seleccione Municipio";
            //document.getElementById("mensaje").innerHTML = "";

    }
    //marco como seleccionada la opción primera de provincia 
    document.f1.municipio.options[0].selected = true;

}

function muestraDatos() {
    var provincia = document.f1.provincia.value - 1;
    var municipio = document.f1.municipio.value;

    console.log(provincia);

    if (municipio != "Seleccione Municipio") {
        document.getElementById("mensaje").innerHTML = "<p>Ha seleccionado <b>" + municipio + "</b> en <b>" + provincias[provincia] + "</b>";
    } else {
        document.getElementById("mensaje").innerHTML = "";
    }
}