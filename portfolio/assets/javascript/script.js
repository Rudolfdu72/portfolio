
let textAnimation = document.querySelector('.animation-text')
let navigation = document.querySelector('#navigation')
console.log(navigation);
window.addEventListener('load', (e)=>{
  if(textAnimation.style.marginRight === '-2000px'){
    textAnimation.style.marginRight = '0px'
  } else{
    textAnimation.style.marginRight = '0px'
    textAnimation.style.transition = 'margin-right 3s';
  }
}) 

window.addEventListener("scroll", (e)=>{
  if(window.scrollY > 100){
    navigation.style.marginTop = "0px";
    navigation.style.transition = '1.5s ease';
    navigation.style.backgroundColor = "black";
    navigation.style.bacggroundPosition = "fixed";
  } else{
    // navigation.style.marginTop = "0px";
    // navigation.style.transition = '1.5s ease';
  }
  
})

