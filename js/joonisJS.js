function drawHead(){
    let a=document.getElementById("zombie").getContext("2d");
    a.beginPath();
    a.fillStyle="green";
    a.moveTo(77,16);
    a.lineTo(123,16);
    a.lineTo(123,86);
    a.lineTo(111,86);
    a.lineTo(111,94);
    a.lineTo(106,94);
    a.lineTo(106,102);
    a.lineTo(94,102);
    a.lineTo(94,94);
    a.lineTo(89,94);
    a.lineTo(89,86);
    a.lineTo(77,86);
    a.lineTo(77,16);
    a.fill();
}

function drawBody(){
    let b=document.getElementById("zombie").getContext("2d");
    b.beginPath();
    b.fillStyle="aqua";
    b.moveTo(55,86);
    b.lineTo(89,86);
    b.lineTo(89,94);
    b.lineTo(94,94);
    b.lineTo(94,102);
    b.lineTo(106,102);
    b.lineTo(106,94);
    b.lineTo(111,94);
    b.lineTo(111,86);
    b.lineTo(144,86);
    b.lineTo(144,119);
    b.lineTo(122,119);
    b.lineTo(122,186);
    b.lineTo(117,186);
    b.lineTo(117,177);
    b.lineTo(111,177);
    b.lineTo(111,169);
    b.lineTo(77,169);
    b.lineTo(77,119);
    b.lineTo(56,119);
    b.lineTo(56,86);
    b.fill();
}

function drawHands(){
    let c=document.getElementById("zombie").getContext("2d");
    c.beginPath();
    c.fillStyle="green";
    c.moveTo(56,119);
    c.lineTo(77,119);
    c.lineTo(77,186);
    c.lineTo(56,186);
    c.lineTo(56,119);
    c.fill();
    drawHands2();
}

function drawHands2(){
    let d=document.getElementById("zombie").getContext("2d");
    d.beginPath();
    d.fillStyle="green";
    d.moveTo(122,119);
    d.lineTo(144,119);
    d.lineTo(144,186);
    d.lineTo(122,186);
    d.lineTo(122,119);
    d.fill();
}

function drawLegs(){
    let e=document.getElementById("zombie").getContext("2d");
    e.beginPath();
    e.fillStyle="blue";
    e.moveTo(77,169);
    e.lineTo(111,169);
    e.lineTo(111,177);
    e.lineTo(117,177);
    e.lineTo(117,186);
    e.lineTo(122,186);
    e.lineTo(122,268);
    e.lineTo(77,268);
    e.lineTo(77,169);
    e.fill();
}

function drawBoots(){
    let f=document.getElementById("zombie").getContext("2d");
    f.beginPath();
    f.fillStyle="gray";
    f.moveTo(77,268);
    f.lineTo(122,268);
    f.lineTo(122,284);
    f.lineTo(77,284);
    f.lineTo(77,268);
    f.fill();
}

function drawFace(){
    let g=document.getElementById("zombie").getContext("2d");
    g.beginPath();
    g.fillStyle="black";
    g.moveTo(83,50);
    g.lineTo(93,50);
    g.lineTo(93,59);
    g.lineTo(83,59);
    g.lineTo(83,50);
    g.fill();
    drawEyes2();
    drawMouth();
}

function drawEyes2(){
    let h=document.getElementById("zombie").getContext("2d");
    h.beginPath();
    h.fillStyle="black";
    h.moveTo(106,50);
    h.lineTo(117,50);
    h.lineTo(117,59);
    h.lineTo(106,59);
    h.lineTo(106,50);
    h.fill();
}

function drawMouth(){
    let i=document.getElementById("zombie").getContext("2d");
    i.beginPath();
    i.fillStyle="#003300";
    i.moveTo(94,59);
    i.lineTo(105,59);
    i.lineTo(105,68);
    i.lineTo(110,68);
    i.lineTo(110,76);
    i.lineTo(105,76);
    i.lineTo(105,68);
    i.lineTo(94,68);
    i.lineTo(94,76);
    i.lineTo(89,76);
    i.lineTo(89,68);
    i.lineTo(94,68);
    i.lineTo(94,59);
    i.fill();
}

function drawDirt(){
    let j=document.getElementById("zombie").getContext("2d");
    j.beginPath();
    j.fillStyle="#663300";
    j.moveTo(50,284);
    j.lineTo(150,284);
    j.lineTo(150,295);
    j.lineTo(50,295);
    j.lineTo(50,284);
    j.fill();
    drawGrass();
}

function drawGrass(){
    let q=document.getElementById("zombie").getContext("2d");
    q.beginPath();
    q.fillStyle="#1f7a1f";
    q.moveTo(50,284);
    q.lineTo(150,284);
    q.lineTo(150,290);
    q.lineTo(140,290);
    q.lineTo(140,292);
    q.lineTo(130,292);
    q.lineTo(130,290);
    q.lineTo(120,290);
    q.lineTo(120,292);
    q.lineTo(110,292);
    q.lineTo(110,290);
    q.lineTo(80,290);
    q.lineTo(80,292);
    q.lineTo(65,292);
    q.lineTo(65,290);
    q.lineTo(50,290);
    q.lineTo(50,284);
    q.fill();
}

function drawDetails(){
    let k=document.getElementById("zombie").getContext("2d");
    k.beginPath();
    k.fillStyle="#003300";
    k.moveTo(77,16);
    k.lineTo(123,16);
    k.lineTo(123,41);
    k.lineTo(117,41);
    k.lineTo(117,33);
    k.lineTo(100,33);
    k.lineTo(100,24);
    k.lineTo(89,24);
    k.lineTo(89,33);
    k.lineTo(77,33);
    k.lineTo(77,16);
    k.fill();
    drawLegDetail();
    drawLegDetail2();
    drawHandDetail();
}

function drawLegDetail(){
    let l=document.getElementById("zombie").getContext("2d");
    l.beginPath();
    l.fillStyle="#b3b3cc";
    l.moveTo(83,235);
    l.lineTo(93,235);
    l.lineTo(93,243);
    l.lineTo(83,243);
    l.lineTo(83,235);
    l.fill();
}

function drawLegDetail2(){
    let u=document.getElementById("zombie").getContext("2d");
    u.fillStyle="#b3b3cc";
    u.moveTo(106,235);
    u.lineTo(116,235);
    u.lineTo(116,243);
    u.lineTo(106,243);
    u.lineTo(106,235);
    u.fill();
}

function drawHandDetail(){
    let h=document.getElementById("zombie").getContext("2d");
    h.beginPath();
    h.fillStyle="#003300";
    h.fillRect(67, 127, 5, 18);
    h.fillRect(56, 136, 5, 24);
    h.fillRect(56, 178, 5, 8);
    h.fillRect(61, 169, 5, 17);
    h.fillRect(73, 177, 4, 9);
    h.fillRect(128, 127, 5, 18);
    h.fillRect(139, 136, 5, 24);
    h.fillRect(139, 178, 5, 8);
    h.fillRect(134, 169, 5, 17);
    h.fillRect(123, 177, 4, 9);

}

function drawAll(){
    drawHead();
    drawBody();
    drawFace();
    drawLegs();
    drawHands();
    drawBoots();
    drawDirt();
    drawDetails();
}

function clearCanvas2(){
    let t=document.getElementById("zombie").getContext("2d");
    t.clearRect(0,0,300,400);
}