//deklarasi variable
let input1 = document.querySelector('#num1')

let input2 = document.getElementById('num2')

let output = document.querySelector('.output-num')

let operator = document.querySelectorAll('.operator-btn')

let numbers1 = document.querySelectorAll('.number-btn-1')

let numbers2 = document.querySelectorAll('.number-btn-2')

//number button input bil1
numbers1.forEach((number)=>{
  number.addEventListener('click',()=>{
    if (number.value === "clear"){
       input1.value = input1.value.slice(0,-1);
    } else {
        input1.value += number.value;
    }
  })    
})

//number input bil2
numbers2.forEach((number)=>{
    number.addEventListener('click',()=>{
      if (number.value === "clear"){
         input2.value = input2.value.slice(0,-1);
      } else {
          input2.value += number.value;
      }
    })    
  })

  //operator button operate
operator.forEach((button) => {
    button.addEventListener('click', ()=>{
        let bil1 = Number.parseInt(input1.value,10)
        let bil2 = Number.parseInt(input2.value, 10)

        if (button.value === "+") {
            output.value = bil1 + bil2
        } else if (button.value === "-") {
            output.value = bil1 - bil2
        } else if (button.value === "x") {
            output.value = bil1 * bil2
        } else if (button.value === "/") {
            output.value = bil1 / bil2
        } else if (button.value === "%") {
            output.value = bil1 % bil2
        } else {
            output.value = ""
            input1.value = ""
            input2.value = ""
        }
    })
});