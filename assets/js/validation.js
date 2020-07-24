let form = document.getElementById("loginForm");
form.addEventListener("submit", e => {
  let password = document.getElementById("lpass").value;
  let button = document.getElementById("submitbt");
  let errorMsg = "";
  let span = document.getElementsByClassName("errorspan")[0];
  if (!validatePassword(password)) {
    errorMsg =
      "Password Structure not acceptable [Front End Validation Example]";
    console.log(password);
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
