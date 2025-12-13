const emailInput = document.querySelector("#email");
const phoneInput = document.querySelector("#phone");
const usernameInput = document.querySelector("#username");
const passwordInput = document.querySelector("#password");

const emailExpression = (value) => {
  const rule = /^[^\s!@#$%^&*()]+@[^\s!@#$%^&*()]+\.[^\s!@#$%^&*()]+$/;
  const check = rule.test(value);
  return check;
};

emailInput.addEventListener("keyup", function (e) {
  const inputValue = e.target.value;
  const validationContainer = document.querySelector("#email-alert");
  const isEmail = emailExpression(inputValue);
  if (inputValue == "") {
    this.classList.remove("focus:border-blue-600", "focus:border-green-600");
    this.classList.add("border-red-500", "focus:border-red-500");
    validationContainer.innerHTML = `<li><span class="text-sm text-red-500">Email is required</span></li>`;
  } else {
    if (!isEmail) {
      this.classList.remove("focus:border-blue-600", "focus:border-green-600");
      this.classList.add("border-red-500", "focus:border-red-500");
      validationContainer.innerHTML = `<li><span class="text-sm text-red-500">Email is invalid </span></li>`;
    } else {
      this.classList.remove("focus:border-red-500", "border-red-500");
      this.classList.add("focus:border-green-600");
      validationContainer.innerHTML = "";
    }
  }
});

const phoneExpression = (value) => {
  const rule = /^08+[0-9]{10,11}$/;
  const check = rule.test(value);
  return check;
};

phoneInput.addEventListener("keyup", function (e) {
  const inputValue = e.target.value;
  const validationContainer = document.querySelector("#phone-alert");
  const isPhoneNumber = phoneExpression(inputValue);
  if (inputValue == "") {
    this.classList.remove("focus:border-blue-600", "focus:border-green-600");
    this.classList.add("border-red-500", "focus:border-red-500");
    validationContainer.innerHTML = `<li><span class="text-sm text-red-500">Phone number is required</span></li>`;
  } else {
    if (!isPhoneNumber) {
      this.classList.remove("focus:border-blue-600", "focus:border-green-600");
      this.classList.add("border-red-500", "focus:border-red-500");
      validationContainer.innerHTML = `<li><span class="text-sm text-red-500">Phone number is invalid </span></li>`;
    } else {
      this.classList.remove("focus:border-red-500", "border-red-500");
      this.classList.add("focus:border-green-600");
      validationContainer.innerHTML = "";
    }
  }
});

const usernameExpression = (value) => {
  const rule = /^[a-zA-Z0-9]+$/;
  const check = rule.test(value);
  return check;
};

usernameInput.addEventListener("keyup", function (e) {
  const inputValue = e.target.value;
  const validationContainer = document.querySelector("#username-alert");
  const isUsername = usernameExpression(inputValue);
  if (inputValue == "") {
    this.classList.remove("focus:border-blue-600", "focus:border-green-600");
    this.classList.add("border-red-500", "focus:border-red-500");
    validationContainer.innerHTML = `<li><span class="text-sm text-red-500">Username is required</span></li>`;
  } else {
    if (!isUsername) {
      this.classList.remove("focus:border-blue-600", "focus:border-green-600");
      this.classList.add("border-red-500", "focus:border-red-500");
      validationContainer.innerHTML = `<li><span class="text-sm text-red-500">Username is invalid </span></li>`;
    } else {
      if (inputValue.length > 15) {
        this.classList.remove(
          "focus:border-blue-600",
          "focus:border-green-600"
        );
        this.classList.add("border-red-500", "focus:border-red-500");
        validationContainer.innerHTML = `<li><span class="text-sm text-red-500">Username is too long </span></li>`;
      } else {
        this.classList.remove("focus:border-red-500", "border-red-500");
        this.classList.add("focus:border-green-600");
        validationContainer.innerHTML = "";
      }
    }
  }
});

const strongPassword = (value) => {
  const rule = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s)+$/;
  const check = rule.test(value);
  return check;
};

passwordInput.addEventListener("keyup", function (e) {
  const inputValue = e.target.value;
  const validationContainer = document.querySelector("#password-alert");
  const isStrong = strongPassword(inputValue);
  if (inputValue == "") {
    this.classList.remove(
      "focus:border-blue-600",
      "focus:border-green-600",
      "focus:border-yellow-600"
    );
    this.classList.add("border-red-500", "focus:border-red-500");
    validationContainer.innerHTML = `<li><span class="text-sm text-red-500">Pasword is required</span></li>`;
  } else {
    if (!isStrong) {
      this.classList.remove(
        "focus:border-blue-600",
        "focus:border-green-600",
        "focus:border-red-500"
      );
      this.classList.add("border-yellow-500", "focus:border-yellow-600");
      validationContainer.innerHTML = `<li><span class="text-sm text-yellow-600">Password is weak </span></li>`;
    } else {
      this.classList.remove("focus:border-red-500", "border-red-500");
      this.classList.add("focus:border-green-600");
      validationContainer.innerHTML = `<li><span class="text-sm text-red-500">Password is strong </span></li>`;
    }
  }
});
