function habilitar(){
  text_1 =document.getElementById("nombre");
  text_2 =document.getElementById("aero");
  text_3 =document.getElementById("contraseña");

val = 0;

    if(text_1 == ""){
        val++;
    }
    if(text_2 == ""){
        val++;
    }
    if(text_3 == ""){
        val++;
    }
    if(val == 0){
        document.getElementById("btn").disabled = false;
    } else{
        document.getElementById("btn").disabled = true;
    }
}
document.getElementById("nombre").addEventListener("keyup", habilitar);
document.getElementById("aero").addEventListener("change", habilitar);
document.getElementById("contraseña").addEventListener("keyup", habilitar);