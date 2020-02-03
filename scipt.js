
// url qui contiendra les repo
const affichage = document.getElementById("api")




//api github
async function github(){
    const url = "https://api.github.com/users/quendepa/repos"
    const response = await fetch(url)
    const result = await response.json()
    console.log(result)

    
    result.forEach(element => {

       const creat = document.createElement("a");

        creat.href = element.html_url;
        creat.textContent = element.name +": réalisé le :"+ element.created_at
        
        
        const list = document.createElement("p")
        

        list.appendChild(creat)
        affichage.appendChild(list)

    });
}


github();



const webdev = document.getElementById('cadre')
TweenMax.to(webdev, 1, {x: 450})
TweenMax.to(webdev, 1, {y: 50, delay: 1})


const id = document.getElementById('id')
TweenMax.to(id, 1, {x: 1700})
TweenMax.to(id, 1, {y: 100, delay: 1})


const description = document.getElementById('animation-description')

TweenMax.to(description , 1, {y: 700})
TweenMax.to(description , 1, {x: 300, delay: 1})


var lesson = new SplitText("#animation-description", {type: "words, chars, lines"});
TweenLite.set("#animation-description", {perspective: 400});
TweenMax.staggerFrom(lesson.chars, 0.8, {opacity: 0, scale:0, rotationX: 180, y: 80, transformOrigin: "0% 50% -50", ease: Back.easeOut}, 0.01, allDone);
function allDone(){
  lesson.revert();
}














  
