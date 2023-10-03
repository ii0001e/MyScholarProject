function kustuta(){
    let j=document.getElementById("joonis").getContext("2d");
    j.clearRect(0,0,400,300);

}
function ring(){
    let j=document.getElementById("joonis").getContext("2d");
    // окружность
    j.beginPath();
    j.arc(150,100,63,0,2*Math.PI,true);
    j.strokeStyle="orange";
    j.stroke();

    // окружность
    j.beginPath();
    j.arc(150,100,60,0,2*Math.PI,true);
    j.fillStyle="red";
    j.fill();
}
function liin(){
    let j=document.getElementById("joonis").getContext("2d");
    // окружность
    j.beginPath();
    j.moveTo(200,150); //alguspunkt
    j.lineTo(300,180); //resultaat
    j.lineTo(300,250); //resultaat
    j.lineTo(350,100); //resultaat
    j.strokeStyle="orange";
    j.lineWidth="4";
    j.stroke();


}

function riskulik(){
    let j=document.getElementById("joonis").getContext("2d");
    let laius=document.getElementById("laius").value;
    let korgus=document.getElementById("korgus").value;
    j.fillStyle="red";
    j.fillRect(100,100,laius,korgus); //x,y,laius,kõrgus



}
function koos(){
    riskulik();
    liin();
    ring();
}