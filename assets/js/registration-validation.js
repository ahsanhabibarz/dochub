let form = document.getElementById("signupform");
form.addEventListener("submit", e => {
  let password = document.getElementById("spass").value;
  let password2 = document.getElementById("sconfirmpass").value;
  let button = document.getElementById("submitbt");
  let errorMsg = "";
  let span = document.getElementsByClassName("errorspan")[0];
  if (!validatePassword(password)) {
    errorMsg =
      "Password Structure not acceptable [Front End Validation Example]";
  }
  if (!matchPass(password, password2)) {
    errorMsg = "Password does not match [Front End Validation Example]";
  }

  if (errorMsg !== "") {
    e.preventDefault();
    console.log(errorMsg);
    span.innerHTML = errorMsg;
    button.after(span);
  }
});

const validatePassword = pass => {
  let regex = /^[A-Za-z]\w{7,14}$/; // First Character Must be a letter
  return pass.match(regex);
};

const matchPass = (p1, p2) => {
  return p1 === p2;
};
