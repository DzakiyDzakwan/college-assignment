let drinkCard = document.querySelector('#drink-item')

let drinkItem = [
    [01, "food/cocktails.jpg","Coktail","No Drink No party","avatar/avatar2.png","John Doe","subpage/cocktail.html"],
    [02, "food/lemontea.jpg","Iced Lemon Tea","Lemon Tea with Ice","avatar/avatar5.png","Ava Max","subpage/lemontea.html"],
    [03, "food/strawberyjuice.jpg","Strawbery Juice","Strawbery mixed with ice :)","avatar/avatar3.png","Genghis Khan","subpage/strawberry.html"],
    [04, "food/maggojuice.jpg","Manggo Juice","Tasty Manggo Bro!!!","avatar/avatar1.png","Merri Weather","subpage/manggo.html"]
]

function print(array) {
    let item = "";

    let i;

    for (i = 0; i < array.length ; i++){
        item += `<div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card my-2" style="width: 100%;">
          <img src="${array[i][1]}" class="card-img-top food-img" alt="...">
            <div class="card-body">
              <h5 class="card-title"><a href="${array[i][6]}">${array[i][2]}</a></h5>
              <p class="card-text">${array[i][3]}</p>
              <div class="card-description">
                <div class="profile-card">
                  <img src="${array[i][4]}" alt="" class="profile-img">
                  <span><a href="">${array[i][5]}</a></span>
                </div>
                <div class="description-btn">
                  <a href="${array[i][6]}" class="btn comment-btn btn-outline-success mx-1">
                    <i class="far fa-comment"></i>
                  </a>
                  <span class="btn like-btn btn-outline-danger mx-1">
                    <i class="far fa-heart"></i>
                  </span>
                </div>
              </div>
            </div>
        </div>
      </div>`
    }

    return item
}

drinkCard.innerHTML = print(drinkItem);

//Search Engine

let inputan = document.querySelector('#inputan') 
let searchBtn = document.querySelector('#searchbtn')
let form = document.querySelector('#form-item')

function filter(inputan) {
    const filteredItems = []
    for (i = 0; i< drinkItem.length; i++){
        let items = drinkItem[i]
        let match = items[2].toLowerCase().includes(inputan.toLowerCase()) 

        if(match){
            filteredItems.push(items)
        }
    }

    return filteredItems;
}

form.addEventListener("submit",(evt)=>{
    evt.preventDefault();
    
    let value = inputan.value;
    let filtered = filter(value)

    drinkCard.innerHTML = print(filtered);
})

let likeButton = document.querySelectorAll('.like-btn');

likeButton.forEach((like)=>{
    like.addEventListener('click',(red)=>{
       like.classList.toggle('like')
    })
})