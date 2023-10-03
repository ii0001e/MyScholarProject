let score = 0;





function kontrollkys1(){
    if(document.getElementById("kys1v1").checked===true){
        document.getElementById("vastus1").innerHTML="Õige";
        document.getElementById("k1").style.background="#00CC66";
        score++;
    } else{
        document.getElementById("vastus1").innerHTML="Vale, mõtle veel=("
        document.getElementById("k1").style.background="#E94E4E";
        score += 0;
    }
    return score;
}
function kontrollkys2(){
    if(document.getElementById("kys2v2").checked===true){
        document.getElementById("vastus2").innerHTML="Õige";
        document.getElementById("k2").style.background="#00CC66";
        score++;
    } else{
        document.getElementById("vastus2").innerHTML="Vale, mõtle veel=("
        document.getElementById("k2").style.background="#E94E4E";
        score += 0;
    }
    return score;
}

function kontrollkys3(){
    if((document.getElementById("kys3v3").checked===true)&&(document.getElementById("kys3v4").checked===true)&&(document.getElementById("kys3v1").checked===false)&&(document.getElementById("kys3v2").checked===false)){
        document.getElementById("vastus3").innerHTML="Õige";
        document.getElementById("k3").style.background="#00CC66";
        score++;
    }
    else if ((document.getElementById("kys3v3").checked===true)||(document.getElementById("kys3v4").checked===true)){
        document.getElementById("vastus3").innerHTML="Valitud on üks või mitmest õigest vastusest";
        document.getElementById("k3").style.background="#FFFF00";
        score += 0.5;

    }
    else if((document.getElementById("kys3v1").checked===true)||(document.getElementById("kys3v2").checked===true)){
        document.getElementById("vastus3").innerHTML="Vale, mõtle veel=("
        document.getElementById("k3").style.background="#E94E4E";
        score += 0;
    }
    return score;
}

function kontrollkys4(){
    if((document.getElementById("kys4v2").checked===true)&&(document.getElementById("kys4v3").checked===true)&&(document.getElementById("kys4v4").checked===true)&&(document.getElementById("kys4v1").checked===false)){
        document.getElementById("vastus4").innerHTML="Õige";
        document.getElementById("k4").style.background="#00CC66";
        score++;
    }
    else if ((document.getElementById("kys4v2").checked===true)||(document.getElementById("kys4v3").checked===true)||(document.getElementById("kys4v4").checked===true)){
        document.getElementById("vastus4").innerHTML="Valitud on üks või mitmest õigest vastusest";
        document.getElementById("k4").style.background="#FFFF00";
        score += 0.5;

    }
    else if(document.getElementById("kys4v1").checked===true){
        document.getElementById("vastus4").innerHTML="Vale, mõtle veel=("
        document.getElementById("k4").style.background="#E94E4E";
        score += 0;
    }
    return score;
}

function kontrollkys5(){
    if(document.getElementById("kys5v1").checked===true){
        document.getElementById("vastus5").innerHTML="Õige";
        document.getElementById("k5").style.background="#00CC66";
        score++;
    } else{
        document.getElementById("vastus5").innerHTML="Vale, mõtle veel=("
        document.getElementById("k5").style.background="#E94E4E";
        score += 0;
    }
    return score;
}

function kontrollkys6(){
    if((document.getElementById("kys6v2").checked===true)&&(document.getElementById("kys6v3").checked===true)&&(document.getElementById("kys6v1").checked===false)&&(document.getElementById("kys6v4").checked===false)){
        document.getElementById("vastus6").innerHTML="Õige";
        document.getElementById("k6").style.background="#00CC66";
        score++;
    }
    else if ((document.getElementById("kys6v2").checked===true)||(document.getElementById("kys6v3").checked===true)){
        document.getElementById("vastus6").innerHTML="Valitud on üks või mitmest õigest vastusest";
        document.getElementById("k6").style.background="#FFFF00";
        score += 0.5;

    }
    else if((document.getElementById("kys6v1").checked===true)||(document.getElementById("kys6v4").checked===true)){
        document.getElementById("vastus6").innerHTML="Vale, mõtle veel=("
        document.getElementById("k6").style.background="#E94E4E";
        score += 0;
    }
    return score;
}

function kontrollkys7(){
    if(document.getElementById("kys7v2").checked===true){
        document.getElementById("vastus7").innerHTML="Õige";
        document.getElementById("k7").style.background="#00CC66";
        score++;
    } else{
        document.getElementById("vastus7").innerHTML="Vale, mõtle veel=("
        document.getElementById("k7").style.background="#E94E4E";
        score += 0;
    }
    return score;
}
function kontrollkys8(){
    if((document.getElementById("kys8v1").checked===true)&&(document.getElementById("kys8v3").checked===true)&&(document.getElementById("kys8v2").checked===false)&&(document.getElementById("kys8v4").checked===false)){
        document.getElementById("vastus8").innerHTML="Õige";
        document.getElementById("k8").style.background="#00CC66";
        score++;
    }
    else if ((document.getElementById("kys8v1").checked===true)||(document.getElementById("kys8v3").checked===true)){
        document.getElementById("vastus8").innerHTML="Valitud on üks või mitmest õigest vastusest";
        document.getElementById("k8").style.background="#FFFF00";
        score += 0.5;

    }
    else if((document.getElementById("kys8v2").checked===true)||(document.getElementById("kys8v4").checked===true)){
        document.getElementById("vastus8").innerHTML="Vale, mõtle veel=("
        document.getElementById("k8").style.background="#E94E4E";
        score += 0;
    }
    return score;
}

function kontrollkys9(){
    if(document.getElementById("kys9v2").checked===true){
        document.getElementById("vastus9").innerHTML="Õige";
        document.getElementById("k9").style.background="#00CC66"
        score++;
    } else{
        document.getElementById("vastus9").innerHTML="Vale, mõtle veel=("
        document.getElementById("k9").style.background="#E94E4E";
        score += 0;
    }
    return score;
}

function kontrollkys10(){
    if((document.getElementById("kys10v1").checked===true)&&(document.getElementById("kys10v2").checked===true)&&(document.getElementById("kys10v3").checked===false)&&(document.getElementById("kys10v4").checked===false)){
        document.getElementById("vastus10").innerHTML="Õige";
        document.getElementById("k10").style.background="#00CC66";
        score++;
    }
    else if ((document.getElementById("kys10v1").checked===true)||(document.getElementById("kys10v2").checked===true)){
        document.getElementById("vastus10").innerHTML="Valitud on üks või mitmest õigest vastusest";
        document.getElementById("k10").style.background="#FFFF00";
        score += 0.5;

    }
    else if((document.getElementById("kys10v3").checked===true)||(document.getElementById("kys10v4").checked===true)){
        document.getElementById("vastus10").innerHTML="Vale, mõtle veel=("
        document.getElementById("k10").style.background="#E94E4E";
        score += 0;
    }
    return score;
}

function scoreCount(){
    if (score > 10){score = 10}
    document.getElementById("scorevastus").innerHTML="Sul on "+score+" õiget vastust 10-st";

}