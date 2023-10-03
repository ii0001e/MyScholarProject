function kustuta(){
    let mine=document.getElementById("mineskin").getContext("2d");
    mine.clearRect(0,0,350,250);

}
function bod(){
    let mine=document.getElementById("mineskin").getContext("2d");
    mine.beginPath();
    mine.fillStyle="#FED9AF";
    mine.fillRect(75,40,95,265); //body
    mine.fillRect(36,100,170,130); //hands
    mine.moveTo(75+47,305);
    mine.lineTo(75+47,205);
    mine.moveTo(75,150);
    mine.lineTo(75,230);
    mine.moveTo(170,150);
    mine.lineTo(170,230);
    mine.moveTo(80,285);
    mine.lineTo(115,285);
    mine.moveTo(130,285);
    mine.lineTo(165,285);
    mine.moveTo(86,100);
    mine.lineTo(156,100);
    mine.fillStyle="black";
    mine.lineWidth="3";
    mine.stroke();

}

function clothes(){
    let mine=document.getElementById("mineskin").getContext("2d");
    // окружность
    mine.fillStyle="#01F7FF";
    mine.fillRect(75,70,95,260); //body
    mine.fillRect(36,80,170,130); //hands
    mine.fillStyle="black";
    mine.fillRect(206,225,-40,-20); //body
    mine.fillRect(36,225,40,-20); //hands
    mine.fillStyle="#FED9AF";
    mine.fillRect(85,286,30,-15); //body
    mine.fillRect(130,286,30,-15); //hands
    mine.fillStyle="white";
    mine.fillRect(85,316,25,-15); //body
    mine.fillRect(135,316,25,-15); //hands
    mine.fillStyle="#674B38";
    mine.fillRect(75,40,95,-15); //body
    mine.fillRect(75,40,10,15); //hands
    mine.fillRect(170,40,-10,15); //body
    mine.fillStyle="#7D5643";
    mine.fillRect(80,25,85,-10); //hands

    mine.fillStyle="white";
    mine.fillRect(100,45,15,20); //body
    mine.fillRect(135,45,15,20); //hands
    mine.fillStyle="black";
    mine.fillRect(100,45,10,10); //body
    mine.fillRect(135,45,10,10); //hands
    // mine.fillStyle="black";
    // mine.lineWidth="3";
    // mine.stroke();

}

function accesories(){
    let mine=document.getElementById("mineskin").getContext("2d");
    // окружность
    mine.fillStyle="black";
    mine.fillRect(75,70,95,235); //body
    mine.fillRect(36,80,170,130); //hands
    mine.fillStyle="black";
    mine.fillRect(206,225,-40,-20); //body
    mine.fillRect(36,225,40,-20); //hands
    mine.fillStyle="#FED9AF";
    mine.fillRect(85,286,30,-15); //body
    mine.fillRect(130,286,30,-15); //hands
    mine.fillStyle="white";
    mine.fillRect(85,316,25,-15); //body
    mine.fillRect(135,316,25,-15); //hands
    mine.fillStyle="blue";
    mine.fillRect(75,40,-3,30); //body
    mine.fillRect(170,40,3,30); //body
    // mine.fillRect(75,40,10,15); //hands
    // mine.fillRect(170,40,-10,15); //body
    mine.beginPath();
    mine.moveTo(75+47,305);
    mine.lineTo(75+47,205);
    mine.moveTo(75,150);
    mine.lineTo(75,230);
    mine.moveTo(170,150);
    mine.lineTo(170,230);
    mine.moveTo(80,285);
    mine.lineTo(115,285);
    mine.moveTo(130,285);
    mine.lineTo(165,285);
    mine.moveTo(86,100);
    mine.lineTo(156,100);
    mine.fillStyle="blue";
    mine.lineWidth="3";
    mine.stroke();
}
function koos(){
    riskulik();
    liin();
    ring();
}