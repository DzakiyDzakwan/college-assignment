let foodCard = document.querySelector('#food-item')

let foodItem = [
  [01, "food/cheeseburger.jpg","Cheese Burger","Burger with Cheese and more Cheese","avatar/avatar1.png","Merri Weather","subpage/cheeseburger.html"],
  [02, "food/beefburger.jpg","Beef Burger","Burger with Beef Lot of Beef","avatar/avatar2.png","John Doe","subpage/beefburger.html"],
  [03, "food/steak.jpg","Steak","Premium Meat with Delicious Sauce","avatar/avatar3.png","Genghis Khan","subpage/steak.html"],
  [04, "food/fruitsalad.jpg","Fruit Salad","Combine between Fruits and Vegetables","avatar/avatar4.png","Maria weather","subpage/fruitsalad.html"],
  [05, "food/icecream.jpg","Vanilla Ice Cream","Smooth Vanilla flavour Ice Cream","avatar/avatar5.png","Ava Max","subpage/icecream.html"],
  [06, "food/sphageti.jpg","Sphagetti Bolognise","Pasta with Hot Sauce","avatar/avatar2.png","John Doe","subpage/sphagetti.html"]
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

foodCard.innerHTML = print(foodItem);

//Search Engine

let inputan = document.querySelector('#inputan') 
let searchBtn = document.querySelector('#searchbtn')
let form = document.querySelector('#form-item')

function filter(inputan) {
    const filteredItems = []
    for (i = 0; i< foodItem.length; i++){
        let items = foodItem[i]
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

    foodCard.innerHTML = print(filtered);
})

let likeButton = document.querySelectorAll('.like-btn');

likeButton.forEach((like)=>{
    like.addEventListener('click',(red)=>{
       like.classList.toggle('like')
    })
})